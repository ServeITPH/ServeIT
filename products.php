<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | ServeIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- fonts -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- css files -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/footer/footer.css">
    <style>
        .card {
            width: 1100px;
            height: 200px;
            background-color: black;
            border-radius: 60px;
            margin-top: 40px;
        }

        .card-title {
            color: #19AFA5;
            font-size: 64px;
            text-align: center;
        }

        .card-text {
            color: white;
            font-size: 14px;
            text-align: center;
        }

        .search-bar {
            color: black;
            background-color: #D2D3D3;
            border-color: black;
            width: 600px;
            max-width: 100%;
            margin-left: 10px;
        }

        .filter {
            color: black;
            background-color: #D2D3D3;
            border-color: black;
            max-width: 100%;
            margin-left: 10px;
            width: 300px;
        }

        .search {
            color: black;
            background-color: #D2D3D3;
            border-color: black;
            width: 100px;
            max-width: 100%;
            margin-left: 10px;
            height: 38px;
        }

        .active3 {
            color: #19AFA5;
        }
    </style>
</head>

<body>
    <?php include("sharedAssets/nav.php") ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, modi?
                            Cumque fugiat eius at, ratione veritatis in odio porro expedita minus sapiente ut, incidunt
                            rerum, obcaecati amet. Sunt, eveniet ad!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <form class="d-flex" role="search">
                    <input class="search-bar form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            <div class="col">
                <select id="sort" name="sort" class="filter ms-2 form-control">
                    <option value="">Assets</option>
                    <option value="firstName">Templates</option>
                    <option value="lastName">Coding</option>
                </select>
            </div>
            <div class="col">
                <button class="search">Search</button>
            </div>
        </div>
    </div>


    <!-- footer -->
    <?php include("sharedAssets/smpayment.php") ?>
    <?php include("sharedAssets/footer.php") ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>