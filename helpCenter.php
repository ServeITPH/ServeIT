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
    <link rel="stylesheet" href="assets/css/help/style.css">


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
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("assets/images/about/bg.png");
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
            opacity: 0.8;
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
                Welcome to ServeIT, How can we help?
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

            <div class="row wow animate__animated animate__fadeInUp" data-wow-duration="5s">
                <h1 style="font-size: 40px; font-weight: bold;font-family: Poppins;">FAQS
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