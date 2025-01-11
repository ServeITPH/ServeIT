<?php

include("sharedAssets/connect.php");
include("assets/php/about/aboutContent.php");

session_start();

$userID = $_SESSION['userID'];

if ($userID == "") {
    header("Location: login.php");
}

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

    <!-- nav css -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="stylesheet" href="assets/css/landing-page/style.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/footer/footer.css">


    <!-- WOW.js animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">



    <style>
        .active1 {
            color: #19AFA5;
        }
    </style>

</head>
</head>

<body>
    <!-- nav-bar -->
    <?php include("sharedAssets/nav.php"); ?>

    <!-- home-page banner -->

    <div class="container">
        <div class="banner-container">
            <div class="banner-info-container px-5">
                <div class="banner-title ">
                    YOUR GETAWAY TO MULTITALENTED <span style=" color: #19AFA5 ">SOLUTIONS</span>
                </div>
                <div class="banner-subtitle">
                    Discover a world of services, connect with top experts, communicate effortlessly, and achieve your
                    goals all
                    in one secure and convenient platform.
                </div>
                <form class="d-flex justify-content-center align-items-center my-3" role="search">
                    <input class="me-2 search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <!-- count -->
    <div class="container main-count-container">
        <div class="row ">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="count-container ">
                    <div class="count-num">
                        0
                    </div>
                    <div class="title-count">
                        REGISTERED MEMBERS</span>
                    </div>
                    <div class="subtitle">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="count-container">
                    <div class="count-num">
                        0
                    </div>
                    <div class="title-count">
                        HAPPY CUSTOMERS</span>
                    </div>
                    <div class="subtitle">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="count-container">
                    <div class="count-num">
                        0
                    </div>
                    <div class="title-count">
                        AVAILABLE PRODUCT</span>
                    </div>
                    <div class="subtitle">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    </div>
                </div>

            </div>
        </div>
        <div class="subtitle mx-5 text-center" style="padding-top: 60px;">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo
            consequat.
        </div>
    </div>

    <!-- SECTION DIVIDER -->
    <div class="container">
        <div class="line-divider">
        </div>
    </div>

    <!-- Services -->
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="title">
                    Services
                </div>
                <div class="subtitle text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-more btn-primary mx-auto" href="services.php"> More Services</a>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="services-container row">

            <!-- duplicate -->
            <div class="col-12 col-md-4 my-4">
                <div class="row">
                    <div class="col-2">
                        icon
                    </div>
                    <div class="col-10 services-title">
                        LOREM IPSUM
                    </div>
                </div>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>

            <div class="col-12 col-md-4 my-4">
                <div class="row">
                    <div class="col-2">
                        icon
                    </div>
                    <div class="col-10 services-title">
                        LOREM IPSUM
                    </div>
                </div>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>

            <div class="col-12 col-md-4 my-4">
                <div class="row">
                    <div class="col-2">
                        icon
                    </div>
                    <div class="col-10 services-title">
                        LOREM IPSUM
                    </div>
                </div>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>

            <div class="col-12 col-md-4 my-4">
                <div class="row">
                    <div class="col-2">
                        icon
                    </div>
                    <div class="col-10 services-title">
                        LOREM IPSUM
                    </div>
                </div>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>

            <div class="col-12 col-md-4 my-4">
                <div class="row">
                    <div class="col-2">
                        icon
                    </div>
                    <div class="col-10 services-title">
                        LOREM IPSUM
                    </div>
                </div>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>

            <div class="col-12 col-md-4 my-4">
                <div class="row">
                    <div class="col-2">
                        icon
                    </div>
                    <div class="col-10 services-title">
                        LOREM IPSUM
                    </div>
                </div>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>

        </div>
    </div>

    <!-- SECTION DIVIDER -->
    <div class="container">
        <div class="line-divider">
        </div>
    </div>

    <!-- products -->

    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-8">
                <div class="title mb-2">
                    Digital Products
                </div>
                <div class="subtitle text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
                    ea commodo
                    consequat.
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="d-flex justify-content-end">
                <a class="btn btn-more btn-primary mx-auto" href="products.php"> More Services</a>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="services-container row">


            <div class="container">
                <div class="services-container row">

                    <div class="col-12 col-md-4 my-4">
                        <div class="row">
                            <div class="col-2">
                                icon
                            </div>
                            <div class="col-10 services-title">
                                LOREM IPSUM
                            </div>
                        </div>
                        <div class="subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea
                            commodo
                            consequat.
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-4">
                        <div class="row">
                            <div class="col-2">
                                icon
                            </div>
                            <div class="col-10 services-title">
                                LOREM IPSUM
                            </div>
                        </div>
                        <div class="subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea
                            commodo
                            consequat.
                        </div>
                    </div>

                    <div class="col-12 col-md-4 my-4">
                        <div class="row">
                            <div class="col-2">
                                icon
                            </div>
                            <div class="col-10 services-title">
                                LOREM IPSUM
                            </div>
                        </div>
                        <div class="subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea
                            commodo
                            consequat.
                        </div>
                    </div>

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

    <div class="container">
        <div class="smpayment-container">
            <div class="main-smpayment-title text-center">
                <span style=" color: #000000 ">SIMPLIFIED </span>PAYMENT
            </div>
            <div class="row ">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="smpayment-info-container">
                        <div class="smpayment-icon">
                            icon
                        </div>
                        <div class="smpayment-title">
                            LOREM IPSUM
                        </div>
                        <div class="subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="smpayment-info-container">
                        <div class="smpayment-icon">
                            icon
                        </div>
                        <div class="smpayment-title">
                            LOREM IPSUM
                        </div>
                        <div class="subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="smpayment-info-container">
                        <div class="smpayment-icon">
                            icon
                        </div>
                        <div class="smpayment-title">
                            LOREM IPSUM
                        </div>
                        <div class="subtitle">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                            ut
                            aliquip ex ea commodo consequat.
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

        <!-- SECTION DIVIDER -->
        <div class="container">
        <div class="line-divider">
        </div>
    </div>


    <!-- about -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-12 mb-4">
                <div class="mb-3 about-title">ABOUT</div>
                <div class="text-justify about-subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                    aliquip ex
                    ea commodob consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
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
    <div class="team text-center py-5">
        <div class="container">
            <div class="team-title">TEAM</div>
            <?php
            include("assets/php/about/carousel.php");
            ?>
        </div>



    <!-- help -->

    <div class="container-fluid help-section">
        <div class="help-title">
            HOW CAN WE HELP?
        </div>
        <form class="d-flex justify-content-center align-items-center m-0" role="search">
            <input class="me-2 need-help" type="search" placeholder="need help?" aria-label="Search">
            <button class="btn btn-outline-primary need-help-btn" type="submit">Send</button>
        </form>

    </div>




    <!-- main footer -->

    <div class="container-fluid" style="background-color: #000000">
        <div class="container">
            <footer class="text-center text-lg-start text-white">
                <div class="container-fluid p-4 pb-0">
                    <section class="">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                                <h6 class="text-uppercase mb-1" style="font-family:Dela Gothic One, sans-serif;">
                                    SERVE<span style="color:#19AFA5; ">IT</span>
                                </h6>
                                <p style="font-size: 12px;">
                                    The content on the Serve It website is provided for informational purposes only.
                                    While
                                    we strive to ensure accuracy, we do not guarantee the completeness, reliability, or
                                    timeliness of the information. Use of our website and services is at your own risk.
                                    Serve It is not liable for any damages or losses resulting from reliance on our
                                    content
                                    or services. By using our site, you agree to these terms.
                                </p>
                            </div>
                            <hr class="w-100 clearfix d-md-none" />
                            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 text-center">
                                <h6 class="text-uppercase mb-4 font-weight-bold">MarketPlace</h6>
                                <p><a class="text-white">Services</a></p>
                                <p><a class="text-white">Products</a></p>
                            </div>
                            <hr class="w-100 clearfix d-md-none" />
                            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 text-center">
                                <h6 class="text-uppercase mb-4 font-weight-bold">COMPANY</h6>
                                <p><a class="text-white">About ServeIt</a></p>
                                <p><a class="text-white">Help Center</a></p>
                                <p><a class="text-white">Contact Us</a></p>
                            </div>
                            <hr class="w-100 clearfix d-md-none" />
                            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-center">
                                <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                                <p><i class="fa-brands fa-tiktok mx-1"></i> ServeIT</p>
                                <p><i class="fa-brands fa-github mx-1"></i> Serve-IT</p>
                                <p><i class="fa-brands fa-discord mx-1"></i>Serve-IT.ph</p>
                            </div>
                        </div>
                    </section>
                    <hr class="my-3">
                    <section class="p-3 pt-0">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-7 col-lg-8 text-center text-md-start">
                                <div class="p-3">
                                    © 2024 Copyright:
                                    <a href="" style="color:#19AFA5">Serve-It.Ph</a>
                                </div>
                            </div>
                            <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                                <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                        class="fab fa-github"></i></a>
                                <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                        class="fab fa-google"></i></a>
                                <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                        class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </section>
                </div>
            </footer>
        </div>
    </div>




    <!-- icons -->
    <script src="https://kit.fontawesome.com/d3ed67e674.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>