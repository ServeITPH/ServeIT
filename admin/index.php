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
    <!-- tab icon -->
    <link rel="icon" href="../assets/images/nav/logo-nav.png">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- icons -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <style>
        .card-custom {
            border-radius: 15px;
            background-color: #333333;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            transition: ease 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 170px;
        }

        .card-custom:hover {
            transform: scale(1.10);
            background-color: #000000;
            border: 5px solid #00FFFF;
        }

        .fi-dashboard {
            font-size: 25px;
        }
    </style>
</head>

<body>
    <?php include("adminAssets/nav.php"); ?>

    <div class="container py-5">
        <div class="row">
            <div class="col text-center">
                <h1><b style="color: #19AFA5;">ADMIN</b> <b>DASHBOARD</b></h1>
                <p class="lead"><i>Unlock your potential. Let earnings follow.</i></p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-5 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="dashboard.php">
                    <div class="card-custom">
                        <i class="fi fi-dashboard fi-rr-dashboard-monitor"></i>
                        <h3>Dashboard</h3>
                        <p>Description</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="addProducts.php">
                    <div class="card-custom">
                        <i class="fi fi-dashboard fi-rr-box-open"></i>
                        <h3>Services/Products</h3>
                        <p>Description</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="feedback.php">
                    <div class="card-custom">
                        <i class="fi fi-dashboard fi-rr-feedback-review"></i>
                        <h3>Client Feedbacks</h3>
                        <p>Description</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="row g-5 justify-content-center mt-4">
            <div class="col-12 col-md-6 col-lg-4">
                <a href="managePosts.php">
                    <div class="card-custom">
                        <i class="fi fi-dashboard fi-rr-blog-text"></i>
                        <h3>Manage Posts</h3>
                        <p>Description</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <a href="manageUsers.php">
                    <div class="card-custom">
                        <i class="fi fi-dashboard fi-rr-user-gear"></i>
                        <h3>Manage Users</h3>
                        <p>Description</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>