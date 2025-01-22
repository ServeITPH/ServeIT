<?php

$userquery = "SELECT * FROM users WHERE userID = '$userID'";
$userresult = executeQuery($userquery);

if (mysqli_num_rows($userresult) > 0) {
  while ($currentUserinfo = mysqli_fetch_assoc($userresult)) {
    $userName = $currentUserinfo["username"];
    $profilePicture = $currentUserinfo["profilePicture"];
  }
}

?>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container nav-bar-style">
    <a class="navbar-brand mx-5" href="index.php"><img src="adminAssets/img/logo-nav.png"
        style="width: 50px; height: 45px;"></a>


    <ul class="navbar-nav ms-auto mx-5">
      <li class="nav-item">
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
          Hi, <?php echo $userName ?> <i class="fi fi-rr-admin-alt"></i>
        </button>
      </li>
    </ul>

  </div>
</nav>

<!-- Sidebar -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebar">
  <div class="offcanvas-header" style="background-color: #555759;">
    <h5 class="offcanvas-title text-light" id="offcanvasExampleLabel">Menu</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color: red;"></button>
  </div>

  <div class="offcanvas-body " style="background-color: #555759;">
    <div class="text-center mb-4">
      <div class="rounded-circle bg-light" style="width: 100px; height: 100px; margin: auto;">
        <img src="../uploads/<?php echo $profilePicture ?>" alt="Profile Picture" class="img-fluid rounded-circle">
      </div>
      <h4 class="mt-3 text-light"><?php echo $userName ?></h4>
    </div>

    <nav class="nav flex-column">
      <a href="dashboard.php" class="nav-link text-light"><i class="fi fi-rr-dashboard-monitor"></i>
        Dashboard</a>
      <a href="addProducts.php" class="nav-link text-light"><i class="fi fi-rr-box-open"></i> Add
        Product/Services</a>
      <a href="feedback.php" class="nav-link text-light"><i class="fi  fi-rr-feedback-review"></i> Client
        Feedbacks</a>
      <a href="manageTransactions.php" class="nav-link text-light"><i class="fi fi-rr-blog-text"></i> Manage
        Transactions</a>
      <a href="manageUsers.php" class="nav-link text-light"><i class="fi fi-rr-user-gear"></i> Manage
        Users</a>
      <a href="customerChat.php" class="nav-link text-light"><i class="fi fi-rr-comment-alt"></i> Customer
        Chat</a>
      <a href="../login.php" class="nav-link text-danger"><i class="fi fi-rr-exit"></i></i> Log-out</a>
    </nav>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>