<?php
include("../sharedAssets/connect.php");
include("adminAssets/user.php");

// Chats Profile
$chatsQuery = "SELECT 
    users.userID, 
    users.profilePicture, 
    users.username, 
    MAX(chats.dateAndTime) AS lastMessageTime, 
    chats.attachment, 
    chats.isRead,
    SUBSTRING_INDEX(GROUP_CONCAT(chats.message ORDER BY chats.dateAndTime DESC), ',', 1) AS recentChat
FROM 
    chats 
LEFT JOIN 
    users 
ON 
    users.userID = chats.senderID 
WHERE 
    users.role = 'user' 
    AND chats.receiverID = $userID
GROUP BY 
    users.userID 
ORDER BY 
    lastMessageTime DESC;";
$chatsResult = executeQuery($chatsQuery);

$username = '';
$receiverID = '';
$messagesResult = null;
$searchUsernameTerm = '';

// Chats Search Query
$chatsSearchQuery = "SELECT 
    users.userID, 
    users.profilePicture, 
    users.username, 
    MAX(chats.dateAndTime) AS lastMessageTime, 
    chats.attachment, 
    chats.isRead,
    SUBSTRING_INDEX(GROUP_CONCAT(chats.message ORDER BY chats.dateAndTime DESC), ',', 1) AS recentChat
FROM 
    chats 
LEFT JOIN 
    users 
ON 
    users.userID = chats.senderID 
WHERE 
    users.role = 'user' 
    AND chats.receiverID = $userID";

// If there's a search term, append it to the query
// Search: Check if there's a search term
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchUsernameTerm = $_GET['search'];
    $searchUsernameTerm = str_replace("'", "", $searchUsernameTerm);

    $chatsSearchQuery .= " AND users.username LIKE '%$searchUsernameTerm%'";
}

$chatsSearchQuery .= " GROUP BY users.userID ORDER BY lastMessageTime DESC;";

$chatsResult = executeQuery($chatsSearchQuery);
// Send Chats
if (isset($_GET['id'])) {
    $receiverID = $_GET['id'];
    $username = $_GET['username'];

    if (isset($_POST['message']) || isset($_FILES['attachment'])) {
        $message = $_POST['message'] ?? '';
        $attachment = '';

        if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['attachment']['tmp_name'];
            $fileName = time() . '_' . $_FILES['attachment']['name'];
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $attachment = $fileName;
            }
        }

        $sendMessageQuery = "INSERT INTO chats(senderID, receiverID, message, attachment, isRead) VALUES ('$userID', '$receiverID', '$message', '$attachment', 'yes')";
        executeQuery($sendMessageQuery);
    }

    $messagesQuery = "SELECT * FROM chats WHERE ((receiverID=$receiverID AND senderID=$userID) OR (receiverID=$userID AND senderID=$receiverID))";
    $messagesResult = executeQuery($messagesQuery);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Customer Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="adminAssets/css/nav/nav.css">
    <link rel="stylesheet" href="adminAssets/css/chats/style.css">
    <link rel="icon" href="../assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

</head>

