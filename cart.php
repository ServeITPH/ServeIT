<?php
include("sharedAssets/connect.php");

$sql = "SELECT * FROM items";
$fetchCart = executeQuery($sql);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products | ServeIT</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">

</head>

<body>
    <?php include("sharedAssets/nav.php") ?>

    <div class="container">
        <div class="mt-3 d-flex align-items-center">
            <a href="services.php">
                <img src="assets/images/about/prev.png" alt="Back Button">
            </a>
            <p class="fs-1 fw-bold mb-0 ms-3">
                ACCOUNT/CART
            </p>
        </div>

        <div class="ms-3 mt-5 d-flex align-items-center">
            <img src="assets/images/cart/cart.png" alt="Back Button">
            <p class="fs-2 fw-bold mb-0 ms-3">
                CART
            </p>
        </div>

        <?php
        $grandTotal = 0;
        ?>

        <div class="row">
            <div class="col-12 col-md-6">
                <?php
                if (mysqli_num_rows($fetchCart) > 0) {
                    while ($fetchCartRow = mysqli_fetch_assoc($fetchCart)) {
                        $grandTotal += $fetchCartRow['price'];
                        ?>

                        <div class="card border-0 mt-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title fw-bold fs-3"><?php echo $fetchCartRow['title']; ?></h5>
                                    <p class="card-text mb-0">₱<?php echo $fetchCartRow['price']; ?></p>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text"><?php echo $fetchCartRow['description']; ?></p>
                                    <button type="button" class="btn rounded-5" style="background-color: #19AFA5; color: black;">See More</button>

                                </div>
                            </div>
                        </div>


                        <?php
                    }
                } else {
                    echo "No product";
                }
                ?>
            </div>
            <div class="col-12 col-md-6">
                <p class="fw-bold fs-1 text-center ms-5 ms-5"> SUMMARY </p>
                <p class="fw-bold fs-1 text-center ms-5 ms-5"> Grand Total: ₱<span><?php echo $grandTotal ?></span> </p>


            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>