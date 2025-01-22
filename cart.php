<?php
include("sharedAssets/connect.php");
include("admin/adminAssets/user.php");

if ($userID == "") {
    header("Location: login.php");
}

// LIMIT 3 CODE FOR THE CARTS
$counter = 0;
$showLimit = 3; // Default limit to show 3 items
if (isset($_POST['showMoreBtn']) && $_POST['showMoreBtn'] === 'showMore') {
    $showLimit = PHP_INT_MAX; // Show all items
}


$sql = "SELECT * 
        FROM carts 
        INNER JOIN items ON carts.itemID = items.itemID WHERE userID = $userID  AND isCheckOut = 'NO' LIMIT $showLimit";
$fetchCart = executeQuery($sql);

// FOR THE ITEMS AND GRAND TOTAL THAT LOOPS ALL DATA IN THE CART TABLE
$sqlSummary = "SELECT * 
        FROM carts 
        INNER JOIN items ON carts.itemID = items.itemID WHERE userID = $userID AND isCheckOut = 'NO' ";

$fetchCartSummary = executeQuery($sqlSummary);
$itemCount = mysqli_num_rows($fetchCartSummary);

// FOR THE CHECKOUT BUTTON - CHECKS IF IT'S EMPTY TO BE DISABLED
$cartEmpty = (mysqli_num_rows($fetchCart) == 0);

// INDIVIDUAL REMOVEMENT FOR THE CART
if (isset($_POST['deleteCartID'])) {
    $deleteID = $_POST['deleteCartID'];
    $deleteQuery = "DELETE FROM carts WHERE cartID = '$deleteID'";
    executeQuery($deleteQuery);
    header("Location: cart.php");
    exit();
}

// insert into transaction
if (isset($_POST['insertToTransaction'])) {
    $paymentMode = $_POST['paymentMode'];
    $referenceNum = $_POST['reference'];
    $addToTransationQuery = "INSERT INTO transactions (consumerID, paymentMethod, referenceNumber, transactionDate) VALUES ('$userID','$paymentMode','$referenceNum', NOW())";
    executeQuery($addToTransationQuery);
}

// UPDATE isCheckOut = "NO" INTO isCheckOut = "Yes"
if (isset($_POST['updateCartID'])) {
    $updateID = $_POST['updateCartID'];
    $updateQuery = "UPDATE carts SET isCheckOut = 'YES'";
    executeQuery($updateQuery);
    header("Location: cart.php");
    exit();
}


// DELETION OF ITEMS AFTER CHECKOUT
if (isset($_POST['delCheckoutCart'])) {
    $deleteAll = "DELETE FROM carts";
    executeQuery($deleteAll);
    header("Location: cart.php");
    exit();
}

// THIS IF FOR THE INTEREST SECTION - PRODUCTS AND SERVICES
$items = "SELECT * FROM items";
$fetchItem = executeQuery($items);

$serviceQuery = "SELECT * FROM items WHERE type = 'service' LIMIT 4";
$fetchService = executeQuery($serviceQuery);

