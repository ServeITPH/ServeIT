<?php

include("sharedAssets/connect.php");

include("admin/adminAssets/user.php");

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
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
            width: 100%;
            height: auto;
            background: black;
            border-radius: 60px;
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

        .text {
            font-size: 24px;
            font-weight: 700;
            font-family: Poppins;
            text-align: left;
        }

        @media(max-width: 767px) {
            .text {
                font-size: 16px;
            }
        }

        .information {
            padding-bottom: 15px;
        }

        .expandbtn-img {
            width: 30px;
            height: 30px;
        }

        @media (max-width: 767px) {
            .expandbtn-img {
                width: 20px;
                height: 20px;
            }
        }
    </style>

</head>
</head>

<body>
    <?php include("sharedAssets/nav.php"); ?>

    <div class="container" style="margin-top: 30px;">
        <div class="row justify-content-center">
            <div class="oval wow animate__animated animate__fadeIn" data-wow-delay="5s">
                <h1 style="font-family: Poppins; font-weight: 700; font-size: 70px;">HELP CENTER</h1>
            </div>
        </div>
    </div>

    <div class="container wow animate__animated animate__fadeIn">
        <div class="row p-2 mt-5 ">
            <p style="font-family: Poppins; font-size: 32px;">
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
                <h1 style="font-size: 32px; font-weight: bold;font-family: Poppins; padding-top:25px">Frequently asked questions
                </h1>
            </div>

        </div>
        <div class="faqs m-5 wow animate__animated animate__fadeInUp" data-wow-duration="5s">
            <div class="row d-flex justify-content-start">
                <button class="btnExpand  btn p-0 border-0 d-flex justify-content-start" onclick="expandContent(this)">
                    <img src="assets/images/helpCenter/plus.png" alt="Expand Button" class="expandbtn-img">

                    <div class="text ps-3 d-flex align-items-center ">
                        <p>How to buy digital Product?</p>
                    </div>
                </button>
                <div class="information" id="information" style="display: none">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit nemo magnam libero et aliquam
                    adipisci, ullam, illo quasi rerum voluptatibus, atque est numquam doloribus ex quae? Dolore quam
                    voluptatibus repellendus?
                </div>
            </div>
            <div class="row d-flex justify-content-start">
                <button class="btnExpand  btn p-0 border-0 d-flex justify-content-start" onclick="expandContent(this)">
                    <img src="assets/images/helpCenter/plus.png" alt="Expand Button" class="expandbtn-img">

                    <div class="text ps-3 d-flex align-items-center">
                        <p>How to add to cart?</p>
                    </div>
                </button>
                <div class="information" id="information" style="display: none">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit nemo magnam libero et aliquam
                    adipisci, ullam, illo quasi rerum voluptatibus, atque est numquam doloribus ex quae? Dolore quam
                    voluptatibus repellendus?
                </div>

            </div>
            <div class="row d-flex justify-content-start">
                <button class="btnExpand  btn p-0 border-0 d-flex justify-content-start" onclick="expandContent(this)">
                    <img src="assets/images/helpCenter/plus.png" alt="Expand Button" class="expandbtn-img">

                    <div class="text ps-3 d-flex align-items-center">
                        <p>How to pay via online?</p>
                    </div>
                </button>
                <div class="information" id="information" style="display: none">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit nemo magnam libero et aliquam
                    adipisci, ullam, illo quasi rerum voluptatibus, atque est numquam doloribus ex quae? Dolore quam
                    voluptatibus repellendus?
                </div>
            </div>
            <div class="row d-flex justify-content-start">
                <button class="btnExpand  btn p-0 border-0 d-flex justify-content-start" onclick="expandContent(this)">
                    <img src="assets/images/helpCenter/plus.png" alt="Expand Button" class="expandbtn-img">

                    <div class="text ps-3 d-flex align-items-center">
                        <p>How to download purchased products.</p>
                    </div>
                </button>
                <div class="information" id="information" style="display: none">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aspernatur minima exercitationem
                    numquam commodi rerum id veritatis! Vitae, molestiae vel? Quasi, molestiae atque. Eos repellat error
                    doloribus saepe laboriosam vel?
                </div>
            </div>
        </div>
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
        var display = "none";

        function expandContent(button) {
            const information = button.nextElementSibling;
            const img = button.querySelector('img');

            if (information.style.display === "none" || information.style.display === "") {
                information.style.display = "block";
                img.src = "assets/images/helpCenter/minus.png";
            } else {
                information.style.display = "none";
                img.src = "assets/images/helpCenter/plus.png";
            }
        }
    </script>
    <script>
        new WOW().init();
    </script>
</body>

</html>