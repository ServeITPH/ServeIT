<?php


include("sharedAssets/connect.php");

session_start();
session_destroy();
session_start();

$error = "";

if (isset($_POST['btnLogin'])) {
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // CLEAN INJECTION
    $username = str_replace('\'', '', $username);
    $password = str_replace('\'', '', $password);

    $loginQuery = "SELECT * FROM users WHERE (username = '$username' OR email = '$username' OR phoneNumber = '$username') AND password = '$password'";
    $loginResult = executeQuery($loginQuery);

    $_SESSION['userID'] = "";
    $_SESSION['username'] = "";
    $_SESSION['email'] = "";
    $_SESSION['phoneNumber'] = "";
    $_SESSION['profilePicture'] = "";
    $_SESSION['role'] = "";

    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['userName'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phoneNumber'] = $user['phoneNumber'];
            $_SESSION['birthDate'] = $user['birthDate'];
            $_SESSION['role'] = $user['role'];

            header("Location: ./");
        }
    } else {
        $error = "NO USER FOUND";
    }
}

if (isset($_POST['btnRegister'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['registerPassword'];
    $cpassword = $_POST['cpassword'];

    if ($password == $cpassword) {
        $checkQuery = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $checkResult = executeQuery($checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            $error = "Username, email, or phone number already exists.";
        } else {
            // If no duplicates are found, insert the new user
            $userInfoQuery = "INSERT INTO users(username, email, phoneNumber, password) VALUES ('$username', '$email', '$phoneNumber', '$password')";
            executeQuery($userInfoQuery);

            $lastInsertedId = mysqli_insert_id($conn);

            // Set session data
            $_SESSION['userID'] = $lastInsertedId;
            $_SESSION['userName'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phoneNumber'] = $phoneNumber;
            $_SESSION['role'] = "";

            header("Location: index.php");
        }
    } else {
        $error = "PASSWORD UNMATCHED";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/login/style.css">
    <link rel="icon" href="assets/images/nav/logo-nav.png">


    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ServeIT | Login</title>



</head>

<body>
    <div class="container-fluid ">
        <div class="row pt-5 pb-3">
            <div class="col-2">

            </div>
            <div class="col-8 text-center">
                <img src="assets/images/login/logoST.png" class="img-fluid" alt="Logo" style="height: 50px">
            </div>
            <div class="col-2">

            </div>
        </div>
    </div>

    <div class="container pb-3" style="display: <?php echo !empty($error) ? 'block' : 'none'; ?>; min-height: 50px; padding-top: 10px;background-color:transparent;box-shadow: none !important;">
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    </div>


    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST">
                <h1>Create Account</h1>
                <span>Enter the details needed.</span>
                <input type="text" placeholder="Username" name="username" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="registerPassword" required>
                <input type="password" placeholder="Confirm Password" name="cpassword" required>
                <button name="btnRegister">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST">
                <h1>Log In</h1>
                <label class="mt-3" for="uname" class="form-label">Username | Email | Phone</label>
                <input type="text" id="uname" class="form-control" name="uname" placeholder="Username">
                <label class="mt-3" for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                <button name="btnLogin">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome to ServeIT!</h1>
                    <p>Register your personal details to use all of site features.</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your account details to use all of site features.</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-QWtLqnHreEpfYRhI2zdzZyLvHbEu4BQ/bBcT7MsftkDQbdfDlOr/XR+Mh2nQ03g" crossorigin="anonymous">
    </script>


    <script src="assets/js/login/script.js"></script>
</body>

</html>