$productQuery = "SELECT * FROM items WHERE type = 'product' LIMIT 4";
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

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="ms-3 mt-5 d-flex align-items-center">
                    <img src="assets/images/cart/cart.png" alt="Cart Icon" class="img-fluid me-3">
                    <p class="fs-2 fw-bold mb-0">
                        CART
                    </p>
                    <div class="ms-auto d-flex align-items-center">
                        <form method="POST" class="d-flex align-items-center">
                            <input type="hidden" name="delCheckoutCart" value="<?php echo $fetchCartRow['cartID']; ?>">


                            <button type="submit" class="btn p-0 me-2">
                                <img src="assets/images/cart/trashBin.png" alt="Delete Cart" class="img-fluid">
                            </button>
                        </form>
                        <div class="text-center pt-4" style="font-size: 12px">
                            <p>Clear Cart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-12 col-md-2"></div>

        <div class="col-12 col-md-5"></div>

        <!-- CARTS-->
        <div class="row">
            <div class="col-12 col-md-5">
                <?php
                // CART LOOP THAT IS ONLY LIMITED TO 3 LOOPS
                if (mysqli_num_rows($fetchCart) > 0) {
                    while ($fetchCartRow = mysqli_fetch_assoc($fetchCart)) {
                        if ($counter >= $showLimit)
                            break; // Stop loop after limit
                        $counter++;
                ?>

                        <div class="border-0 mt-3">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title fw-bold fs-6"><?php echo $fetchCartRow['title']; ?></h5>
                                    <p class="card-text mb-0 fs-6">₱<?php echo $fetchCartRow['price']; ?></p>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-text text-truncate fs-6" style="max-width: calc(65% - 100px);">
                                        <?php echo $fetchCartRow['description']; ?>
                                    </p>
                                    <!--REMOVE AND SEE MORE-->
                                    <div class="d-flex ms-auto flex-nowrap">
                                        <!--REMOVE-->
                                        <form method="post">
                                            <input type="hidden" name="deleteCartID"
                                                value="<?php echo $fetchCartRow['cartID']; ?>">
                                            <button type="submit" class="btn btn-danger rounded-5 fs-6 p-1">Remove</button>
                                        </form>
                                        <!--SEE MORE-->
                                        <a href="productInfo.php?itemID=<?php echo $fetchCartRow['itemID'] ?>">
                                            <button type="button" class="btn rounded-5 ms-2 fs-6 p-1"
                                                style="background-color: #19AFA5; color: black;">See More</button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-5"></div>


                    <?php
                    }
                } else {
                    ?>
                    <div class="container text-center fs-5"><?php echo "Cart is empty" ?></div>
                <?php
                }
                ?>

                <!--SHOW MORE SHOW LESS FUNCTION-->
                <?php if ($itemCount > 3): ?>
                    <div class="d-flex justify-content-center mt-3">
                        <form method="post">
                            <button type="submit" name="showMoreBtn"
                                value="<?php echo $showLimit === PHP_INT_MAX ? 'showLess' : 'showMore'; ?>"
                                class="btn btn-more btn-primary mx-auto mb-3">
                                <?php echo $showLimit === PHP_INT_MAX ? 'Show Less' : 'Show More'; ?>
                            </button>
                        </form>
                    </div>
                <?php endif; ?>

            </div>

            <!--GAP BETWEEN CART AND SUMMARY-->
            <div class="col-md-2"></div>

            <!-- SEPARATE LOOP FOR ITEMS AND TOTAL FOR SUMMARY COLUMN-->
            <?php
            $itemsList = "";
            $grandTotal = 0;

            while ($fetchCartSummaryRow = mysqli_fetch_assoc($fetchCartSummary)) {
                $grandTotal += $fetchCartSummaryRow['price'];
                $itemsList .= "* " . $fetchCartSummaryRow['title'] . "<br>";
            }
            ?>

            <!-- CHECK OUT PROCESS-->
            <div class="col-12 col-md-5">
                <form class="receiptForm" method="post">
                    <ul class="list-group mt-3 rounded-5">
                        <li class="list-group-item">
                            <p class="fw-bold fs-2 text-center"> SUMMARY </p>
                            <p class="fw-lighter fs-6 text-start ms-5 mb-0"> Items:</p>
                            <p class="fw-medium fs-6 ms-5 mb-0"><?php echo $itemsList; ?></p>
                        </li>
                        <li class="list-group-item">
                            <p class="fw-lighter fs-6 text-start ms-5 mb-0"> Subtotal:
                                ₱<span><?php echo $grandTotal ?></span>
                            </p>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-6">
                                    <p class="fw-lighter fs-6 text-start ms-5 mb-1"> Mode Of Payment:</p>
                                    <!-- Radio for Maya-->
                                    <div class="form-check fw-lighter fs-6 text-start ms-5">
                                        <input class="form-check-input" type="radio" name="paymentMode" id="maya"
                                            value="maya">
                                        <label class="form-check-label" for="maya">Maya</label>
                                    </div>

                                    <!-- Radio for Gcash -->
                                    <div class="form-check fw-lighter fs-6 text-start ms-5">
                                        <input class="form-check-input" type="radio" name="paymentMode" id="gcash"
                                            value="gcash">
                                        <label class="form-check-label" for="gcash">Gcash</label>
                                    </div>
                                </div>

                                <!-- ENTER REFERENCE -->
                                <div class="col-6">
                                    <div class="mt-4">
                                        <label class="form-label fs-6 mb-0">Enter Reference Number</label>
                                        <input type="text" class="form-control" name="reference"
                                            placeholder="Reference Number" required>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <!-- VAT-->
                        <li class="list-group-item">
                            <p class="fw-lighter fs-6 text-start ms-5 mb-0"> VAT: ₱0.00 </p>
                        </li>

                        <!-- TOTAL-->
                        <li class="list-group-item mb-0">
                            <p class="fw-bolder fs-5 text-start ms-5 text-center mb-0">Total:
                                ₱<span><?php echo $grandTotal ?></span>
                            </p>
                        </li>
                    </ul>

                    <!-- MODAL FOR GCASH -->
                    <div class="modal fade" id="gcashQR" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Please pay the total amount:
                                        ₱<?php echo $grandTotal ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="assets/images/cart/qr.png" alt="qr code" class="img-fluid">
                                    <p class="text-center fw-bolder mt-3">
                                        Pay via QR or send to 09123456789
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">DONE</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MODAL FOR MAYA -->
                    <div class="modal fade" id="mayaQR" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Please pay the total amount:
                                        ₱<?php echo $grandTotal ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="assets/images/cart/qr.png" alt="qr code" class="img-fluid">
                                    <p class="text-center fw-bolder mt-3">
                                        Pay via QR or send to 09123456789
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">DONE</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="d-flex justify-content-center mt-3">
                        <button type="button" class="btn btn-more btn-primary mx-auto mb-3 mt-0" data-bs-toggle="modal"
                            data-bs-target="#myModal" <?php if ($cartEmpty)
                                                            echo 'disabled'; ?>>Check Out</button>
                    </div>

                    <!-- MODAL FOR CHECK-OUT -->
                    <div class="modal" id="myModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirm Checkout</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to checkout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                                    <input type="hidden" name="insertToTransaction">
                                    <input type="hidden" name="updateCartID"
                                        value="<?php echo $fetchCartRow['cartID']; ?>">
                                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Yes</button>
                </form>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>


    <div class="container mt-5">
        <p class="fs-2 fw-bold">
            Interest
        </p>
    </div>

    <!-- interest Content -->
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
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex">
                                    <div class="serviceCard rounded mx-auto">
                                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                            <div class="serviceImage">
                                                <img src="assets/images/items/<?php echo $fetchServiceRow['attachment'] ?>"
                                                    alt="<?php echo $fetchServiceRow['title'] ?>">
                                            </div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <span
                                                    class="serviceTitle text-truncate fs-5"><?php echo $fetchServiceRow['title'] ?></span>
                                                <span class="servicePrice ms-4">₱<?php echo $fetchServiceRow['price'] ?></span>
                                            </div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <p class="serviceDescription">
                                                    <?php echo $fetchServiceRow['shortDescription'] ?>
                                                </p>
                                                <a href="serviceInfo.php?itemID=<?php echo $fetchServiceRow['itemID'] ?>">
                                                    <button class="btnSeeMore rounded-pill ms-2">See More</button>
                                                </a>
                                            </div>
                                            <div class="line" style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                                            <div class="category">
                                                <span><?php echo $fetchServiceRow['categoryName'] ?></span>
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
                                <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-flex flex-row">
                                    <div class="productCard rounded mx-auto">
                                        <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                            <div class="productImage">
                                                <img src="assets/images/items/<?php echo $fetchProductRow['attachment'] ?>"
                                                    alt="<?php echo $fetchProductRow['title'] ?>">
                                            </div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <span
                                                    class="productTitle text-truncate fs-5"><?php echo $fetchProductRow['title'] ?></span>
                                                <span class="productPrice ms-4">₱<?php echo $fetchProductRow['price'] ?></span>
                                            </div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <p class="productDescription text-truncate">
                                                    <?php echo $fetchProductRow['shortDescription'] ?>
                                                </p>
                                                <a href="productInfo.php?itemID=<?php echo $fetchProductRow['itemID'] ?>">
                                                    <button class="btnSeeMore rounded-pill ms-2">See More</button>
                                                </a>
                                            </div>
                                            <div class="line" style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                                            <div class="category">
                                                <span><?php echo $fetchProductRow['categoryName'] ?></span>
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
    <div class="d-flex justify-content-center">
        <a id="showAllBtn" href="products.php">
            <button type="button" class="btn rounded-5 fs-5 fw-normal" onclick="showAll()"
                style="background-color:rgb(0, 0, 0); color: white;">
                Show all
            </button>
        </a>
    </div>

    </div>
    <!-- SM PAYMENT-->
    <?php include("sharedAssets/smpayment.php") ?>

    <!-- FOOTER-->
    <?php include("sharedAssets/footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- JS FOR REDIRECTING SHOW ALL AND FOR ACTIVE SERVICE OR PRODUCT-->
    <script>
        function showTab(tabName) {

            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(tab => {
                tab.style.display = 'none';
            });

            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            document.getElementById(tabName).style.display = 'block';
            const activeButton = document.querySelector(`.tab-btn[onclick="showTab('${tabName}')"]`);
            activeButton.classList.add('active');

            const showAllBtn = document.getElementById('showAllBtn');
            if (tabName === 'services') {
                showAllBtn.href = 'services.php';
            } else if (tabName === 'products') {
                showAllBtn.href = 'products.php';
            }
        }


        window.addEventListener('DOMContentLoaded', () => {
            const activeTab = document.querySelector('.tab-btn.active');
            if (activeTab) {
                const tabName = activeTab.getAttribute('onclick').match(/'(.+)'/)[1];
                showTab(tabName);
            }
        });
    </script>

    <script>
        // Listen for changes in the radio buttons
        document.querySelectorAll('input[name="paymentMode"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                if (this.value === 'gcash') {
                    // Show the modal when Gcash is selected
                    const modal = new bootstrap.Modal(document.getElementById('gcashQR'));
                    modal.show();
                } else if (this.value === 'maya') {
                    // Show the modal when Maya is selected
                    const modal = new bootstrap.Modal(document.getElementById('mayaQR'));
                    modal.show();
                }
            });
        });
    </script>


</body>

</html>