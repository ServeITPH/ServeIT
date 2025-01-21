<?php
include("../sharedAssets/connect.php");

session_start();

$searchProductTerm = '';
$searchServiceTerm = '';

if (isset($_POST['btnDelete'])) {
    $deleteID = $_POST['itemID'];
    $deleteType = $_POST['type'];
    $deleteQuery = "DELETE FROM items WHERE type = '$deleteType' AND itemID = '$deleteID'";
    executeQuery($deleteQuery);
}

if (isset($_POST['btnSave'])) {
    $itemID = $_POST['itemID'];
    $title = $_POST['title'];
    $shortDescription = $_POST['shortDescription'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $existingAttachment = $_POST['existingAttachment'];

    if (!empty($_FILES['newAttachment']['name'])) {
        $attachment = $_FILES['newAttachment']['name'];
        $attachmentTemp = $_FILES['newAttachment']['tmp_name'];

        $uploadDir = "../assets/images/items/";
        $uploadFile = $uploadDir . basename($attachment);

        // Move the new file to the server
        if (move_uploaded_file($attachmentTemp, $uploadFile)) {
            // New image uploaded, use the new attachment
            $newAttachment = $attachment;
        } else {
            // Handle file upload error
            echo "Failed to upload the new image.";
            $newAttachment = $existingAttachment; // Fallback to the existing attachment if upload fails
        }
    } else {
        // No new image uploaded, use the existing image
        $newAttachment = $existingAttachment;
    }

    // Update query
    $updateQuery = "UPDATE items 
                    SET title = '$title', 
                        shortDescription = '$shortDescription', 
                        price = '$price',
                        attachment = '$newAttachment'
                    WHERE itemID = '$itemID' AND type = '$type'";

    // Execute the query
    executeQuery($updateQuery);
}

$userID = $_SESSION['userID'];
// Service Count
$countServiceQuery = "SELECT COUNT(itemID) AS countService FROM `items` WHERE type = 'service'";
$countServiceResult = executeQuery($countServiceQuery);
$serviceCount = 0;

while ($countServiceRow = mysqli_fetch_assoc($countServiceResult)) {
    $serviceCount = $countServiceRow['countService'];
}

// Product Count
$countProductQuery = "SELECT COUNT(itemID) AS countProduct FROM `items` WHERE type = 'product'";
$countProductResult = executeQuery($countProductQuery);
$productCount = 0;

while ($countProductRow = mysqli_fetch_assoc($countProductResult)) {
    $productCount = $countProductRow['countProduct'];
}

//User Count
$userCountQuery = "SELECT COUNT(userID) AS userCount FROM users WHERE role ='user'";
$userCountResult = executeQuery($userCountQuery);
$userCount = 0;

while ($userCountRow = mysqli_fetch_assoc($userCountResult)) {
    $userCount = $userCountRow['userCount'];
}

// Sales Count
$salesCountQuery = "SELECT COUNT(transactionID) AS salesCount FROM transactions WHERE paymentStatus ='PAID'";
$salesCountResult = executeQuery($salesCountQuery);
$salesCount = 0;

while ($salesCountRow = mysqli_fetch_assoc($salesCountResult)) {
    $salesCount = $salesCountRow['salesCount'];
}

//Service List
$serviceGetQuery = "SELECT * FROM items WHERE type ='service'";




if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchServiceTerm = $_GET['search'];
    $searchServiceTerm = str_replace('\'', '', $searchServiceTerm);
    $serviceGetQuery .= " AND (title LIKE '%$searchServiceTerm%' OR shortDescription LIKE '%$searchServiceTerm%' OR categoryName LIKE '%$searchServiceTerm%')";
}


//Product List
$productGetQuery = "SELECT * FROM items WHERE type ='product'";


if (isset($_GET['searchProduct']) && !empty($_GET['searchProduct'])) {
    $searchProductTerm = $_GET['searchProduct'];
    $searchProductTerm = str_replace('\'', '', $searchProductTerm);
    $productGetQuery .= " AND (title LIKE '%$searchProductTerm%' OR shortDescription LIKE '%$searchProductTerm%' OR categoryName LIKE '%$searchProductTerm%')";
}

$serviceGetResult = executeQuery($serviceGetQuery);
$productGetResult = executeQuery($productGetQuery);

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
        .card-body {
            background-color: #19AFA5;
        }
    </style>

</head>

