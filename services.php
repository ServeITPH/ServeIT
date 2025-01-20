<?php

include("sharedAssets/connect.php");

include("admin/adminAssets/user.php");

// Count Visit
$page = "Services";
include("sharedAssets/counter.php");

$searchTerm = '';
$categoryNameFilter = isset($_GET['category']) ? $_GET['category'] : '';

$serviceListQuery = "SELECT * FROM items WHERE type = 'service'";

if ($categoryNameFilter != '') {
    $serviceListQuery .= " AND categoryName = '$categoryNameFilter'";
}

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $searchTerm = str_replace('\'', '', $searchTerm);
    $serviceListQuery .= " AND (title LIKE '%$searchTerm%' OR shortDescription LIKE '%$searchTerm%' OR categoryName LIKE '%$searchTerm%')";
}

$serviceListResult = executeQuery($serviceListQuery);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Services</title>
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
    <link rel="stylesheet" href="assets/css/services/services.css">
    <link rel="stylesheet" href="assets/css/footer/footer.css">

    <style>
        .active2 {
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
                        <div class="card-title">SERVICES</div>
                        <p class="card-text text-center mb-3">Explore curated selections of digital services, designed
                            and created by the talented minds at ServeIT. Our services combine creativity with
                            functionality, offering innovative solutions to enhance your personal projects or business
                            ventures. Whether you need tools for productivity, design, or development, each product is
                            built to meet your needs and exceed expectations. With easy accessibility and seamless
                            integration, our digital services are perfect for anyone looking to elevate their work with
                            practical, high-quality solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4 animate__animated animate__fadeIn">
        <div class="row justify-content-center align-items-center">
            <form class="row w-100 justify-content-center align-items-center">

                <div class="col-lg-10 col-md-8 col-sm-7 col-7 d-flex justify-content-center align-items-center pt-3">
                    <input class="search-bar form-control me-2" type="search" name="search" placeholder="Search"
                        value="<?php echo $searchTerm ?>" aria-label="Search">
                </div>

                <div class="col-2 d-flex justify-content-center align-items-center pt-3">
                    <button type="submit" class="btnApply btn btn-primary w-100">Apply</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">

            <?php
            while ($serviceListRow = mysqli_fetch_assoc($serviceListResult)) {
            ?>

                <div class="col-lg-3 col-6 d-flex flex-row justify-content-center">
                    <div class="serviceCard rounded mx-auto">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <div class="serviceImage">
                                <img src="assets/images/items/<?php echo $serviceListRow['attachment'] ?>"
                                    alt="<?php echo $serviceListRow['title'] ?>">
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <span class="serviceTitle"><?php echo $serviceListRow['title'] ?></span>
                                <span class="servicePrice">₱<?php echo $serviceListRow['price'] ?></span>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="serviceDescription"><?php echo $serviceListRow['shortDescription'] ?></p>
                                <a href="serviceInfo.php?itemID=<?php echo $serviceListRow['itemID'] ?>">
                                    <button class="btnSeeMore rounded-pill">See More</button>
                                </a>
                            </div>
                            <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                            <div class="category">
                                <span><?php echo $serviceListRow['categoryName'] ?></span>
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
                        <li class="page-item" onclick="previousPage()">
                            <a class="page-link" href="#" aria-label="Previous">
                                <img src="assets/images/about/prev.png" alt="Previous">
                            </a>
                        </li>
                        <li class="page-item" onclick="goToPage(1)">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item" onclick="goToPage(2)">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item" onclick="goToPage(3)">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item" onclick="goToPage(4)">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item" onclick="goToPage(5)">
                            <a class="page-link" href="#">5</a>
                        </li>
                        <li class="page-item" onclick="goToPage(6)">
                            <a class="page-link" href="#">6</a>
                        </li>
                        <li class="page-item" onclick="goToPage(7)">
                            <a class="page-link" href="#">7</a>
                        </li>
                        <li class="page-item" onclick="goToPage(8)">
                            <a class="page-link" href="#">8</a>
                        </li>
                        <li class="page-item" onclick="nextPage()">
                            <a class="page-link" href="#" aria-label="Next">
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

    <script>
        var page = 1;
        var cardsPerPage = 12;
        var totalServiceCards = document.getElementsByClassName('productCard').length;
        var totalPages = Math.ceil(totalServiceCards / cardsPerPage);

        function goToPage(pageNumber) {
            if (pageNumber >= 1 && pageNumber <= totalPages) {
                page = pageNumber;
                updatePage();
            }
        }

        function nextPage() {
            if (page < totalPages) {
                page += 1;
                updatePage();
            }
        }

        function previousPage() {
            if (page > 1) {
                page -= 1;
                updatePage();
            }
        }

        function updatePage() {
            var allServiceCards = document.getElementsByClassName('serviceCard');
            var startIndex = (page - 1) * cardsPerPage;
            var endIndex = page * cardsPerPage;

            for (var i = 0; i < allServiceCards.length; i++) {
                allServiceCards[i].style.display = 'none';
            }

            for (var i = startIndex; i < endIndex && i < allServiceCards.length; i++) {
                allServiceCards[i].style.display = 'block';
            }

            updatePagination();
        }

        function updatePagination() {
            var paginationItems = document.getElementById('pagination').getElementsByClassName('page-item');

            for (var i = 0; i < paginationItems.length - 2; i++) {
                var pageNum = i + 1;
                if (pageNum === page) {
                    paginationItems[i + 1].classList.add('active');
                } else {
                    paginationItems[i + 1].classList.remove('active');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            updatePage();
        });
    </script>

</body>

</html>