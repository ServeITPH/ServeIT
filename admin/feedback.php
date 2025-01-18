<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

$feedbackQuery = "SELECT * FROM ratings LEFT JOIN users ON ratings.userID = users.userID LEFT JOIN items ON ratings.itemID = items.itemID WHERE users.role ='user';
";
$feedbackResult = executeQuery($feedbackQuery);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="adminAssets/css/nav/nav.css">
    <!-- tab icon -->
    <link rel="icon" href="../assets/images/nav/logo-nav.png">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- icons -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <style>
        textarea {
            resize: none;
        }

        .card-1 {
            background-color: #D9D9D9;
        }
    </style>

</head>

<body>
    <?php include("adminAssets/nav.php"); ?>
    <div class="col">
        <div class="col py-5 text-center">
            <h1><b style="color: #19AFA5;">CLIENT</b> <b>FEEDBACKS</b></h1>
        </div>



        <div class="container">
            <div class="row p-5">
                <div class="col ">
                    <form class="d-flex py-5" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-secondary table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Review</th>
                                    <th scope="col">Rating Value</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                            if (mysqli_num_rows($feedbackResult) > 0) {
                                                while ($feedbackRow = mysqli_fetch_assoc($feedbackResult)) {
                                                
                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $feedbackRow['title']; ?></th>
                                                        <td><?php echo $feedbackRow['username']; ?></td>
                                                        <td><?php echo $feedbackRow['review']; ?></td>
                                                        <td><?php echo $feedbackRow['ratingValue']; ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- for temporary sidebar use only. tanggalin once na malagay data ng tables -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>