<body>
    <?php include("adminAssets/nav.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="p-5 text-center">
                    <h1><b>ADMIN DASHBOARD</b></h1>
                </div>
                <div class="container text-center mb-5">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Services</p>
                                    <p class="h3"><?php echo $serviceCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3 ">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Products</p>
                                    <p class="h3"><?php echo $productCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Users</p>
                                    <p class="h3"><?php echo $userCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-3">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Sales</p>
                                    <p class="h3"><?php echo $salesCount ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- graph -->
                <div class="col">
                    <div class="py-2 text-center">
                        <h1><b>VISITS</b></h1>
                    </div>
                </div>
                <div class="container pt-2">
                    <div class="col">
                        <?php include("adminAssets/graph.php") ?>
                    </div>
                </div>
                <br>


                <div class="col py-5 text-center">
                    <h1><b>SERVICES</b></h1>
                    <!-- table -->
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                <form method="GET" class="d-flex py-5" role="search">

                                    <input class="form-control" type="text" name="search"
                                        placeholder="Search Service" value="<?php echo $searchServiceTerm ?>"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit" name="btnSearchService">Search</button>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-secondary table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col"></th>
                                                <th scope="col">Service Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Price</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="productTable">

                                            <?php
                                            if (mysqli_num_rows($serviceGetResult) > 0) {
                                                while ($serviceGetRow = mysqli_fetch_assoc($serviceGetResult)) {

                                            ?>
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <tr>
                                                            <th scope="row"><?php echo $serviceGetRow['itemID']; ?></th>
                                                            <td><img src="../assets/images/items/<?php echo $serviceGetRow['attachment']; ?>"
                                                                    alt="Product Image" style="width:100px"></td>
                                                            <td>
                                                                <input type="file" name="newAttachment" class="form-control"
                                                                    style="width: 100px; min-height: 30px; padding: 3px;">
                                                                <!-- File input for new image -->
                                                            </td>
                                                            <td>
                                                                <input type="text" name="title"
                                                                    value="<?php echo $serviceGetRow['title']; ?>"
                                                                    class="form-control" style="width:280px">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="shortDescription"
                                                                    value="<?php echo $serviceGetRow['shortDescription']; ?>"
                                                                    class="form-control" style="width:280px">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="price"
                                                                    value="<?php echo $serviceGetRow['price']; ?>"
                                                                    class="form-control" style="width: 80px;">
                                                            </td>
                                                            <!-- Hidden inputs -->
                                                            <td style="display: none;">
                                                                <input type="hidden" name="type"
                                                                    value="<?php echo $serviceGetRow['type']; ?>">
                                                                <input type="hidden" name="itemID"
                                                                    value="<?php echo $serviceGetRow['itemID']; ?>">
                                                                <input type="hidden" name="existingAttachment"
                                                                    value="<?php echo $serviceGetRow['attachment']; ?>">
                                                            </td>

                                                            <td>
                                                                <button type="submit" name="btnSave"
                                                                    class="btn btn-success">Save</button>
                                                            </td>
                                                            <td>
                                                                <button type="submit" name="btnDelete"
                                                                    class="btn btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </form>
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
                </div>
                <br>

                <div class="col py-5 text-center">
                    <h1><b style="color: #000000;">PRODUCTS</b></h1>
                    <!-- table -->
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                <form method="GET" class="d-flex py-5" role="search">
                                    <input class="form-control" type="text" name="searchProduct" placeholder="Search Product"
                                        value="<?php echo $searchProductTerm ?>" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit" name="btnSearchProduct">Search</button>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-secondary table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col"></th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Price</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($productGetResult) > 0) {
                                                while ($productGetRow = mysqli_fetch_assoc($productGetResult)) {

                                            ?>
                                                    <form method="POST" enctype="multipart/form-data">
                                                        <tr>
                                                            <th scope="row"><?php echo $productGetRow['itemID']; ?></th>
                                                            <td><img src="../assets/images/items/<?php echo $productGetRow['attachment']; ?>"
                                                                    alt="Product Image" style="width:100px"></td>
                                                            <td>
                                                                <input type="file" name="newAttachment" class="form-control"
                                                                    style="width: 100px; min-height: 30px; padding: 3px;">
                                                                <!-- File input for new image -->
                                                            </td>
                                                            <td>
                                                                <input type="text" name="title"
                                                                    value="<?php echo $productGetRow['title']; ?>"
                                                                    class="form-control" style="width: 300px;">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="shortDescription"
                                                                    value="<?php echo $productGetRow['shortDescription']; ?>"
                                                                    class="form-control" style="width: 280px;">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="price"
                                                                    value="<?php echo $productGetRow['price']; ?>"
                                                                    class="form-control" style="width: 80px;">
                                                            </td>
                                                            <!-- Hidden inputs -->
                                                            <td style=" display: none;">
                                                                <input type="hidden" name="type"
                                                                    value="<?php echo $productGetRow['type']; ?>">
                                                                <input type="hidden" name="itemID"
                                                                    value="<?php echo $productGetRow['itemID']; ?>">
                                                                <input type="hidden" name="existingAttachment"
                                                                    value="<?php echo $productGetRow['attachment']; ?>">
                                                            </td>

                                                            <td>
                                                                <button type="submit" name="btnSave"
                                                                    class="btn btn-success">Save</button>
                                                            </td>
                                                            <td>
                                                                <button type="submit" name="btnDelete"
                                                                    class="btn btn-danger">Delete</button>
                                                            </td>
                                                        </tr>
                                                    </form>
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
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>