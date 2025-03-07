<?php

include("sharedAssets/connect.php");

include("admin/adminAssets/user.php");

if ($userID == "") {
    header("Location: login.php");
}


$userID = isset($_SESSION['userID']) ? $_SESSION['userID'] : '';
$productInfoID = isset($_GET['itemID']) ? $_GET['itemID'] : '';

// Check if user has already given feedback for this product
$checkFeedbackQuery = "SELECT * FROM ratings WHERE userID = '$userID' AND itemID = '$productInfoID'";
$checkFeedbackResult = executeQuery($checkFeedbackQuery);

if (isset($_POST['btnAddFeedback'])) {
    $feedback = $_POST['feedback'];
    $ratingValue = $_POST['ratingValue'];

    if (!empty($feedback) && !empty($ratingValue)) {
        if (mysqli_num_rows($checkFeedbackResult) == 0) {
            $addFeedbackQuery = "INSERT INTO ratings (userID, itemID, review, ratingValue) 
                                VALUES ('$userID','$productInfoID', '$feedback', '$ratingValue')";
            executeQuery($addFeedbackQuery);
        }
    }
}

// Check if user has already added the item to cart
$checkCartQuery = "SELECT * FROM carts WHERE userID = '$userID' AND itemID = '$productInfoID'";
$checkCartResult = executeQuery($checkCartQuery);

if (isset($_POST['btnAddCart'])) {
    if (mysqli_num_rows($checkCartResult) == 0) {
        $addCartQuery = "INSERT INTO carts (userID, itemID) VALUES ('$userID','$productInfoID')";
        executeQuery($addCartQuery);
    }
}

if (isset($_POST['btnBuyNow'])) {
    header("Location: cart.php");

    if (mysqli_num_rows($checkCartResult) == 0) {
        $addCartQuery = "INSERT INTO carts (userID, itemID) VALUES ('$userID','$productInfoID')";
        executeQuery($addCartQuery);
    }
}

$productInfoQuery = "SELECT * FROM items WHERE itemID = $productInfoID";
$productInfoResult = executeQuery($productInfoQuery);

$productListQuery = "SELECT * FROM items WHERE type = 'product' ORDER BY itemID DESC LIMIT 8";
$productListResult = executeQuery($productListQuery);

$userQuery = "SELECT * FROM users WHERE userID = $userID";
$userResult = executeQuery($userQuery);

$averageRatingQuery = "SELECT AVG(ratingValue) FROM ratings WHERE itemID = $productInfoID;";
$averageRatingResult = executeQuery($averageRatingQuery);

$feedbackQuery = "SELECT * FROM ratings LEFT JOIN users ON ratings.userID = users.userID WHERE itemID = $productInfoID";
$feedbackResult = executeQuery($feedbackQuery);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Product Info</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/product/productInfo.css">
    <link rel="stylesheet" href="assets/css/footer/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        .active3 {
            color: #19afa5;
        }

        body.dark-mode .active3 {
            color: #19afa5 !important;
        }
    </style>
</head>

