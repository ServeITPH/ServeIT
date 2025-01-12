<?php

include("sharedAssets/connect.php");

session_start();

$userID = $_SESSION['userID'];

if ($userID == "") {
    header("Location: login.php");
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Help Center</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- nav css -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="stylesheet" href="assets/css/footer/footer.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">

    <style>
        .active5 {
            color: #19AFA5;
        }

        .oval {
            width: 800px;
            height: 100px;
            background: black;
            border-radius: 40px;
            justify-content: center;
            display: flex;
            align-items: center;
            color: #19AFA5;

        }

        body {
            background-color: #ffffff;
            background-image: url('assets/images/helpCenter/bg.png');
            background-size: cover;
            background-attachment: fixed;

        }
    </style>

</head>
</head>

<body>
    <?php include("sharedAssets/nav.php"); ?>

    <div class="container" style="margin-top: 30px;">
        <div class="row justify-content-center">
            <div class="oval wow animate__animated animate__fadeIn" data-wow-delay="5s">
                <h1 style="font-family: Poppins; font-weight: 700; font-size: 64px;">HELP CENTER</h1>
            </div>
        </div>
    </div>

    <div class="container wow animate__animated animate__fadeIn">
        <div class="row p-2 mt-4 ">
            <p style="font-family: Poppins; font-size: 40px;">
                Welcome to GigHUB, How can we help?
            </p>
        </div>
        <div class="row justify-content-center ">
            <div class="col-12 col-sm-12 col-md-8 col-lg-7 d-flex align-items-center mt-3 px-5">
                <input type="search" class="form-control" id="searchbox" placeholder="Search">
                <button class="btn p-0 border-0 mx-3" style="width:auto; height:auto;">
                    <img src="assets/images/helpCenter/searchButton.png" alt="Search Button"
                        style="width: 50px; height:auto; ">
                </button>
            </div>
            <div class="col d-none d-sm-none d-md-block col-md-3 col-lg-3 wow animate__animated animate__fadeIn"
                data-wow-delay="5s">
                <img src="assets/images/helpCenter/logo.png" alt="Logo" style="width: 200px; height:auto;">

            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-7 col-sm-7 col-md-5 col-lg-4 col-xl-4 m-5 ">
                <div class="card align-items-center p-5 p-2 wow animate__animated animate__fadeIn" data-wow-delay="5s"
                    style="background-color: white; box-shadow: 0 4px 8px 4px rgba(0, 0, 0, 0.2); border-radius: 20px">
                    <button class="btn p-0 border-0" style="font-size: 24px;">
                        <p>ICON BUYER</p>
                    </button>
                    <button class="btn p-0 border-0" style="font-size: 32px; font-family: Poppins;">
                        <p>For Buyers</p>
                    </button>
                    <button class="btn p-0 border-0" style="font-size: 24px; font-weight: 700;font-family: Poppins;">
                        <p style="color:#19AFA5">20 Articles</p>
                    </button>
                </div>
            </div>
            <div class="row m-3 wow animate__animated animate__fadeInUp" data-wow-duration="5s">
                <h1 style="font-size: 40px; font-weight: 500;font-family: Poppins; text-align: center;">Most Popular
                    Articles
                </h1>
            </div>

        </div>
        <div class="row m-5 wow animate__animated animate__fadeInUp" data-wow-duration="5s">
            <button class="btn p-0 border-0 d-flex justify-content-start">
                <p style="font-size: 32px; font-weight: 700;font-family: Poppins;text-align: left;">How to buy digital
                    Product?</p>
            </button>
            <button class="btn p-0 border-0 d-flex justify-content-start">
                <p style="font-size: 32px; font-weight: 700;font-family: Poppins;text-align: left;">How to add to cart?
                </p>
            </button>
            <button class="btn p-0 border-0 d-flex justify-content-start">
                <p style="font-size: 32px; font-weight: 700;font-family: Poppins;text-align: left;">How to pay via
                    online?</p>
            </button>
            <button class="btn p-0 border-0 d-flex justify-content-start">
                <p style="font-size: 32px; font-weight: 700;font-family: Poppins; text-align: left;">How to download
                    purchased products.</p>
            </button>
        </div>
    </div>

    <!-- footer -->
    <?php include("sharedAssets/footer.php") ?>

    <!-- icons -->
    <script src="https://kit.fontawesome.com/d3ed67e674.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>