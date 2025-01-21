<!--About Page showing information about ServeIT and the Teams.-->

<?php
include("sharedAssets/connect.php");
include("assets/php/about/aboutContent.php");
include("admin/adminAssets/user.php");

if ($userID == "") {
    header("Location: login.php");
}

// Count Visit
$page = "About";
include("sharedAssets/counter.php");
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

    <!-- About title and desc -->
    <div class="container wow animate__animated animate__fadeIn" style="justify-content: center;  display: flex;">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ABOUT US</h5>
                        <p class="card-text text-center mb-3">
                            <?php echo $aboutUsContent; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why choose ServeIT -->
    <div class="container wow animate__animated animate__fadeInUp" style=" justify-content: center;  display: flex;">
        <div class="row">
            <div class="col">
                <div class="card story-card">
                    <div class="card-body">
                        <h5 class="story-title"><span>Why choose
                            </span> <span>ServeIT?</span></h5>
                        <p class="card-text-black mb-3">
                            <?php echo $chooseContent; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Our Story -->
    <div class="container wow animate__animated animate__fadeInUp" style=" justify-content: center;  display: flex;">
        <div class="row">
            <div class="col">
                <div class="card story-card">
                    <div class="card-body">
                        <h5 class="story-title"><span>Our
                            </span> <span>Story</span></h5>
                        <p class="card-text-black mb-3" style="text-indent: 50px;">
                            <?php echo $storyContent; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Meet the Team -->
    <div class="team text-center py-5 wow animate__animated animate__fadeInUp">
        <div class="container">
            <div class="team-title">Meet the Team</div>
            <div style="margin-top: 30px;">
                <?php
                include("assets/php/about/carousel.php");
                ?>
            </div>
        </div>
    </div>

    <!-- Connect with team -->
    <div class="links text-center py-5">
        <div class="container wow animate__animated animate__fadeInUp">
            <div class="line mb-4"></div>
            <h2 class="team-title">More Ways to Connect With Our Team</h2>
            <p class="card-text-black" style="display: flex; justify-content: center; text-align: center;">
                <?php echo $connect; ?>
            </p>
            <?php include("assets/php/about/links.php"); ?>
        </div>
    </div>
    </div>

    <!-- Simplified Payment -->
    <?php
    include("sharedAssets/smpayment.php"); ?>

    <!-- Footer -->
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