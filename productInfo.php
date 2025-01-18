<?php

include("sharedAssets/connect.php");

include("admin/adminAssets/user.php");

$productInfoID = $_GET['itemID'];

$productInfoQuery = "SELECT * FROM items WHERE itemID = $productInfoID";
$productInfoResult = executeQuery($productInfoQuery);

$productListQuery = "SELECT * FROM items WHERE type = 'product'";
$productListResult = executeQuery($productListQuery);

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
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <span class="rating-value ms-2" style="font-size: 14px;">Reviews</span>
                                </p>
                                <div class="price fw-bold">
                                    <span style="font-size: 32px;">₱<?php echo $productInfoRow['price'] ?></span><span>.00</span>
                                </div>
                                <div style="border-top: 2px solid #19AFA5; width: 100%; margin: 10px 0; "></div>
                                <h4 class="productDescriptionTitle fw-bold" style="font-size: 16;">PRODUCT DESCRIPTION</h4>
                                <p class="productDescriptionInfo" style="font-size: 14px;">
                                    <?php echo $productInfoRow['description'] ?>
                                </p>
                                <div class="productButtons">
                                    <a href="cart.php">
                                        <button class="btnAddCart rounded-pill" style="font-size: 14px;">ADD TO
                                            CART</button>
                                    </a>
                                    <button class="btnBuyNow rounded-pill" style="font-size: 14px;">BUY NOW</button>
                                </div>
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
            <div class="col-12 mb-4 text-start">
                <h2 class="productFeedbackTitle fw-bold">PRODUCT FEEDBACK</h2>
            </div>
            <div class="col-12">
                <div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="feedbackCardContainer d-flex">
                                <div class="row justify-content-center g-4 w-100">
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="row-6">
                                                        <div class="profilePicture"></div>
                                                    </div>
                                                    <div class="row-6">
                                                        <input type="text" class="feedbackInput form-control"
                                                            placeholder="Share feedback..." value="" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                    </p>
                                                    <button class="btnAddFeedback rounded-pill" type="submit">Add
                                                        Feedback</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6 d-flex flex-row">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="feedbackCardContainer d-flex">
                                <div class="row justify-content-center g-4 w-100">
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="feedbackCardContainer d-flex">
                                <div class="row justify-content-center g-4 w-100">
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-8">
                                        <div class="feedbackCard">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="profilePicture"></div>
                                                    <p class="feedbackText">The Best!</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="stars">
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                        <i class="fa-solid fa-star" style="color: #ffd700;"></i>
                                                    </p>
                                                    <p class="feedbackDate mb-0">09/09/24</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#feedbackCarousel"
                        data-bs-slide="prev">
                        <img src="assets/images/about/prev.png" alt="Previous">
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#feedbackCarousel"
                        data-bs-slide="next">
                        <img src="assets/images/about/next.png" alt="Next">
                    </button>
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

                <div class="col-lg-3 col-6 d-flex flex-row">
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
                            <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                            <div class="category">
                                <span><?php echo $productListRow['categoryName'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
    </div>

    <?php include("sharedAssets/smpayment.php") ?>

    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>