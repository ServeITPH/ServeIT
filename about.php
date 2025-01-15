<?php
include("sharedAssets/connect.php");
include("assets/php/about/aboutContent.php");
include("admin/adminAssets/user.php");

if ($userID == "") {
    header("Location: login.php");
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- WOW.js animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- nav css -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="stylesheet" href="assets/css/about/about.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/footer/footer.css">

    <style>
        .active4 {
            color: #19AFA5;
        }
    </style>
</head>

<body>
    <?php include("sharedAssets/nav.php"); ?>

    <div class="container wow animate__animated animate__fadeIn"
        style="margin-top: 30px;  justify-content: center;  display: flex;">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ABOUT US</h5>
                        <p class="card-text mb-3">
                            <?php echo $abtUsContent; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Story -->
    <div class="container wow animate__animated animate__fadeInUp"
        style="margin-top: 30px;  justify-content: center;  display: flex;">
        <div class="row">
            <div class="col">
                <div class="card storyCard">
                    <div class="card-body">
                        <h5 class="story-title"><span>Our</span> <span>Story</span></h5>
                        <p class="card-text mb-3" style="text-indent: 50px;">
                            <?php echo $storyContent; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Meet the Team -->
    <div class="team text-center py-5">
        <div class="container wow animate__animated animate__fadeInUp">
            <h1 class="fw-bold text-dark mb-4">Meet the Team</h1>
            <?php
            include("assets/php/about/carousel.php");
            ?>
        </div>

        <div class="links text-center py-5">
            <div class="container wow animate__animated animate__fadeInUp">
                <div class="line mb-4"></div>
                <h2 class="fw-bold mb-4">More Ways to Connect With Our Team</h2>
                <p class="mx-auto"><?php echo $connect; ?></p>
                <?php include("assets/php/about/links.php"); ?>
            </div>
        </div>
    </div>

    <!-- smpayment -->
    <?php include("sharedAssets/smpayment.php"); ?>
    <!-- footer -->
    <?php include("sharedAssets/footer.php") ?>


    <script src="https://kit.fontawesome.com/d3ed67e674.js" crossorigin="anonymous"></script>
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