<body data-bs-theme="light">
    <?php include("adminAssets/nav.php"); ?>

    <div class="container-fluid">
        <div class="row mainRow p-4">
            <!-- Chat List -->
            <div class="col-12 col-md-3 mb-3">
                <div class="card rounded-5 chatBox">
                    <div class="row p-2" style="background-color: black;">
                        <div class="ps-4">
                            <span class="h4" style="color: #19afa5;">Chats</span>
                        </div>
                    </div>
                    <div class="row p-3 search-box">
                        <div class="d-flex align-items-center">

                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search name" value="<?php echo $searchUsernameTerm ?>" style="flex: 1;">
                                    <span class="input-group-text">
                                        <button type="submit" class="btn p-0 border-0 bg-transparent">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>



                                </div>
                            </form>
                            <select class="form-select ms-2" style="width: 70px;">
                                <option value="all">All</option>
                                <option value="unread">Unread</option>
                                <option value="read">Read</option>
                            </select>
                        </div>
                    </div>
                    <?php
                    if (mysqli_num_rows($chatsResult) > 0) {
                        while ($chatsRow = mysqli_fetch_assoc($chatsResult)) {
                    ?>
                            <form>
                                <button style="width: 100%; background-color: transparent; border: none" value="<?php echo $chatsRow['userID'] ?>" type="submit" name="id">
                                    <input type="hidden" value="<?php echo $chatsRow['username'] ?>" name="username">
                                    <div class="row shadow-sm ps-3 p-3">
                                        <div class="col-auto">
                                            <img src="../uploads/<?php echo $chatsRow['profilePicture'] ?>" alt="Profile Picture" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                                        </div>
                                        <div class="col">
                                            <div class="fw-bold text-start">
                                                <?php echo $chatsRow['username'] ?>
                                            </div>
                                            <div class="text-muted text-start" style="font-size: 14px;">
                                                <?php echo strlen($chatsRow['recentChat']) > 30 ? substr($chatsRow['recentChat'], 0, 30) . '...' : $chatsRow['recentChat']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </button>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Chat Messages -->
            <div class="col-12 col-md-9 mb-3">
                <div class="card rounded-5 chatBox">
                    <div class="row p-2" style="background-color: black;">
                        <div class="ps-4">
                            <span class="h4" style="color: #19afa5;">
                                <?php echo $receiverID != '' ? $username : 'Customer'; ?>
                            </span>
                        </div>
                    </div>
                    <div class="col d-flex align-items-end flex-column" style="height: 68vh; overflow-y: scroll">
                        <?php
                        $counter = 0;
                        if ($messagesResult && mysqli_num_rows($messagesResult) > 0) {
                            while ($message = mysqli_fetch_assoc($messagesResult)) {
                                if ($counter == 0) {
                        ?>
                                    <div class="mt-auto chatbubble-own-container">
                                        <div class="<?php echo $userID == $message['senderID'] ? 'chatbubble-own' : 'chatbubble-other'; ?>">
                                            <?php echo $message['message']; ?>
                                            <?php if ($message['attachment']) { ?>
                                                <div class="mt-2">
                                                    <img src="../uploads/<?php echo $message['attachment']; ?>" alt="Attachment" style="max-width: 100%; max-height: 200px; border-radius: 10px;">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="<?php echo $userID == $message['senderID'] ? 'information-own' : 'information'; ?>">
                                            <?php echo $message['dateAndTime'] . ' . ' . $message['isRead']; ?>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="chatbubble-own-container">
                                        <div class="<?php echo $userID == $message['senderID'] ? 'chatbubble-own' : 'chatbubble-other'; ?>">
                                            <?php echo $message['message']; ?>
                                            <?php if ($message['attachment']) { ?>
                                                <div class="mt-2">
                                                    <img src="../uploads/<?php echo $message['attachment']; ?>" alt="Attachment" style="max-width: 100%; max-height: 200px; border-radius: 10px;">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="<?php echo $userID == $message['senderID'] ? 'information-own' : 'information'; ?>">
                                            <?php echo $message['dateAndTime'] . ' . ' . $message['isRead']; ?>
                                        </div>
                                    </div>
                            <?php
                                }
                                $counter += 1;
                            }
                        } else { ?>
                            <div class="d-flex align-items-end flex-column" style="height: 68vh; overflow-y: scroll;">
                                <div class="p-3 text-muted">No chat history</div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- Send Message -->
                    <div class="d-flex align-items-end mainContainer" style="height: 10%;">
                        <div class="card p-1 chatInput" style="background-color: black; width: 100%;">
                            <form method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                                <input class="form-control p-1 chatTextBox mx-3" type="text" placeholder="Type a message here" name="message" style="flex-grow: 1;">
                                <input type="file" id="attachment" name="attachment" style="display: none;">
                                <label for="attachment" class="ms-2">
                                    <img src="adminAssets/img/chats/attachment button.png" alt="Attachment" class="attachment-btn-img">
                                </label>
                                <button type="submit" style="background-color: transparent; border: none;" class="ms-2">
                                    <img src="adminAssets/img/chats/send button.png" alt="Send" class="send-btn-img">
                                </button>
                            </form>
                            <div id="attachment-preview"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('attachment').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function(event) {
                var preview = document.getElementById('attachment-preview');
                var image = document.createElement('img');
                image.src = event.target.result;
                preview.innerHTML = '';
                preview.appendChild(image);
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>

</html>