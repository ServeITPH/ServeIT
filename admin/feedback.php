<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

// Store of filters
$searchTerm = '';
$filterRating = '';
$filterItemID = '';
$sortOrder = '';
$filterType = '';

// Feedback Queries
$feedbackQuery = "SELECT ratings.*, users.username, items.title, items.type FROM ratings 
LEFT JOIN users ON ratings.userID = users.userID 
LEFT JOIN items ON ratings.itemID = items.itemID 
WHERE users.role = 'user'";

// Search 
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    // clean injection
    $searchTerm = str_replace('\'', '', $searchTerm);
    $feedbackQuery .= " AND (users.username LIKE '%$searchTerm%' OR items.title LIKE '%$searchTerm%')";
}

// Rating Value/Star
if (isset($_GET['filterRating']) && !empty($_GET['filterRating'])) {
    $filterRating = $_GET['filterRating'];
    $feedbackQuery .= " AND ratings.ratingValue = '$filterRating'";
}

// Items
if (isset($_GET['filterItemID']) && !empty($_GET['filterItemID'])) {
    $filterItemID = $_GET['filterItemID'];
    $feedbackQuery .= " AND ratings.itemID = '$filterItemID'";
}

// Filter by Type (Product or Service)
if (isset($_GET['filterType']) && !empty($_GET['filterType'])) {
    $filterType = $_GET['filterType'];
    $feedbackQuery .= " AND items.type = '$filterType'";
}

// Sort Order
if (isset($_GET['sortOrder']) && !empty($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    if ($sortOrder === 'asc') {
        $feedbackQuery .= " ORDER BY ratings.ratingValue ASC";
    } elseif ($sortOrder === 'desc') {
        $feedbackQuery .= " ORDER BY ratings.ratingValue DESC";
    }
}

// Ascending arrangement title items option
$itemQuery = "SELECT DISTINCT itemID, title FROM items ORDER BY title ASC";
$itemResult = executeQuery($itemQuery);

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

        <!-- Filters and Results -->
        <div class="container">
            <div class="row p-5">
                <div class="col">
                    <!-- Search and Filter Form -->
                    <form class="row g-3 pb-5" role="search" method="GET" action="">
                        <!-- Search Bar -->
                        <div class="col-md-6">
                            <input class="search-bar form-control" type="text" name="search" placeholder="Search"
                                value="<?php echo ($searchTerm); ?>" aria-label="Search">
                        </div>

                        <!-- Filter by Rating -->
                        <div class="col-md-2">
                            <select class="form-select" name="filterRating" aria-label="Filter by Rating">
                                <option value="">All Ratings</option>
                                <option value="1" <?php echo ($filterRating == '1') ? 'selected' : ''; ?>>1</option>
                                <option value="2" <?php echo ($filterRating == '2') ? 'selected' : ''; ?>>2</option>
                                <option value="3" <?php echo ($filterRating == '3') ? 'selected' : ''; ?>>3</option>
                                <option value="4" <?php echo ($filterRating == '4') ? 'selected' : ''; ?>>4</option>
                                <option value="5" <?php echo ($filterRating == '5') ? 'selected' : ''; ?>>5</option>
                            </select>
                        </div>

                        <!-- Filter by Items -->
                        <div class="col-md-2">
                            <select class="form-select" name="filterItemID" aria-label="Filter by Item">
                                <option value="">All Items</option>
                                <?php while ($itemRow = mysqli_fetch_assoc($itemResult)) : ?>
                                <option value="<?php echo $itemRow['itemID']; ?>" 
                           <?php echo ($filterItemID == $itemRow['itemID']) ? 'selected' : ''; ?>>
                        <?php echo $itemRow['title']; ?>
                     </option>
                   <?php endwhile; ?>
                </select>
            </div>

                        <!-- Filter by Type -->
                        <div class="col-md-2">
                            <select class="form-select" name="filterType" aria-label="Filter by Type">
                                <option value="">All Types</option>
                                <option value="Product" <?php echo ($filterType == 'Product') ? 'selected' : ''; ?>>Product</option>
                                <option value="Service" <?php echo ($filterType == 'Service') ? 'selected' : ''; ?>>Service</option>
                            </select>
                        </div>

                        <!-- Sort Order -->
                        <div class="col-md-2">
                            <select class="form-select" name="sortOrder" aria-label="Sort Order">
                                <option value="">Sort By</option>
                                <option value="asc" <?php echo ($sortOrder == 'asc') ? 'selected' : ''; ?>>Ascending
                                </option>
                                <option value="desc" <?php echo ($sortOrder == 'desc') ? 'selected' : ''; ?>>Descending
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-12 text-end">
                            <button class="btn btn-outline-success" type="submit">Apply Filters</button>
                        </div>
                    </form>

                    <!-- Feedback Table -->
                    <div class="table-responsive">
                        <table class="table table-secondary table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Type</th> 
                                    <th scope="col">Username</th>
                                    <th scope="col">Review</th>
                                    <th scope="col">Rating Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                if (mysqli_num_rows($feedbackResult) > 0) {
                                    while ($feedbackRow = mysqli_fetch_assoc($feedbackResult)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $feedbackRow['title']; ?></th>
                                            <td><?php echo $feedbackRow['type']; ?></td> 
                                            <td><?php echo $feedbackRow['username']; ?></td>
                                            <td><?php echo $feedbackRow['review']; ?></td>
                                            <td><?php echo $feedbackRow['ratingValue']; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    //If NO results found
                                    echo "<tr><td colspan='5' class='text-center'>No feedback found.</td></tr>";
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