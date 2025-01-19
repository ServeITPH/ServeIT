<?php

include("sharedAssets/connect.php");
include("assets/php/about/aboutContent.php");

session_start();

$userID = $_SESSION['userID'];
$role = $_SESSION['role'];

if ($userID == "") {
    header("Location: login.php");
}

if ($role == "admin") {
    header("Location: admin/index.php");
}


// counter
$userCountQuery = "SELECT COUNT(userID) AS userCount FROM users";
$userCountResult = executeQuery($userCountQuery);
$userCount = 0;
while ($userCountRow = mysqli_fetch_assoc($userCountResult)) {
    $userCount = $userCountRow['userCount'];
}

$transactionCountQuery = "SELECT COUNT(transactionID) AS transactionCount FROM transactions";
$transactionCountResult = executeQuery($transactionCountQuery);
$transactionCount = 0;
while ($transactionCountRow = mysqli_fetch_assoc($transactionCountResult)) {
    $transactionCount = $transactionCountRow['transactionCount'];
}

$productCountQuery = "SELECT COUNT('itemID') AS productCount FROM items WHERE type = 'product'";
$productCountResult = executeQuery($productCountQuery);
$productCount = 0;
while ($productCountRow = mysqli_fetch_assoc($productCountResult)) {
    $productCount = $productCountRow['productCount'];
}

//new arrival list
$newArrivalQuery = "SELECT * FROM items WHERE type = 'product' ORDER BY type DESC LIMIT 4;";
$newArrivalResult = executeQuery($newArrivalQuery);


// product title list 
$productTitleQuery = "SELECT title, description FROM items WHERE itemID IN (5, 9, 10, 20, 71, 29);";
$productTitleResult = executeQuery($productTitleQuery);

// service title list 
$serviceTitleQuery = "SELECT title, description FROM items WHERE type ='service' LIMIT 6";
$serviceTitleResult = executeQuery($serviceTitleQuery);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="stylesheet" href="assets/css/landing-page/style.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/footer/footer.css">

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        .active1 {
            color: #19AFA5;
        }
    </style>

</head>

