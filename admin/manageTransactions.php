<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

$searchTerm = '';
$sortOrder = '';
$filterField = '';

if ($userID == "" || $role == ""  || $role == "user") {
    header("Location: ../login.php");
}

// Delete sale function
if (isset($_POST['btnDelete']) && isset($_POST['userID'])) {
    $deleteID = $_POST['userID'];
    $deleteQuery = "DELETE FROM transactions WHERE userID = '$deleteID'";
    executeQuery($deleteQuery);
}

if (isset($_POST['btnPaid'])) {
    $updateID = $_POST['transactionIDP'];
    $updateQuery = "UPDATE transactions SET paymentStatus = 'PAID' WHERE transactionID = '$updateID'";
    executeQuery($updateQuery);
}

if (isset($_POST['btnCancel'])) {
    $updateID = $_POST['transactionIDC'];
    $updateQuery = "UPDATE transactions SET paymentStatus = 'CANCELLED' WHERE transactionID = '$updateID'";
    executeQuery($updateQuery);
}

// Transaction List Query
$transactionListQuery = "SELECT * FROM transactions JOIN users on users.userID = transactions.consumerID";

// Search users
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    // Clean injection
    $searchTerm = str_replace('\'', '', $searchTerm);
    $transactionListQuery .= " AND (username LIKE '%$searchTerm%' OR DATE_FORMAT(transactionDate, '%Y-%m-%d') LIKE '%$searchTerm%' OR phoneNumber LIKE '%$searchTerm%')";
}

// Sort functionality
if (isset($_GET['filterField']) && !empty($_GET['filterField']) && isset($_GET['sortOrder']) && !empty($_GET['sortOrder'])) {
    $filterField = $_GET['filterField'];
    $sortOrder = $_GET['sortOrder'];
    $transactionListQuery .= " ORDER BY $filterField $sortOrder";
}

$transactionListResult = executeQuery($transactionListQuery);

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
            <h1><b>MANAGE TRANSACTIONS</b></h1>
        </div>

        <div class="container">
            <div class="row p-5">
                <div class="col">
                    <!-- Search and Filter Form -->
                    <form class="row g-3 py-5" role="search" method="GET" action="">
                        <!-- Search Bar -->
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="search" placeholder="Search by Username, Date, Phone"
                                value="<?php echo $searchTerm ?>" aria-label="Search">
                        </div>

                        <!-- Sort Field -->
                        <div class="col-md-3">
                            <select class="form-select" name="filterField" aria-label="Sort By">
                                <option value="">Sort By</option>
                                <option value="transactionID" <?php echo ($filterField == 'transactionID') ? 'selected' : ''; ?>>Transaction ID</option>
                                <option value="transactionDate" <?php echo ($filterField == 'transactionDate') ? 'selected' : ''; ?>>Payment Date</option>
                                <option value="paymentMethod" <?php echo ($filterField == 'paymentMethod') ? 'selected' : ''; ?>>Payment Method</option>
                            </select>
                        </div>

                        <!-- Sort Order -->
                        <div class="col-md-2">
                            <select class="form-select" name="sortOrder" aria-label="Sort Order">
                                <option value="">Order</option>
                                <option value="ASC" <?php echo ($sortOrder == 'ASC') ? 'selected' : ''; ?>>Ascending</option>
                                <option value="DESC" <?php echo ($sortOrder == 'DESC') ? 'selected' : ''; ?>>Descending</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-1 text-end">
                            <button class="btn btn-outline-success" type="submit">Apply</button>
                        </div>
                    </form>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table table-secondary table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Payment Date</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Reference Number</th>
                                    <th scope="col">Status</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($transactionListResult) > 0) {
                                    while ($transactionListRow = mysqli_fetch_assoc($transactionListResult)) {
                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $transactionListRow['transactionID']; ?></th>
                                            <td><?php echo $transactionListRow['username']; ?></td>
                                            <td><?php echo $transactionListRow['phoneNumber']; ?></td>
                                            <td><?php echo $transactionListRow['transactionDate']; ?></td>
                                            <td><?php echo $transactionListRow['paymentMethod']; ?></td>
                                            <td><?php echo $transactionListRow['referenceNumber']; ?></td>
                                            <td><?php echo $transactionListRow['paymentStatus']; ?></td>
                                            <td>
                                                <!-- Button to change payment status to PAID -->
                                                <form method="POST" action="" class="d-inline">
                                                    <input type="hidden" name="transactionIDP"
                                                        value="<?php echo $transactionListRow['transactionID']; ?>">
                                                    <button type="submit" class="btn btn-success" name="btnPaid" title="Mark as PAID">
                                                        <i class="fi fi-rr-check"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td>
                                                <!-- Button to change payment status to CANCELED -->
                                                <form method="POST" action="" class="d-inline">
                                                    <input type="hidden" name="transactionIDC"
                                                        value="<?php echo $transactionListRow['transactionID']; ?>">
                                                    <button type="submit" class="btn btn-danger" name="btnCancel" title="Mark as CANCELED">
                                                        <i class="fi fi-rr-cross-small"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    //If NO results found
                                    echo "<tr><td colspan='7' class='text-center'>No users found.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>