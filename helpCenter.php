<?php


include("sharedAssets/connect.php");
include("admin/adminAssets/user.php");
include("assets/php/help/classes.php");

// Count Visit
$page = "Help Center";
include("sharedAssets/counter.php");

if ($userID == "") {
    header("Location: login.php");
}

//FAQ categories
$categories = ['Products', 'Accounts', 'Payments', 'Services'];
// Converting categories to a string
$categoriesList = "'" . implode("','", $categories) . "'";

// Fetch FAQ data
$faqsListsQuery = "SELECT * FROM faqs WHERE category IN ($categoriesList)";
$faqsListsResult = executeQuery($faqsListsQuery);
$faqsRows = [];

//Putting the fethed FAQ data into an array
while ($row = mysqli_fetch_array($faqsListsResult)) {
    $faqsRows[] = $row;
}

// Group FAQs by category using the FAQ class
$faqsByCategory = FAQ::groupByCategory($faqsRows);
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
    <link rel="stylesheet" href="assets/css/help/help.css">




</head>

<body>
    <?php include("sharedAssets/nav.php"); ?>

    <div class="container  container-section">
        <div class="row d-flex justify-content-center" style="padding:12px">
            <div class="card wow animate__animated animate__fadeIn" data-wow-delay="5s">
                <div class="card-title">HELP CENTER</div>
                <p class="card-body text-center">
                    At ServeIT, our Help Center is built to provide you with the support and guidance you need, whenever
                    you need it. Designed with accessibility and ease in mind, we’re here to answer your questions,
                    resolve your concerns, and connect you with the right solutions. Whether you're exploring services,
                    managing products, or seeking advice, our Help Center is your reliable partner in navigating the
                    digital world. Backed by a commitment to exceptional service, we aim to simplify your experience,
                    ensuring you can focus on what truly matters. Let us help you unlock your potential with seamless
                    assistance every step of the way.
                </p>
            </div>
        </div>
        <div class="container  container-section wow animate__animated animate__fadeIn">
            <div class="row mt-5">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8 d-flex align-items-center mt-3" style="padding:0 !important;">
                    <div class="header">
                        Welcome to ServeIT, How can we help?
                    </div>
                </div>
                <div class="col d-none d-sm-none d-md-block col-md-4 col-lg-4">
                    <div class="logo wow animate__animated animate__fadeIn">
                        <img src="assets/images/helpCenter/logo.png" alt="Logo" class="logo-image">
                    </div>
                </div>
            </div>
        </div>
        <div class="container  container-section wow animate__animated animate__fadeIn">
            <div class="row">
                <div class="title-question">Frequently asked questions</div>
            </div>
            <div class="container container-section mb-5">
                <?php foreach ($faqsByCategory as $category => $faqs): ?>
                    <?= FAQ::renderCategory($category, $faqs) ?>
                <?php endforeach; ?>
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