<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

$searchTerm = '';
// delete user
if (isset($_POST['btnDelete']) && isset($_POST['userID'])) {
    $deleteID = $_POST['userID']; 
    $deleteQuery = "DELETE FROM users WHERE userID = '$deleteID'";
    executeQuery($deleteQuery);
}

//User List
$userListQuery = "SELECT * FROM users WHERE role ='user'";

// search users
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    // clean injection
    $searchTerm = str_replace('\'', '', $searchTerm);
    $userListQuery .= " AND (username LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%' OR phoneNumber LIKE '%$searchTerm%')";
}

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
                        <input class="search-bar form-control me-2" type="text" name="search" placeholder="Search"
                            value="<?php echo $searchTerm ?>" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-secondary table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Birthdate</th>
                                    <th scope="col">Account Date</th>
                                    <th scope="col"></th>
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
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"
                                                    onclick="setDeleteUserID(<?php echo $userListRow['userID']; ?>)">
                                                    Delete
                                                </button>
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
        <!-- Bootstrap Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form method="POST" action="">
                            <input type="hidden" name="userID" id="deleteUserID">
                            <button type="submit" class="btn btn-danger" name="btnDelete">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function setDeleteUserID(userID) {
                document.getElementById('deleteUserID').value = userID;
            }
        </script>
</body>

</html>