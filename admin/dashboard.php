<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="adminAssets/css/nav/nav.css">
    <link rel="stylesheet" href="adminAssets/css/sidebar/sidebar.css">
    <!-- tab icon -->
    <link rel="icon" href="../assets/images/nav/logo-nav.png">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- icons -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <style>
        textarea {
            resize: none;
        }

        .card-1 {
            background-color: #D9D9D9;
        }

        .statistics-custom {
            border-bottom: 3px solid #19AFA5;
        }
    </style>

</head>

<body>
    <?php include("adminAssets/nav.php"); ?>
    <?php include("adminAssets/sidebar.php"); ?>
    <div class="col">
        <div class="col py-5 text-center">

            <h1><b style="color: #19AFA5;">ADMIN</b> <b>DASHBOARD</b></h1>
            <p class="lead"><i>Unlock your potential. Let earnings follow.</i></p>

            <!-- statistics -->
        </div>
        <div class="container text-center mb-5">
            <div class="row justify-content-start">
                <div class="col-4">
                    <p class="lead statistics-custom">Services</p>
                    <p class="h3">#</p>
                </div>
                <div class="col-4">
                    <p class="lead statistics-custom">Products</p>
                    <p class="h3">#</p>
                </div>
                <div class="col-4">
                    <p class="lead statistics-custom">Sales</p>
                    <p class="h3">#</p>
                </div>
            </div>
        </div>
        <!-- graph -->
        <div class="container">
            <div class="col">
                <?php include("adminAssets/graph.php") ?>
            </div>
        </div>
        <br>

        <div class="col py-5 text-center">
            <h1><b style="color: #19AFA5;">PRODUCTS</b></h1>
            <!-- table -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <form class="d-flex py-5" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                        <table class="table table-secondary table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><img src="#"></td>
                                    <td>drawing commision</td>
                                    <td>tutor</td>
                                    <td>9.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><img src="#"></td>
                                    <td>graphic drawing</td>
                                    <td>tutor</td>
                                    <td>9.99</td>

                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td><img src="#"></td>
                                    <td>pics</td>
                                    <td>tutor</td>
                                    <td>9.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="col py-5 text-center">
            <h1><b style="color: #000000;">SERVICES</b></h1>
            <!-- table -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-7">
                        <form class="d-flex py-5" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                        <table class="table table-secondary table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><img src="#"></td>
                                    <td>drawing commision</td>
                                    <td>tutor</td>
                                    <td>9.99</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td><img src="#"></td>
                                    <td>graphic drawing</td>
                                    <td>tutor</td>
                                    <td>9.99</td>

                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td><img src="#"></td>
                                    <td>pics</td>
                                    <td>tutor</td>
                                    <td>9.99</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>