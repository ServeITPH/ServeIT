<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .card {
            width: 100%;
            max-width: 1190px;
            height: auto;
            max-height: auto;
            background-color: black;
            border-radius: 60px;
            margin-top: 40px;
            justify-content: center;
        }

        .card-title {
            color: #19AFA5;
            font-size: 10vh;
            text-align: center;
        }

        .card-text {
            color: white;
            font-size: 2vh;
            text-align: justify;
            padding-left: 10vh;
            padding-right: 10vh;
        }

        .search-bar {
            color: black;
            background-color: #D2D3D3;
            border-color: black;
            width: 625px;
            max-width: 100%;
        }

        .filter {
            color: black;
            background-color: #D2D3D3;
            border-color: black;
            width: 100%;
            max-width: 300px;
        }

        .btnApply {
            width: 100%;
            max-width: 94px;
            height: 38px;
            border-radius: 10px;
            border: none;
            color: black;
            background-color: #19AFA5;
        }

        .productCard {
            width: 100%;
            max-width: 250px;
            ;
            height: 378px;
            background-color: #fff;
            border-radius: 20px;
            margin-bottom: 30px;
        }

        .productImage {
            width: 100%;
            height: 250px;
            background-color: black;
            border-radius: 23px;
        }

        .productTitle {
            font-size: 25px;
            font-weight: bold;
        }

        .productPrice {
            font-size: 20px;
            font-weight: bold;
        }

        .productDescription {
            font-size: 10px;
        }

        .btnSeeMore {
            background-color: #19AFA5;
            width: 100px;
            height: 25px;
            border: none;
            font-size: 12px;
        }

        .category {
            text-align: center;
            font-size: 14px;
        }

        .pagination {
            height: 75px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .page-item .page-link {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 20px;
            line-height: 50px;
            border: none;
            border-radius: 5px;
            color: black;
        }

        .page-item .page-link img {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }

        .active3 {
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
                        <h5 class="card-title">Products</h5>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                <div class="productCard rounded mx-auto">
                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                        <div class="productImage">
                            <img src="" alt="Product Image">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <span class="productTitle">Product Title</span>
                            <span class="productPrice">₱500</span>
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="productDescription">Lorem ipsum dolor sit amet</p>
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

    <div class="container pt-5">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>