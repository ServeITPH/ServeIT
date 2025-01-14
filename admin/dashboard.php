<?php
include("../sharedAssets/connect.php");

session_start();

$userID = $_SESSION['userID'];
// Service Count
$countServiceQuery = "SELECT COUNT(itemID) AS countService FROM `items` WHERE type = 'services'";
$countServiceResult = executeQuery($countServiceQuery);
$serviceCount = 0;

while ($countServiceRow = mysqli_fetch_assoc($countServiceResult)) {
    $serviceCount = $countServiceRow['countService'];
}

// Product Count
$countProductQuery = "SELECT COUNT(itemID) AS countProduct FROM `items` WHERE type = 'products'";
$countProductResult = executeQuery($countProductQuery);
$productCount = 0;

while ($countProductRow = mysqli_fetch_assoc($countProductResult)) {
    $productCount = $countProductRow['countProduct'];
}
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
                    <h1><b>PRODUCTS</b></h1>
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
                                            <tr>
                                                <th scope="row">2</th>
                                                <td><img src="#" alt="Product Image"></td>
                                                <td>drawing commision</td>
                                                <td>tutor</td>
                                                <td>9.99</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td><img src="#" alt="Product Image"></td>
                                                <td>graphic drawing</td>
                                                <td>tutor</td>
                                                <td>9.99</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td><img src="#" alt="Product Image"></td>
                                                <td>pics</td>
                                                <td>tutor</td>
                                                <td>9.99</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="col py-5 text-center">
                    <h1><b style="color: #000000;">SERVICES</b></h1>
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
                                            <tr>
                                                <th scope="row">2</th>
                                                <td><img src="#" alt="Service Image"></td>
                                                <td>drawing commision</td>
                                                <td>tutor</td>
                                                <td>9.99</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td><img src="#" alt="Service Image"></td>
                                                <td>graphic drawing</td>
                                                <td>tutor</td>
                                                <td>9.99</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td><img src="#" alt="Service Image"></td>
                                                <td>pics</td>
                                                <td>tutor</td>
                                                <td>9.99</td>
                                            </tr>
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