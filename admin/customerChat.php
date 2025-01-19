<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Customer Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="adminAssets/css/nav/nav.css">
    <link rel="stylesheet" href="adminAssets/css/chats/style.css">
    <!-- tab icon -->
    <link rel="icon" href="../assets/images/nav/logo-nav.png">
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- icons -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
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

        .attachment-btn-img,
        .send-btn-img {
            width: 30px;
            height: 30px;
        }
    </style>
</head>

<body data-bs-theme="light">
    <?php include("adminAssets/nav.php"); ?>

    <div class="container-fluid">
        <div class="row mainRow p-2">
            <!-- Chat List -->
            <div class="col-12 col-md-3 mb-3">
                <div class="card rounded-5 chatBox">
                    <div class="row p-2" style="background-color: black;">
                        <div class="ps-4">
                            <span class="h4" style="color: #19afa5;">Chats</span>
                        </div>
                    </div>
                    <!-- Search Box and Dropdown -->
                    <div class="row p-3 search-box">
                        <div class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search name" style="flex: 1;">
                                <span class="input-group-text"><i class="fa fa-search"></i></span>
                            </div>
                            <select class="form-select ms-2" style="width: 70px;">
                                <option value="all">All</option>
                                <option value="unread">Unread</option>
                                <option value="read">Read</option>
                            </select>
                        </div>
                    </div>
                    <p class="p-3 text-muted">No chats available</p>
                </div>
            </div>
            <!-- Chat Messages -->
            <div class="col-12 col-md-9 mb-3">
                <div class="card rounded-5 chatBox">
                    <div class="row p-2" style="background-color: black;">
                        <div class="ps-4">
                            <span class="h4" style="color: #19afa5;">Full Name</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-end flex-column" style="height: 68vh; overflow-y: scroll;">
                        <div class="p-3 text-muted">No chat history</div>
                    </div>
                    <!-- Send Message -->
                    <div class="d-flex align-items-end mainContainer" style="height: 15%;">
                        <div class="card p-1 chatInput" style="background-color: black; width: 100%;">
                            <div class="d-flex align-items-center">
                                <input class="form-control p-1 chatTextBox mx-3" type="text" placeholder="Type a message here" style="flex-grow: 1;">
                                <label for="attachment" class="ms-2">
                                    <img src="adminAssets/img/chats/attachment button.png" alt="Attachment" class="attachment-btn-img">
                                </label>
                                <button style="background-color: transparent; border: none;" class="ms-2">
                                    <img src="adminAssets/img/chats/send button.png" alt="Send" class="send-btn-img">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>