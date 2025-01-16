<?php
include("sharedAssets/connect.php");
include("admin/adminAssets/user.php");

if ($userID == "") {
    header("Location: login.php");
}

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

$serviceQuery = "SELECT * FROM items WHERE type ='service'";
$fetchService = executeQuery($serviceQuery);

$productQuery = "SELECT * FROM items WHERE type ='product'";
$fetchProduct = executeQuery($productQuery);


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
    <link rel="stylesheet" href="assets/css/profile/profile.css">


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

        <!-- CARTS-->
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

            <!-- CHECK OUT PROCESS-->
            <div class="col-12 col-md-6">
                <ul class="list-group rounded-5">
                    <li class="list-group-item">
                        <p class="fw-bold fs-2 text-center"> SUMMARY </p>
                        <p class="fw-lighter fs-6 text-start ms-5"> Items:</p>
                        <p class="fw-medium fs-6 ms-5 ms-5"><?php echo $itemsList; ?></p>
                    </li>
                    <li class="list-group-item">
                        <p class="fw-lighter fs-6 text-start ms-5"> Subtotal:
                            ₱<span><?php echo $grandTotal ?></span>
                        </p>
                    </li>
                    <li class="list-group-item">
                        <p class="fw-lighter fs-6 text-start ms-5"> Mode Of Payment:</p>
                        <div class="form-check fw-lighter fs-6 text-start ms-5 ms-5">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Cash On Delivery
                            </label>
                        </div>

                        <div class="form-check fw-lighter fs-6 text-start ms-5 ms-5">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Gcash
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <p class="fw-lighter fs-6 text-start ms-5"> VAT: ₱0.00 </p>
                    </li>
                    <li class="list-group-item mb-0">
                        <p class="fw-bolder fs-5 text-start ms-5 text-center">Total:
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


        <div class="tabs">
            <div class="tab-buttons">
                <button class="tab-btn active" onclick="showTab('services')">Services</button>
                <button class="tab-btn" onclick="showTab('products')">Products</button>
            </div>

            <div class="container mt-5">
                <div class="row d-flex flex-row justify-content-center align-items-center">

                    <!-- Services Tab Content -->
                    <div id="services" class="tab-content" style="display: block;">
                        <div class="row">
                            <?php
                            if (mysqli_num_rows($fetchService) > 0) {
                                while ($fetchServiceRow = mysqli_fetch_assoc($fetchService)) {
                                    ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex mb-4">
                                        <div class="productCard rounded mx-auto">
                                            <div
                                                class="card-body d-flex flex-column justify-content-between align-items-center">
                                                <div class="productImage">
                                                    <img src="" alt="Product Image">
                                                </div>
                                                <div class="w-100 d-flex justify-content-between align-items-center">
                                                    <span class="productTitle"><?php echo $fetchServiceRow['title'] ?></span>
                                                    <span class="productPrice">₱<?php echo $fetchServiceRow['price'] ?></span>
                                                </div>
                                                <div class="w-100 d-flex justify-content-between align-items-center">
                                                    <p class="productDescription"><?php echo $fetchServiceRow['description'] ?>
                                                    </p>
                                                    <a href="productInfo.php">
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
                                echo "No service available";
                            }
                            ?>
                        </div>
                    </div>

                    <!-- Products Tab Content -->
                    <div id="products" class="tab-content" style="display: none;">
                        <div class="row">
                            <?php
                            if (mysqli_num_rows($fetchProduct) > 0) {
                                while ($fetchProductRow = mysqli_fetch_assoc($fetchProduct)) {
                                    ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex flex-row mb-4">
                                        <div class="productCard rounded mx-auto">
                                            <div
                                                class="card-body d-flex flex-column justify-content-between align-items-center">
                                                <div class="productImage">
                                                    <img src="" alt="Product Image">
                                                </div>
                                                <div class="w-100 d-flex justify-content-between align-items-center">
                                                    <span class="productTitle"><?php echo $fetchProductRow['title'] ?></span>
                                                    <span class="productPrice">₱<?php echo $fetchProductRow['price'] ?></span>
                                                </div>
                                                <div class="w-100 d-flex justify-content-between align-items-center">
                                                    <p class="productDescription"><?php echo $fetchProductRow['description'] ?>
                                                    </p>
                                                    <a href="productInfo.php">
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
                                echo "No product available";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>





        </div>



        <!-- Show all button -->
        <div class="d-flex justify-content-center mt-3">
            <a id="showAllBtn" href="products.php">
                <button type="button" class="btn rounded-5 fs-3 fw-normal"
                    style="background-color:rgb(0, 0, 0); color: white;">
                    Show all
                </button>
            </a>
        </div>


        <!-- SM PAYMENT-->
        <?php include("sharedAssets/smpayment.php") ?>
        <!-- FOOTER-->
        <?php include("sharedAssets/footer.php") ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>


        <script>
            function showTab(tabName) {
                document.querySelectorAll('.tab-content').forEach(tab => {
                    tab.style.display = 'none';
                });
                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('active');
                });
                document.getElementById(tabName).style.display = 'block';
                event.target.classList.add('active');
            }
        </script>


        <script>
            function showTab(tab) {
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.style.display = 'none';
                });

                document.getElementById(tab).style.display = 'block';

                let showAllBtn = document.getElementById('showAllBtn');
                if (tab === 'services') {
                    showAllBtn.href = 'services.php';
                } else if (tab === 'products') {
                    showAllBtn.href = 'products.php';
                }
            }

            if (document.querySelector('.tab-btn.active').innerText === 'Services') {
                document.getElementById('showAllBtn').href = 'services.php';
            }
        </script>

</body>

</html>