<body>
    <?php include("sharedAssets/nav.php") ?>

    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col">
                <div class="row justify-content-center">

                    <?php
                    while ($productInfoRow = mysqli_fetch_assoc($productInfoResult)) {
                    ?>

                        <div class="col-lg-6">
                            <div class="imageContainer">
                                <div class="row">
                                    <div class="col d-flex justify-content-center align-items-center">
                                        <div class="imageCard">
                                            <img src="assets/images/items/<?php echo $productInfoRow['attachment'] ?>"
                                                alt="<?php echo $productInfoRow['title'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center text-start">
                            <div class="serviceInfo">
                                <h1 class="productTitleInfo pt-1" style="font-size: 32px;">
                                    <?php echo $productInfoRow['title'] ?>
                                </h1>
                                <p style="font-size: 14px;"><?php echo $productInfoRow['shortDescription'] ?></p>
                                <p class="reviewStars">
                                    <?php
                                    $averageRatingRow = mysqli_fetch_assoc($averageRatingResult);
                                    $averageRating = round($averageRatingRow['AVG(ratingValue)'], 1);
                                    $filledStars = floor($averageRating);
                                    $halfStar = ($averageRating - $filledStars) >= 0.5;
                                    $totalStars = 5;

                                    for ($i = 1; $i <= $totalStars; $i++) {
                                        if ($i <= $filledStars) {
                                            echo '<i class="fa-solid fa-star" style="color: #19AFA5;"></i>';
                                        } elseif ($halfStar && $i === $filledStars + 1) {
                                            echo '<i class="fa-solid fa-star-half-stroke" style="color: #19AFA5;"></i>';
                                        } else {
                                            echo '<i class="fa-regular fa-star"></i>';
                                        }
                                    }
                                    ?>
                                    <span class="rating-value ms-2" style="font-size: 14px;">Reviews</span>
                                </p>


                                <div class="price fw-bold">
                                    <span
                                        style="font-size: 32px;">₱<?php echo $productInfoRow['price'] ?></span><span>.00</span>
                                </div>
                                <div style="border-top: 2px solid #19AFA5; width: 100%; margin: 10px 0; "></div>
                                <h4 class="productDescriptionTitle fw-bold" style="font-size: 16;">PRODUCT DESCRIPTION</h4>
                                <p class="productDescriptionInfo" style="font-size: 14px;">
                                    <?php echo $productInfoRow['description'] ?>
                                </p>
                                <form method="POST">
                                    <div class="productButtons">
                                        <input type="hidden" value="Product Item" name="addCart">
                                        <button name="btnAddCart" class="btnAddCart rounded-pill" style="font-size: 14px;"
                                            <?php if (mysqli_num_rows($checkCartResult) == 1) {
                                                echo 'disabled';
                                            } ?>>ADD TO
                                            CART</button>
                                        <input type="hidden" value="Product Item" name="buyNow">
                                        <button type="submit" class="btnBuyNow rounded-pill" name="btnBuyNow"
                                            style="font-size: 14px;">BUY NOW</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="line-divider">
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="productFeedbackTitle fw-bold">PRODUCT FEEDBACK</h2>
            </div>
            <div class="col-12">
                <div class="feedbackCardContainer d-flex">
                    <div class="row justify-content-center g-4 w-100">
                        <div class="col-lg-4 col-md-6 col-12">
                            <form method="POST">
                                <div class="feedbackCard">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row-6">
                                                <?php while ($userRow = mysqli_fetch_assoc($userResult)) { ?>
                                                    <div class="profilePicture">
                                                        <img src="uploads/<?php echo $userRow['profilePicture'] ?>"
                                                            alt="<?php echo $userRow['profilePicture'] ?>">
                                                    </div>
                                                    <div class="username"><?php echo $userRow['username'] ?></div>
                                                <?php } ?>
                                            </div>
                                            <div class="row-6">
                                                <input type="text" class="feedbackInput form-control" name="feedback"
                                                    placeholder="Share feedback..." />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="hidden" name="ratingValue" id="ratingValue">
                                            <p class="stars" id="ratingStars">
                                                <i class="fa-solid fa-star" data-value="1" onclick="setRating(1)"></i>
                                                <i class="fa-solid fa-star" data-value="2" onclick="setRating(2)"></i>
                                                <i class="fa-solid fa-star" data-value="3" onclick="setRating(3)"></i>
                                                <i class="fa-solid fa-star" data-value="4" onclick="setRating(4)"></i>
                                                <i class="fa-solid fa-star" data-value="5" onclick="setRating(5)"></i>
                                            </p>
                                            <button class="btnAddFeedback rounded-pill" type="submit"
                                                name="btnAddFeedback">Add Feedback</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php while ($feedbackRow = mysqli_fetch_assoc($feedbackResult)) { ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="feedbackCard">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="profilePicture">
                                                <img src="uploads/<?php echo $feedbackRow['profilePicture'] ?>"
                                                    alt="<?php echo $feedbackRow['profilePicture'] ?>">
                                            </div>
                                            <div class="username"><?php echo $feedbackRow['username'] ?></div>
                                            <p class="feedbackText"><?php echo $feedbackRow['review'] ?></p>
                                        </div>
                                        <div class="col-6">
                                            <p class="stars">
                                                <?php
                                                $rating = $feedbackRow['ratingValue'];
                                                for ($i = 1; $i <= 5; $i++) {
                                                    if ($i <= $rating) {
                                                        echo '<i class="fa-solid fa-star" style="color: #19AFA5;"></i>';
                                                    } else {
                                                        echo '<i class="star-review fa-solid fa-star" style="color: black;"></i>';
                                                    }
                                                }
                                                ?>
                                            </p>
                                            <p class="feedbackDate mb-0">
                                                <?php echo date('m/d/y', strtotime($feedbackRow['dateTime'])); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="line-divider">
        </div>
    </div>

    <div class="container mt-3">
        <div class="row d-flex flex-row justify-content-center align-items-center">
            <div class="col-12 mb-3">
                <h2 class="moreProductsTitle text-start fw-bold">MORE PRODUCTS</h2>
            </div>

            <?php
            while ($productListRow = mysqli_fetch_assoc($productListResult)) {
            ?>

                <div class="col-lg-3 col-6 d-flex flex-row justify-content-center">
                    <div class="productCard rounded mx-auto">
                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                            <div class="productImage">
                                <img src="assets/images/items/<?php echo $productListRow['attachment'] ?>"
                                    alt="<?php echo $productListRow['title'] ?>">
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <span class="productTitle"><?php echo $productListRow['title'] ?></span>
                                <span class="productPrice">₱<?php echo $productListRow['price'] ?></span>
                            </div>
                            <div class="w-100 d-flex justify-content-between align-items-center">
                                <p class="productDescription"><?php echo $productListRow['shortDescription'] ?></p>
                                <a href="productInfo.php?itemID=<?php echo $productListRow['itemID'] ?>">
                                    <button class="btnSeeMore rounded-pill">See More</button>
                                </a>
                            </div>
                            <div class="line" style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                            <div class="category">
                                <span><?php echo $productListRow['categoryName'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            }
            ?>

            <div class="d-flex justify-content-center mb-4">
                <a href="products.php">
                    <button class="btnMoreProducts rounded-pill">More Products</button>
                </a>
            </div>

        </div>
    </div>

    <?php include("sharedAssets/smpayment.php") ?>

    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script>
        function setRating(rating) {
            var ratingInput = document.getElementById('ratingValue');
            var currentRating = parseInt(ratingInput.value);

            var newRating = currentRating === rating ? 0 : rating;
            ratingInput.value = newRating;

            var stars = document.querySelectorAll('#ratingStars i');
            for (var i = 0; i < stars.length; i++) {
                if (parseInt(stars[i].dataset.value) <= newRating) {
                    stars[i].style.color = '#19AFA5';
                } else {
                    stars[i].style.color = 'black';
                }
            }
        }
    </script>
</body>

</html>