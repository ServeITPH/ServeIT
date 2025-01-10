<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/services/services.css">
    <link rel="stylesheet" href="assets/css/footer/footer.css">
    
    <style>
        .active2 {
            color: #19AFA5;
        }
    </style>
</head>

<body>
    <?php include("sharedAssets/nav.php") ?>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Services</h5>
                        <p class="card-text mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, modi?
                            Cumque fugiat eius at, ratione veritatis in odio porro expedita minus sapiente ut, incidunt
                            rerum, obcaecati amet. Sunt, eveniet ad! Lorem, ipsum dolor sit amet consectetur adipisicing
                            elit. Eum, blanditiis natus, tempora maiores labore unde nemo culpa dolorum excepturi
                            reprehenderit provident hic fuga necessitatibus eius obcaecati
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-10 col-8 d-flex justify-content-center align-items-center pt-3">
                <form class="d-flex w-100" role="search">
                    <input class="search-bar form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-8 col-6 d-flex justify-content-center align-items-center pt-3">
                <select id="sort" name="sort" class="filter form-control">
                    <option value="">Assets</option>
                    <option value="firstName">Templates</option>
                    <option value="lastName">Coding</option>
                </select>
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 col-2 d-flex justify-content-center align-items-center pt-3">
                <button class="btnApply btn btn-primary w-100">Apply</button>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
                        </div>
                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                        <div class="category">
                            <span>Asset</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 d-flex flex-row">
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
                            <button class="btnSeeMore rounded-pill" href="#">See More</button>
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

    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="pageNavigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <img src="assets/images/about/prev.png" alt="Previous">
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <img src="assets/images/about/next.png" alt="Next">
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>