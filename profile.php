<?php
session_start();

require_once 'sharedAssets/connect.php';


if (!isset($_SESSION['userID'])) {
    die("Unauthorized access!");
}

$userID = $_SESSION['userID'];

$stmt = $conn->prepare("SELECT username FROM users WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

function safe_echo($value) {
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
    <link rel="stylesheet" href="assets/css/profile/profile.css">

   
</head>

<body>
    <?php include("sharedAssets/nav.php") ?>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-info">
                <div class="profile-pic"></div>
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
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="service-info">
                            <div class="service-title">Service Title</div>
                            <div class="service-price">₱500</div>
                            <button class="service-button">See More</button>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="service-info">
                            <div class="service-title">Service Title</div>
                            <div class="service-price">₱500</div>
                            <button class="service-button">See More</button>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="service-info">
                            <div class="service-title">Service Title</div>
                            <div class="service-price">₱500</div>
                            <button class="service-button">See More</button>
                        </div>
                    </div>
                </div>
                <button class="show-all">Show all</button>
            </div>

            <div id="products" class="tab-content">
            <div class="services-grid">
                    <div class="service-card">
                        <div class="service-image">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="service-info">
                            <div class="service-title">Product Title</div>
                            <div class="service-price">₱500</div>
                            <button class="service-button">See More</button>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="service-info">
                            <div class="service-title">Product Title</div>
                            <div class="service-price">₱500</div>
                            <button class="service-button">See More</button>
                        </div>
                    </div>
                    <div class="service-card">
                        <div class="service-image">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#666" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div class="service-info">
                            <div class="service-title">Product Title</div>
                            <div class="service-price">₱500</div>
                            <button class="service-button">See More</button>
                        </div>
                    </div>
                </div>
                <button class="show-all">Show all</button>
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
</body>

</html>