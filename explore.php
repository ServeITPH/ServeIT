<?php
include("sharedAssets/connect.php");

include("admin/adminAssets/user.php");

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Explore</title>
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
        .card-custom {
            border-radius: 20px;
            background-color: #1c1c1c;
            color: #fff;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 200px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .card-custom:hover {
            transform: translateY(-10px);
            background-color: #222222;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border: 2px solid #19AFA5;
        }

        .card-link {
            text-decoration: none;
            color: inherit;
        }

        .card-custom i {
            font-size: 40px;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .card-custom:hover i {
            color: #19AFA5;
        }

        .card-custom h3 {
            font-size: 18px;
            font-weight: 600;
            margin-top: 10px;
            transition: transform 0.3s ease;
        }

        .card-custom:hover h3 {
            transform: translateY(-5px);
        }

        @media (max-width: 576px) {
            .card-custom {
                height: 180px;
            }

            .card-custom h3 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <!-- nav-bar -->
    <nav class="navbar navbar-light bg-dark">
        <div class="container justify-content-center nav-bar-style">
            <a class="navbar-brand mb-2" href="index.php">
                <img src="assets/images/nav/exploreNav.png" alt="Logo" width="200" height="34"
                    class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>

    <div class="container pt-3 pb-2 animate__animated animate__fadeIn">
        <div class="row g-5 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="index.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-home"></i>
                        <h3>Home</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="products.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-box"></i>
                        <h3>Products</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="services.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-comment-dots"></i>
                        <h3>Services</h3>
                    </div>
                </a>
            </div>
        </div>
        <div class="row g-5 justify-content-center mt-4">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="profile.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-user"></i>
                        <h3>Account</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="cart.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-shopping-cart"></i>
                        <h3>Cart</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="chats.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-comment"></i>
                        <h3>Message Us</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="login.php" class="card-link">
                    <div class="card-custom">
                        <i class="fa fa-sign-out-alt"></i>
                        <h3>Log-out</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <div class="text-center">
            <p class="lead"><i>Uncover a wide range of services designed to enhance your experience. Dive into our
                    curated offerings!</i></p>
        </div>
    </div>

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

</html>