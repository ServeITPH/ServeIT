<?php
session_start();
include("sharedAssets/connect.php");

if (!isset($_SESSION['userID'])) {
    header("Location: login.php");
    exit();
}

$userID = $_SESSION['userID'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = isset($_POST['message']) ? mysqli_real_escape_string($conn, $_POST['message']) : '';
    $receiverID = 1; // palitan nalang

    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png'];
        $fileType = $_FILES['attachment']['type'];

        if (in_array($fileType, $allowedTypes)) {
            $fileTmpPath = $_FILES['attachment']['tmp_name'];
            $fileName = $_FILES['attachment']['name'];
            $fileDest = 'uploads/' . basename($fileName);

            if (move_uploaded_file($fileTmpPath, $fileDest)) {
                $query = "INSERT INTO chats (senderID, receiverID, message, attachment, isRead, dateAndTime) 
                          VALUES ('$userID', '$receiverID', '$message', '$fileDest', 'no', NOW())";
                if (!$conn->query($query)) {
                    echo "Error: " . $conn->error;
                }
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Invalid file type. Only JPG and PNG are allowed.";
        }
    } elseif (!empty($message)) {
        $query = "INSERT INTO chats (senderID, receiverID, message, isRead, dateAndTime) 
                  VALUES ('$userID', '$receiverID', '$message', 'no', NOW())";
        if (!$conn->query($query)) {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Cannot send an empty message without an attachment.";
    }
}

// Fetch messages
$receiverID = 1;
$query = "SELECT * FROM chats WHERE (senderID = $userID AND receiverID = $receiverID) OR (senderID = $receiverID AND receiverID = $userID) ORDER BY dateAndTime";
$result = $conn->query($query);
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

        #preview-container {
            display: none;
            position: relative;
            margin-top: 10px;
            text-align: center;
        }

        #file-preview {
            max-width: 100px;
            max-height: 100px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #delete-preview {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            text-align: center;
            cursor: pointer;
        }
    </style>
</head>

<body data-bs-theme="light">
    <?php include("sharedAssets/nav.php"); ?>

    <div class="container">
        <!-- Chat Messages -->
        <div class="container" style="margin-top:30px; margin-bottom:150px">
            <div class="card rounded-5 chatBox">
                <div class="row p-2" style="background-color: black;">
                    <div class="ps-3 text-center">
                        <span class="h4" style="color: #19afa5;">ServeIT</span>
                    </div>
                </div>
                <div id="chat-container" class="d-flex align-items-end flex-column px-3" style="height: 68vh; overflow-y: scroll;">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $isOwnMessage = ($row['senderID'] == $userID);
                            $chatClass = $isOwnMessage ? "chatbubble-own" : "chatbubble-other";
                            $infoClass = $isOwnMessage ? "information-own" : "information";
                    ?>
                            <div class="chatbubble-own-container my-3">
                                <div class="<?= $chatClass; ?>">
                                    <?= htmlspecialchars($row['message']); ?>
                                    <?php if ($row['attachment']) { ?>
                                        <br>
                                        <a href="uploads/<?= basename($row['attachment']); ?>" target="_blank">
                                            <img src="uploads/<?= basename($row['attachment']); ?>" alt="Attachment" style="max-width: 200px;">
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="<?= $infoClass; ?>">
                                    <?= $row['dateAndTime']; ?>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo '<div class="p-3 text-muted">No chat history</div>';
                    }
                    ?>
                </div>

                <!-- Send Message -->
                <div class="d-flex align-items-end mainContainer" style="height: 15%;">
                    <div class="card p-1 chatInput" style="background-color: black; width: 100%;">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="d-flex align-items-center">
                                <input class="form-control p-1 chatTextBox mx-3" type="text" placeholder="Type a message here" name="message" style="flex-grow: 1;">

                                <!-- Attachment Button -->
                                <input type="file" name="attachment" id="attachment" style="display: none;" accept="image/jpeg, image/png" onchange="previewFile()">
                                <label for="attachment" class="ms-2">
                                    <img src="assets/images/chats/attachment button.png" alt="Attachment" class="attachment-btn-img">
                                </label>

                                <button type="submit" style="background-color: transparent; border: none;" class="ms-2">
                                    <img src="assets/images/chats/send button.png" alt="Send" class="send-btn-img">
                                </button>
                            </div>
                            <!-- Preview Image -->
                            <div id="preview-container">
                                <img id="file-preview" src="" alt="Preview">
                                <button type="button" id="delete-preview" onclick="deletePreview()">&times;</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function previewFile() {
            var preview = document.getElementById('file-preview');
            var file = document.getElementById('attachment').files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                document.getElementById('preview-container').style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                document.getElementById('preview-container').style.display = 'none';
            }
        }

        function deletePreview() {
            var preview = document.getElementById('file-preview');
            document.getElementById('attachment').value = null;
            preview.src = "";
            document.getElementById('preview-container').style.display = 'none';
        }

        function scrollToBottom() {
            const chatContainer = document.getElementById('chat-container');
            chatContainer.scrollTo({
                top: chatContainer.scrollHeight,
                behavior: 'smooth'
            });
        }

        window.onload = scrollToBottom;
        const chatForm = document.querySelector('form');
        chatForm.addEventListener('submit', function() {
            setTimeout(scrollToBottom, 100);
        });
    </script>
</body>

</html>
