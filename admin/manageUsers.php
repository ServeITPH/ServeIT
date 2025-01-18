<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

// delete user

if (isset($_POST['btnDelete'])) {
    $deleteID = $_POST['userID'];
    $deleteQuery = "DELETE FROM users WHERE userID = '$deleteID'";
    executeQuery($deleteQuery);

}
//User List
$userListQuery = "SELECT * FROM users WHERE role ='user'";
$userListResult = executeQuery($userListQuery);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Manage Users</title>
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
            <h1><b>MANAGE USERS</b></h1>
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
                                    <th scope="col">User ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Num.</th>
                                    <th scope="col">Birthdate</th>
                                    <th scope="col">Acoount Date</th>
                                    <th scope="col">Acoount Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($userListResult) > 0) {
                                    while ($userListRow = mysqli_fetch_assoc($userListResult)) {

                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $userListRow['userID']; ?></th>
                                            <td><?php echo $userListRow['username']; ?></td>
                                            <td><?php echo $userListRow['email']; ?></td>
                                            <td><?php echo $userListRow['phoneNumber']; ?></td>
                                            <td><?php echo $userListRow['birthDate']; ?></td>
                                            <td><?php echo $userListRow['accountDate']; ?></td>
                                            <td>
                                                <form method="POST">
                                                    <input type="hidden" value="<?php echo $userListRow['userID']; ?>"
                                                        name="userID">
                                                    <button type="submit" class="btn btn-danger deletebtn" name="btnDelete">Delete</button>
                                                </form>
                                            </td>
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


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>