<?php
require_once 'sharedAssets/connect.php';


include("admin/adminAssets/user.php");

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
    <link rel="stylesheet" href="assets/css/profile/profile.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

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
                        <div class="location">📍 Philippines</div>
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
                        <!-- BEGIN First 4 visible items -->
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeIn">
                            <div class="productCard rounded mx-auto">
                                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                    <div class="productImage">
                                        <img src="" alt="Product Image">
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <span class="productTitle">Service Title</span>
                                        <span class="productPrice">₱500</span>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeIn">
                            <div class="productCard rounded mx-auto">
                                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                    <div class="productImage">
                                        <img src="" alt="Product Image">
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <span class="productTitle">Service Title</span>
                                        <span class="productPrice">₱500</span>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeIn">
                            <div class="productCard rounded mx-auto">
                                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                    <div class="productImage">
                                        <img src="" alt="Product Image">
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <span class="productTitle">Service Title</span>
                                        <span class="productPrice">₱500</span>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeIn">
                            <div class="productCard rounded mx-auto">
                                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                    <div class="productImage">
                                        <img src="" alt="Product Image">
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <span class="productTitle">Service Title</span>
                                        <span class="productPrice">₱500</span>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                         <!-- END First 4 visible items -->
                        <div class="col-lg-3 col-6 hidden-item animate__animated animate__backInUp">
                            <div class="productCard rounded mx-auto">
                                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                                    <div class="productImage">
                                        <img src="" alt="Product Image">
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <span class="productTitle">Service Titles</span>
                                        <span class="productPrice">₱500</span>
                                    </div>
                                    <div class="w-100 d-flex justify-content-between align-items-center">
                                        <p class="productDescription">Lorem ipsum dolor sit amet</p>
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
                 
                    </div>
                    <button class="show-all" onclick="showAllItems('services')">Show all</button>
                </div>

                <div id="products" class="tab-content">
                    <div class="row d-flex justify-content-center align-items-center">
                         <!--BEGIN First 4 visible items -->
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeI">
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
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeI">
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
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeI">
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
                        <div class="col-lg-3 col-6 d-flex flex-row animate__animated animate__fadeI">
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
                         <!--END First 4 visible items -->
                        <div class="col-lg-3 col-6 hidden-item  flex-row animate__animated animate__backInUp">
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
                        <!-- Repeat hidden items here as well -->
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
