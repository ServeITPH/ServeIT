<?php
include("sharedAssets/connect.php");


$creditCardFilter = isset($_GET['creditCardType']);

$sql = "SELECT * 
        FROM carts 
        INNER JOIN items ON carts.itemID = items.itemID";
$fetchCart = executeQuery($sql);

$cartEmpty = (mysqli_num_rows($fetchCart) == 0);

if (isset($_POST['deleteCartID'])) {
    $deleteID = $_POST['deleteCartID'];
    $deleteQuery = "DELETE FROM carts WHERE cartID = '$deleteID'";
    executeQuery($deleteQuery);
    header("Location: cart.php");
    exit();
}

$items = "SELECT * FROM items";
$fetchItem = executeQuery($items);


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

    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- assets -->
    <link rel="stylesheet" href="assets/css/nav/nav.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">
    <link rel="stylesheet" href="assets/css/landing-page/style.css">
    <link rel="stylesheet" href="assets/css/footer/footer.css">

    <link rel="stylesheet" href="assets/css/cart/cart.css">


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
        $itemsList = "";
        ?>

        <div class="row">
            <div class="col-12 col-md-6">
                <?php
                if (mysqli_num_rows($fetchCart) > 0) {
                    while ($fetchCartRow = mysqli_fetch_assoc($fetchCart)) {
                        $grandTotal += $fetchCartRow['price'];
                        $itemsList .= "* " . $fetchCartRow['title'] . "<br>";

                        ?>

                        <div class=" border-0 mt-3">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title fw-bold fs-3"><?php echo $fetchCartRow['title']; ?></h5>
                                    <p class="card-text mb-0 fs-4">₱<?php echo $fetchCartRow['price']; ?></p>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text text-truncate" style="max-width: calc(65% - 100px);">
                                        <?php echo $fetchCartRow['description']; ?>
                                    </p>
                                    <div class="d-flex ms-auto flex-nowrap">
                                        <form method="post">
                                            <input type="hidden" name="deleteCartID"
                                                value="<?php echo $fetchCartRow['cartID']; ?>">
                                            <button type="submit" class="btn btn-danger rounded-5">Remove</button>
                                        </form>
                                        <button type="button" class="btn rounded-5 ms-2"
                                            style="background-color: #19AFA5; color: black;">See More</button>
                                    </div>
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
                <ul class="list-group rounded-5">
                    <li class="list-group-item">
                        <p class="fw-bold fs-2 text-center"> SUMMARY </p>
                        <p class="fw-lighter fs-5 text-start ms-5"> Items:</p>
                        <p class="fw-medium fs-5 ms-5 ms-5"><?php echo $itemsList; ?></p>
                    </li>
                    <li class="list-group-item">
                        <p class="fw-lighter fs-5 text-start ms-5"> Subtotal:
                            ₱<span><?php echo $grandTotal ?></span>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="fw-lighter fs-5 text-start ms-5"> Mode Of Payment:</p>
                        <div class="form-check fw-lighter fs-5 text-start ms-5 ms-5">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Cash On Delivery
                            </label>
                        </div>

                        <div class="form-check fw-lighter fs-5 text-start ms-5 ms-5">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Gcash
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <p class="fw-lighter fs-5 text-start ms-5"> VAT: ₱0.00 </p>
                    </li>
                    <li class="list-group-item mb-0">
                        <p class="fw-bolder fs-4 text-start ms-5 text-center">Total:
                            ₱<span><?php echo $grandTotal ?></span>
                        </p>
                    </li>
                </ul>


                <div class="d-flex justify-content-center mt-3">
                    <button type="button" class="btn btn-more btn-primary mx-auto mb-3" data-bs-toggle="modal"
                        data-bs-target="#myModal" <?php if ($cartEmpty)
                            echo 'disabled'; ?>>Check Out</button>
                </div>

                <div class="modal" id="myModal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Transaction Succesful!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Items and Receipt will be sent to your email. <br> Thank you.</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="mt-5 d-flex align-items-center">
            <p class="fs-2 fw-bold">
                Interest
            </p>
        </div>


        <button type="button" class="btn btn-primary">Primary</button>
        <button type="button" class="btn btn-secondary">Secondary</button>


        <select name="service">
            <div class="container mt-5">
                <div class="row d-flex justify-content-center align-items-center">

                    <?php
                    if (mysqli_num_rows($fetchCart) > 0) {
                        while ($fetchCartRow = mysqli_fetch_assoc($fetchCartRow)) {
                            ?>

                            <div class="col-lg-3 col-6 d-flex flex-row">
                                <div class="serviceCard rounded mx-auto">
                                    <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                        <div class="serviceImage">
                                            <img src="" alt="Service Image">
                                        </div>
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <span class="serviceTitle"><?php echo $fetchCartRow['title'] ?></span>
                                            <span class="servicePrice">₱<?php echo $fetchCartRow['price'] ?></span>
                                        </div>
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <p class="serviceDescription text-truncate" style="max-width: calc(65% - 100px);">
                                                <?php echo $fetchCartRow['description'] ?>
                                            </p>
                                            <a href="servicesInfo.php">
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
                            <?php
                        }
                    } else {
                        echo "No product";
                    }
                    ?>
        </select>
    </div>
    </div>


    <div class="d-flex justify-content-center mt-3">
        <a href="products.php">
            <button type="button" class="btn rounded-5 fs-3 fw-normal"
                style="background-color:rgb(0, 0, 0); color: white;">Show all</button>
        </a>
    </div>

    </div>



    <?php include("sharedAssets/smpayment.php") ?>

    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>