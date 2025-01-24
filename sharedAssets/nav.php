<?php

$userquery = "SELECT * FROM users WHERE userID = '$userID'";
$userresult = executeQuery($userquery);

if (mysqli_num_rows($userresult) > 0) {
  while ($currentUserinfo = mysqli_fetch_assoc($userresult)) {
    $userName = $currentUserinfo["username"];
  }
}
?>
<nav class="navbar navbar-expand-lg ">
  <div class="container nav-bar-style">
    <a class="navbar-brand mx-5" href="index.php"><img src="assets/images/nav/logo-nav.png" style="width: 50px; height: 45px;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mx-auto flex-grow-1 justify-content-center">
        <li class="nav-item mx-3">
          <a class="nav-link active1" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link active2" href="services.php">Services</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link active3" href="products.php">Products</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link active4" href="about.php">About</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link active5" href="helpCenter.php">Help center</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mx-5">
        <li class="nav-item dropdown mx-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hi, <?php echo $userName ?><i class="fa-regular fa-user p-2"></i>
          </a>
          <ul class="dropdown-menu">
            <div class="nav-account-title">
              ACCOUNT
            </div>
            <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user nav-icons"></i>Profile</a></li>
            <li><a class="dropdown-item" href="cart.php"><i class="fa-solid fa-cart-shopping nav-icons"></i>Cart</a></li>
            <li><a class="dropdown-item" href="chats.php"><i class="fa-solid fa-message nav-icons"></i>Message Us</a></li>
            <li><button class="dropdown-item dark-mode-toggle" onclick="toggleDarkMode()" id="dark-mode-toggle"><i id="mode-icon" class="fa-solid fa-moon"></i> Dark Mode</button></li>
            <li><a class="dropdown-item" href="login.php"><i class="fa-solid fa-right-from-bracket nav-icons"></i>Log-out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script src="sharedAssets/darkmode.js"></script>