<body>
    <!-- nav-bar -->
    <?php include("sharedAssets/nav.php"); ?>

    <!-- home-page banner -->

    <div class="container animate__animated animate__fadeIn">
        <div class="banner-container">
            <div class="banner-info-container px-5">
                <div class="banner-title ">
                    YOUR GETAWAY TO MULTITALENTED <span style=" color: #19AFA5 ">SOLUTIONS</span>
                </div>
                <div class="banner-subtitle px-5">
                    Effortlessly connect with top-tier sellers, browse a wide range of services, and achieve your goals
                    with ease. Designed for clients and sellers, all in one secure and seamless platform.
                </div>

                <a href="explore.php"><button class="btn btn-outline-primary my-3" type="submit">Explore
                        Now</button></a>
            </div>
        </div>
    </div>

    <!-- count -->
    <div class="container main-count-container animate__animated animate__fadeIn">
        <div class="row ">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="count-container ">
                    <div class="count-num">
                        <?php echo $userCount ?>
                    </div>
                    <div class="title-count">
                        REGISTERED MEMBERS</span>
                    </div>
                    <div class="subtitle">
                        Count of users who have successfully signed up on the website.
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="count-container">
                    <div class="count-num">
                        <?php echo $transactionCount ?>
                    </div>
                    <div class="title-count">
                        HAPPY CUSTOMERS</span>
                    </div>
                    <div class="subtitle">
                        Number of satisfied users who provided positive feedback or completed purchases.
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="count-container">
                    <div class="count-num">
                        <?php echo $productCount ?>
                    </div>
                    <div class="title-count">
                        AVAILABLE PRODUCT</span>
                    </div>
                    <div class="subtitle">
                        Total inventory of products currently listed and in stock on the website.
                    </div>
                </div>

            </div>
        </div>
        <div class="subtitle mx-5 text-center" style="padding-top: 60px;">
            See the number of registered users, satisfied customers, and available products at a glance.
        </div>
    </div>

    <!-- SECTION DIVIDER -->
    <div class="container">
        <div class="line-divider">
        </div>
    </div>


    <!-- Latest Product -->
    <div class="container my-5  wow animate__animated animate__fadeInUp ">
        <div class="row">
            <div>
                <div class="title text-center mb-2 animate__animated animate__pulse animate__infinite">
                    <span style=" color: #19AFA5 ">New </span>Arrivals
                </div>
                <div class="subtitle text-center">
                    Get ready to be amazed by our latest arrivals! Fresh styles, innovative products, and exclusive
                    deals all waiting for you. Discover the perfect addition to your collection today and stay ahead of
                    the trends. Your next favorite item is just a click away!
                </div>
            </div>

        </div>
    </div>

    <div class="container wow animate__animated animate__fadeInUp ">
        <div class="row d-flex justify-content-center align-items-center">
            <?php
            while ($newArrivalRow = mysqli_fetch_assoc($newArrivalResult)) {
                ?>

                <div class="col d-flex flex-row">
                    <div class="productCard rounded mx-auto">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                            <div class="productImage">
                                <img src="assets/images/items/<?php echo $newArrivalRow['attachment'] ?>"
                                    alt="<?php echo $newArrivalRow['title'] ?>">
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <span class="productTitle"><?php echo $newArrivalRow['title'] ?></span>
                                <span class="productPrice">₱<?php echo $newArrivalRow['price'] ?></span>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="productDescription"><?php echo $newArrivalRow['shortDescription'] ?></p>
                                <a href="productInfo.php?itemID=<?php echo $newArrivalRow['itemID'] ?>">
                                    <button class="btnSeeMore rounded-pill">See More</button>
                                </a>
                            </div>
                            <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                            <div class="category">
                                <span><?php echo $newArrivalRow['categoryName'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>
        </div>
        <!-- button -->
        <div>
            <div class="d-flex justify-content-end">
                <a class="btn btn-more btn-primary mx-auto mb-3" href="products.php"> More Products</a>
            </div>
        </div>
    </div>

    <!-- SECTION DIVIDER -->
    <div class="container">
        <div class="line-divider">
        </div>
    </div>


    <!-- Services -->
    <div class="container my-5 wow animate__animated animate__fadeInUp ">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="title">
                    Services
                </div>
                <div class="subtitle text-justify">
                    ServeIT delivers quality, affordable digital services designed for your convenience. Whether for
                    personal or professional use, our services are available anytime, anywhere, offering unmatched
                    flexibility to suit your needs.

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-more btn-primary mx-auto" href="services.php"> More Services</a>
                </div>
            </div>
        </div>

    </div>

    <div class="container wow animate__animated animate__fadeInUp ">
        <div class="services-container row">
            <?php
            while ($serviceTitleRow = mysqli_fetch_assoc($serviceTitleResult)) {
                ?>
                <div class="col-12 col-md-4 my-4">
                    <div class="row">
                        <div class="services-title text-center">
                            <?php
                         $title = $serviceTitleRow['title']; 
                         $titleParts = explode(' ', $title); 
                         if (count($titleParts) >= 2) {
                             $limitedTitle = ' <span style=" color: #19AFA5;"> ' . $titleParts[0] . '</span>' . ' ' . $titleParts[1];
                             echo $limitedTitle;
                         } else {
                             echo $title; 
                         }
                            ?>
                        </div>
                    </div>
                    <div class="subtitle text-center">
                        <?php echo $serviceTitleRow['description'] ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- SECTION DIVIDER -->
    <div class="container wow animate__animated animate__fadeInUp ">
        <div class="line-divider">
        </div>
    </div>

    <!-- products -->

    <div class="container my-5 wow animate__animated animate__fadeInUp ">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="title mb-2">
                    Digital Products
                </div>
                <div class="subtitle text-justify">
                    Discover a curated collection of digital products crafted by our ServeIT talented creators. Each
                    product blends creativity and practicality, providing effective solutions for your projects or
                    business ventures.

                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-more btn-primary mx-auto" href="products.php"> More Products</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container wow animate__animated animate__fadeInUp">
        <div class="services-container row">
            <div class="container">
                <div class="services-container row">

                    <?php
                    while ($productTitleRow = mysqli_fetch_assoc($productTitleResult)) {
                        ?>
                        <div class="col-12 col-md-4 my-4">
                            <div class="row">
                                <div class="services-title text-center">
                                    <div class="services-title text-center">
                                        <?php
                                        $title = $productTitleRow['title']; 
                                        $titleParts = explode(' ', $title); 
                                        if (count($titleParts) >= 2) {
                                            $limitedTitle = ' <span style=" color: #19AFA5;"> ' . $titleParts[0] . '</span>' . ' ' . $titleParts[1];
                                            echo $limitedTitle;
                                        } else {
                                            echo $title; 
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="subtitle text-center">
                                <?php echo $productTitleRow['description'] ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION DIVIDER -->
    <div class="container">
        <div class="line-divider">
        </div>
    </div>


    <!-- smpayment -->
    <?php include("sharedAssets/smpayment.php"); ?>

    <!-- SECTION DIVIDER -->
    <div class="container">
        <div class="line-divider">
        </div>
    </div>


    <!-- about -->
    <div class="container my-5 wow animate__animated animate__fadeInUp ">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 mb-4">
                <div class="mb-3 about-title">ABOUT</div>
                <div class="text-justify about-subtitle">
                    <span style="color: #19AFA5; font-weight: bold;">Services and Conversations in One Place</span>
                    ServeIT is more than just a platform—it’s a community built on innovation and connection. We offer
                    exceptional digital services and products to meet your needs. Through meaningful conversations, we
                    bring people together to collaborate and grow. Our goal is to empower individuals to thrive in the
                    digital age. Explore what ServeIT can do for you and be part of something
                    extraordinary.
                </div>
                <a class="btn btn-primary mt-3 about-btn" href="about.php">More</a>
            </div>
            <div class="col-lg-5 col-md-12 text-center">
                <div class="img-container">
                    <img src="assets/images/landing-page/about-icon.png" class="img-fluid" alt="About Icon">
                </div>
            </div>
        </div>
    </div>

    <!-- Meet the Team -->
    <div class="team text-center py-5 wow animate__animated animate__fadeInUp ">
        <div class="container">
            <div class="team-title">TEAM</div>
            <?php
            include("assets/php/about/carousel.php");
            ?>
        </div>
    </div>

    <!-- footer -->
    <?php include("sharedAssets/footer.php") ?>




    <!-- icons -->
    <script src="https://kit.fontawesome.com/d3ed67e674.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- scroll animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW({
            offset: 200,
            mobile: true,
        }).init();
    </script>
</body>