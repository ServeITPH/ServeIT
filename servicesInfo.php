<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | ServiceInfo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/services/serviceInfo.css">
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
                    <div class="col-lg-6">
                        <div class="imageGallery">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <div class="smallImages">
                                        <div class="smallImageCard">
                                            <img src="https://via.placeholder.com/150" alt="">
                                        </div>
                                        <div class="smallImageCard">
                                            <img src="https://via.placeholder.com/150" alt="">
                                        </div>
                                        <div class="smallImageCard">
                                            <img src="https://via.placeholder.com/150" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="mainImage">
                                        <div class="mainImageCard">
                                            <img src="https://via.placeholder.com/150" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center text-start">
                        <div class="serviceInfo">
                            <h1 class="serviceTitleInfo pt-1">COLLAGE PICTURE</h1>
                            <p style="font-size: 13px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt
                                ut labore</p>
                            <p class="reviewStars">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <span class="rating-value ms-2">Reviews</span>
                            </p>
                            <div class="price fw-bold">
                                <span style="font-size: 40px;">₱500</span><span>.00</span>
                            </div>
                            <div style="border-top: 2px solid #19AFA5; width: 100%; margin: 10px 0; "></div>
                            <h4 class="serviceDescriptionTitle fw-bold" style="font-size: 16;">SERVICE DESCRIPTION</h4>
                            <p class="serviceDescriptionInfo" style="font-size: 16px;">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <div class="serviceButtons">
                                <a href="cart.php">
                                    <button class="btnAddCart rounded-pill">ADD TO CART</button>
                                </a>
                                <button class="btnBuyNow rounded-pill">BUY NOW</button>
                            </div>
                        </div>
                    </div>
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
                <h2 class="serviceFeedbackTitle fw-bold">SERVICE FEEDBACK</h2>
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
                <h2 class="moreservicesTitle text-start fw-bold">MORE SERVICES</h2>
            </div>
            <div class="col-lg-3 col-6">
                <div class="serviceCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="serviceImage">
                            <img src="" alt="service Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="serviceTitle">Service Title</span>
                            <span class="servicePrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="serviceDescription">Lorem ipsum dolor sit amet</p>
                            <a href="serviceInfo.php">
                                <button class="btnSeeMore rounded-pill">See More</button>
                            </a>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="serviceCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="serviceImage">
                            <img src="" alt="Service Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="serviceTitle">Service Title</span>
                            <span class="servicePrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="serviceDescription">Lorem ipsum dolor sit amet</p>
                            <a href="serviceInfo.php">
                                <button class="btnSeeMore rounded-pill">See More</button>
                            </a>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="serviceCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="serviceImage">
                            <img src="" alt="Service Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="serviceTitle">Service Title</span>
                            <span class="servicePrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="serviceDescription">Lorem ipsum dolor sit amet</p>
                            <a href="serviceInfo.php">
                                <button class="btnSeeMore rounded-pill">See More</button>
                            </a>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="serviceCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="serviceImage">
                            <img src="" alt="Service Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="serviceTitle">Service Title</span>
                            <span class="servicePrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="serviceDescription">Lorem ipsum dolor sit amet</p>
                            <a href="serviceInfo.php">
                                <button class="btnSeeMore rounded-pill">See More</button>
                            </a>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("sharedAssets/smpayment.php") ?>

    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>