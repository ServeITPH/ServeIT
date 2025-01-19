<?php
include("sharedAssets/connect.php");
include("admin/adminAssets/user.php");

date_default_timezone_set('Asia/Manila');

function getChats($pdo, $role, $adminUserID)
{
    if ($role === 'user') {
        $stmt = $pdo->prepare("SELECT c.*, u.username AS senderUsername
                               FROM chats c
                               JOIN users u ON c.senderID = u.userID
                               WHERE (u.role = 'user' AND c.receiverID = :adminUserID) 
                                  OR (c.senderID = :adminUserID AND u.userID = c.receiverID)
                               ORDER BY c.dateAndTime ASC");
        $stmt->bindParam(':adminUserID', $adminUserID, PDO::PARAM_INT);
    } else {
        $stmt = $pdo->prepare("SELECT c.*, u.username AS senderUsername
                               FROM chats c
                               JOIN users u ON c.senderID = u.userID
                               WHERE (c.senderID = :adminUserID AND u.role = 'user')
                                  OR (u.userID = c.receiverID AND c.receiverID = :adminUserID)
                               ORDER BY c.dateAndTime ASC");
        $stmt->bindParam(':adminUserID', $adminUserID, PDO::PARAM_INT);
    }
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$role = $_SESSION['role'];
$adminUserID = 1;// palitan nalang
$chats = getChats($pdo, $role, $adminUserID);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Message</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/chats/style.css">
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/footer/footer.css">
    <style>
        body {
            background-color: #ffffff;
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("assets/images/about/bg.png");
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
            opacity: 0.8;
        }

        .chatbubble-own {
            background-color: #4CAF50;
            color: white;
            border-radius: 20px;
            padding: 10px;
            max-width: 70%;
            margin: 5px 0;
            align-self: flex-end;
        }

        .chatbubble-other {
            background-color: #19AFA5;
            color: black;
            border-radius: 20px;
            padding: 10px;
            max-width: 70%;
            margin: 5px 0;
            align-self: flex-start;
        }

        .information-own,
        .information {
            font-size: 0.8em;
            color: #6c757d;
        }
    </style>
</head>

<body data-bs-theme="light">
    <?php include("sharedAssets/nav.php"); ?>

    <div class="container">
        <div class="container" style="margin-top:30px; margin-bottom:150px">
            <div class="card rounded-5 chatBox">
                <div class="row p-2" style="background-color: black;">
                    <div class="ps-3 text-center">
                        <span class="h4" style="color: #19afa5;">ServeIT</span>
                    </div>
                </div>
                <div class="d-flex align-items-end flex-column chatContainer" style="height: 68vh; overflow-y: scroll;">
                    <?php if (empty($chats)): ?>
                        <div class="p-3 text-muted">No chat history</div>
                    <?php else: ?>
                        <?php foreach ($chats as $chat): ?>
                            <?php
                            $dateTime = new DateTime($chat['dateAndTime']);
                            $formattedDate = $dateTime->format('F j, Y, g:i A');
                            $sender = ($chat['senderID'] == $adminUserID) ? 'Admin' : htmlspecialchars($chat['senderUsername']);
                            ?>
                            <div class="p-2 <?= ($chat['senderID'] == $adminUserID) ? 'text-end' : 'text-start' ?>">
                                <div class="<?= ($chat['senderID'] == $adminUserID) ? 'chatbubble-own' : 'chatbubble-other' ?>">
                                    <strong><?= $sender ?>:</strong>
                                    <?= htmlspecialchars($chat['message']) ?>
                                    <?php if (!empty($chat['attachment'])): ?>
                                        <br>
                                        <a href="uploads/<?= htmlspecialchars($chat['attachment']) ?>" target="_blank">View Attachment</a>
                                    <?php endif; ?>
                                </div>
                                <div class="<?= ($chat['senderID'] == $adminUserID) ? 'information-own' : 'information' ?>" style="font-size: 0.8em;"><?= $formattedDate ?> SENT</div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div class="d-flex align-items-end mainContainer" style="height: 15%;">
                    <div class="card p-1 chatInput" style="background-color: black; width: 100%;">
                        <form id="chatForm" enctype="multipart/form-data">
                            <div class="d-flex align-items-center">
                                <input id="chatMessage" name="message" class="form-control p-1 chatTextBox mx-3" type="text" placeholder="Type a message here" style="flex-grow: 1;">
                                <input type="file" id="attachment" name="attachment" class="d-none">
                                <label for="attachment" class="ms-2">
                                    <img src="assets/images/chats/attachment button.png" alt="Attachment" class="attachment-btn-img">
                                </label>
                                <button type="submit" style="background-color: transparent; border: none;" class="ms-2">
                                    <img src="assets/images/chats/send button.png" alt="Send" class="send-btn-img">
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("sharedAssets/smpayment.php"); ?>
    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('chatForm').addEventListener('submit', function(e) {
            e.preventDefault();

            var chatMessage = document.getElementById('chatMessage').value.trim();

            // Prevent submission if the message is empty and no attachment is provided
            if (chatMessage === '' && document.getElementById('attachment').files.length === 0) {
                alert("Please enter a message or attach a file before sending.");
                return;
            }

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "saveChat.php", true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.querySelector('.chatContainer').innerHTML += xhr.responseText;
                    document.getElementById('chatMessage').value = '';
                    document.getElementById('attachment').value = '';

                    var chatContainer = document.querySelector('.chatContainer');
                    chatContainer.scrollTop = chatContainer.scrollHeight;
                }
            };
            xhr.send(formData);
        });
    </script>
</body>

</html>
