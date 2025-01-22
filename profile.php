<?php
require_once 'sharedAssets/connect.php';


include("admin/adminAssets/user.php");
$page = "Services";
include("sharedAssets/counter.php");


// counter
$count = 0;
if (!isset($_SESSION['userID'])) {
    die("Unauthorized access!");
}

$userID = $_SESSION['userID'];

$stmt = $conn->prepare("SELECT username,profilePicture FROM users WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$serviceListQuery = "SELECT * FROM items WHERE type = 'service' ORDER BY RAND() LIMIT 10";
$productListQuery = "SELECT * FROM items WHERE type = 'product' ORDER BY RAND() LIMIT 10";
$serviceListResult = executeQuery($serviceListQuery);
$productListResult = executeQuery($productListQuery);
function safe_echo($value)
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
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
    <link rel="stylesheet" href="assets/css/product/product.css">
    <link rel="stylesheet" href="assets/css/services/services.css">
    <link rel="stylesheet" href="assets/css/profile/profile.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <?php include("sharedAssets/nav.php") ?>
    <div class="profile-container">

        <div>
            <div class="profile-header">
                <div class="profile-info">
                    <?php if ($user['profilePicture']): ?>
                        <img src="uploads/<?php echo safe_echo($user['profilePicture']); ?>" alt="Profile"
                            class="profile-pic">
                    <?php else: ?>
                        <div class="profile-pic"></div>
                    <?php endif; ?>
                    <div>
                        <div class="profile-name"><?php echo safe_echo(ucfirst($user['username'])); ?></div>
                        <div class="since">Member Since 2025</div>
                    </div>
                </div>
                <div class="header-buttons">
                    <a href="edit-profile.php" class="btn btn-message">Edit</a>
                    <button class="btn btn-logout" onclick="window.location.href='login.php';">Log out</button>

                </div>
            </div>

            <div class="tabs">
                <div class="tab-buttons">
                    <button class="tab-btn active" onclick="showTab('services')">Services</button>
                    <button class="tab-btn" onclick="showTab('products')">Products</button>
                </div>

                <div id="services" class="tab-content">
                    <div class="row d-flex justify-content-center align-items-center">
                        <?php
                        $itemIndex = 0;
                        while ($serviceListRow = mysqli_fetch_assoc($serviceListResult)) {
                            $itemIndex++;
                            $hiddenClass = $itemIndex > 4 ? 'hidden-item animate__animated animate__backInUp' : 'd-flex flex-row animate__animated animate__fadeIn';
                        ?>
                            <div class="col-lg-3 col-6 <?php echo $hiddenClass; ?>  justify-content-center">
                                <div class="serviceCard rounded mx-auto">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="serviceImage">
                                            <img src="assets/images/items/<?php echo $serviceListRow['attachment'] ?>"
                                                alt="<?php echo $serviceListRow['title'] ?>">
                                        </div>
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <span class="serviceTitle"><?php echo $serviceListRow['title'] ?></span>
                                            <span class="servicePrice">₱<?php echo $serviceListRow['price'] ?></span>
                                        </div>
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <p class="serviceDescription"><?php echo $serviceListRow['shortDescription'] ?></p>
                                            <a href="serviceInfo.php?itemID=<?php echo $serviceListRow['itemID'] ?>">
                                                <button class="btnSeeMore rounded-pill">See More</button>
                                            </a>
                                        </div>
                                        <div class="line" style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                                        <div class="category">
                                            <span><?php echo $serviceListRow['categoryName'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button class="show-all" onclick="showAllItems('services')">Show all</button>
                </div>

                <div id="products" class="tab-content">
                    <div class="row d-flex justify-content-center align-items-center">
                        <?php
                        $itemIndex = 0;
                        while ($productListRow = mysqli_fetch_assoc($productListResult)) {
                            $itemIndex++;
                            $hiddenClass = $itemIndex > 4 ? 'hidden-item animate__animated animate__backInUp' : 'd-flex flex-row animate__animated animate__fadeIn';
                        ?>
                            <div class="col-lg-3 col-6 <?php echo $hiddenClass; ?>  justify-content-center">
                                <div class="serviceCard rounded mx-auto">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <div class="serviceImage">
                                            <img src="assets/images/items/<?php echo $productListRow['attachment'] ?>"
                                                alt="<?php echo $productListRow['title'] ?>">
                                        </div>
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <span class="serviceTitle"><?php echo $productListRow['title'] ?></span>
                                            <span class="servicePrice">₱<?php echo $productListRow['price'] ?></span>
                                        </div>
                                        <div class="w-100 d-flex justify-content-between align-items-center">
                                            <p class="serviceDescription"><?php echo $productListRow['shortDescription'] ?></p>
                                            <a href="productInfo.php?itemID=<?php echo $productListRow['itemID'] ?>">
                                                <button class="btnSeeMore rounded-pill">See More</button>
                                            </a>
                                        </div>
                                        <div style="border-top: 2px solid black; width: 100%; margin: 10px 0;"></div>
                                        <div class="category">
                                            <span><?php echo $productListRow['categoryName'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <button class="show-all" onclick="showAllItems('products')">Show all</button>
                </div>
            </div>
        </div>
    </div>

    <!-- smpayment -->
    <?php include("sharedAssets/smpayment.php"); ?>
    <!-- footer -->
    <?php include("sharedAssets/footer.php") ?>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous">
    </script>
    <script>
        function showTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.style.display = 'none';
            });

            // Remove 'active' class from all tab buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('active');
            });

            // Show the selected tab
            document.getElementById(tabName).style.display = 'block';

            // Add 'active' class to the clicked button
            event.target.classList.add('active');

            // Reset "Show All" functionality when switching tabs
            document.querySelectorAll('.hidden-item').forEach(item => {
                item.style.display = 'none';
            });
            const showAllButton = document.querySelectorAll('.show-all');
            showAllButton.forEach(button => {
                button.textContent = 'Show All';
            });
        }

        function showAllItems(tabId) {
            const tabContent = document.getElementById(tabId);
            const hiddenItems = tabContent.querySelectorAll('.hidden-item');
            const showAllButton = tabContent.querySelector('.show-all');

            let isVisible = hiddenItems[0]?.style.display === 'block';

            hiddenItems.forEach(item => {
                item.style.display = isVisible ? 'none' : 'block';
            });

            // Toggle the button text based on visibility of items
            showAllButton.textContent = isVisible ? 'Show All' : 'Show Less';
        }
    </script>
</body>

</html>