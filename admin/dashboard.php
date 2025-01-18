<?php
include("../sharedAssets/connect.php");

session_start();

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

//Service List
$serviceGetQuery = "SELECT * FROM items WHERE type ='service'";
$serviceGetResult = executeQuery($serviceGetQuery);

//Product List
$productGetQuery = "SELECT * FROM items WHERE type ='product'";
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
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Services</p>
                                    <p class="h3"><?php echo $serviceCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3 ">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Products</p>
                                    <p class="h3"><?php echo $productCount ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card rounded-5">
                                <div class="card-body rounded-5">
                                    <p class="h2 statistics-custom">Sales</p>
                                    <p class="h3">#</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- graph -->
                <div class="container">
                    <div class="col">
                        <?php include("adminAssets/graph.php") ?>
                    </div>
                </div>
                <br>

                <div class="col py-5 text-center">
                    <h1><b>SERVICES</b></h1>
                    <!-- table -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                <form class="d-flex py-5" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-secondary table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (mysqli_num_rows($serviceGetResult) > 0) {
                                                while ($serviceGetRow = mysqli_fetch_assoc($serviceGetResult)) {

                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $serviceGetRow['itemID']; ?></th>
                                                        <td><img src="../assets/images/items/<?php echo $serviceGetRow['attachment']; ?>" alt="Product Image" style="width:100px"></td>
                                                        <td><?php echo $serviceGetRow['title']; ?></td>
                                                        <td><?php echo $serviceGetRow['shortDescription']; ?></td>
                                                        <td><?php echo $serviceGetRow['price']; ?></td>
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
                </div>
                <br>

                <div class="col py-5 text-center">
                    <h1><b style="color: #000000;">PRODUCTS</b></h1>
                    <!-- table -->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-10">
                                <form class="d-flex py-5" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-secondary table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (mysqli_num_rows($productGetResult) > 0) {
                                                while ($productGetRow = mysqli_fetch_assoc($productGetResult)) {

                                            ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $productGetRow['itemID']; ?></th>
                                                        <td><img src="../assets/images/items/<?php echo $productGetRow['attachment']; ?>" alt="Product Image" style="width:100px"></td>
                                                        <td><?php echo $productGetRow['title']; ?></td>
                                                        <td><?php echo $productGetRow['shortDescription']; ?></td>
                                                        <td><?php echo $productGetRow['price']; ?></td>
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
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>