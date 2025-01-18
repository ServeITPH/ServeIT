<?php

include("sharedAssets/connect.php");

include("admin/adminAssets/user.php");

$searchTerm = '';
$categoryNameFilter = isset($_GET['category']) ? $_GET['category'] : '';

$productListQuery = "SELECT * FROM items WHERE type = 'product'";

if ($categoryNameFilter != '') {
    $productListQuery .= " AND categoryName = '$categoryNameFilter'";
}

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $productListQuery .= " AND (title LIKE '%$searchTerm%' OR shortDescription LIKE '%$searchTerm%' OR categoryName LIKE '%$searchTerm%')";
}

$productListResult = executeQuery($productListQuery);

$productFilterQuery = "SELECT DISTINCT categoryName FROM items WHERE type = 'product'";
$productFilterResult = executeQuery($productFilterQuery);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- css -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/product/product.css">
    <link rel="stylesheet" href="assets/css/footer/footer.css">

    <style>
        .active3 {
            color: #19AFA5;
        }
    </style>
</head>

<body>
    <?php include("sharedAssets/nav.php") ?>

    <div class="container animate__animated animate__fadeIn" style="margin-top: 30px;">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">PRODUCTS</div>
                        <p class="card-text mb-3">Explore a carefully curated selection of digital products, designed
                            and created by the talented minds at ServeIT. Our products combine creativity with
                            functionality, offering innovative solutions to enhance your personal projects or business
                            ventures. Whether you need tools for productivity, design, or development, each product is
                            built to meet your needs and exceed expectations. With easy accessibility and seamless
                            integration, our digital products are perfect for anyone looking to elevate their work with
                            practical, high-quality solutions. Let ServeIT empower your next big idea with the right
                            digital tools.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 animate__animated animate__fadeIn">
        <div class="row justify-content-center align-items-center">
            <form class="row w-100 justify-content-center align-items-center">

                <div class="col-lg-6 col-md-6 col-sm-10 col-8 d-flex justify-content-center align-items-center pt-3">
                    <input class="search-bar form-control me-2" type="text" name="search" placeholder="Search"
                        value="<?php echo $searchTerm ?>" aria-label="Search">
                </div>

                <div class="col-lg-4 col-md-4 col-sm-8 col-6 d-flex justify-content-center align-items-center pt-3">
                    <select class="filter form-control" name="category">
                        <option value="">All</option>
                        <?php while ($productFilterRow = mysqli_fetch_assoc($productFilterResult)) { ?>
                            <option <?php if ($categoryNameFilter == $productFilterRow['categoryName'])
                                echo "selected"; ?>
                                value="<?php echo $productFilterRow['categoryName']; ?>">
                                <?php echo $productFilterRow['categoryName']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-2 d-flex justify-content-center align-items-center pt-3">
                    <button type="submit" class="btnApply btn btn-primary w-100">Apply</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">

            <?php
            while ($productListRow = mysqli_fetch_assoc($productListResult)) {
                ?>

                <div class="col-lg-3 col-6 d-flex flex-row justify-content-center">
                    <div class="productCard rounded mx-auto">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="productImage">
                                <img src="assets/images/items/<?php echo $productListRow['attachment'] ?>"
                                    alt="<?php echo $productListRow['title'] ?>">
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <span class="productTitle"><?php echo $productListRow['title'] ?></span>
                                <span class="productPrice">₱<?php echo $productListRow['price'] ?></span>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="productDescription"><?php echo $productListRow['shortDescription'] ?></p>
                                <a href="productInfo.php?itemID=<?php echo $productListRow['itemID'] ?>">
                                    <button class="btnSeeMore rounded-pill">See More</button>
                                </a>
                            </div>
                            <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                            <div class="category">
                                <span><?php echo $productListRow['categoryName'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="pageNavigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="" aria-label="Previous">
                                <img src="assets/images/about/prev.png" alt="Previous">
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="" aria-label="Next">
                                <img src="assets/images/about/next.png" alt="Next">
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- smpayment -->
    <?php include("sharedAssets/smpayment.php"); ?>
    <!-- footer -->
    <?php include("sharedAssets/footer.php") ?>

    <!-- scroll animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW({
            offset: 200,
            mobile: true,
        }).init();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>