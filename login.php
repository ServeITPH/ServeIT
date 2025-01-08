<?php


include("sharedAssets/connect.php");

session_start();
session_destroy();
session_start();

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
    $error = "";

    if (mysqli_num_rows($loginResult) > 0) {
        while ($user = mysqli_fetch_assoc($loginResult)) {
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['userName'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phoneNumber'] = $user['phoneNumber'];
            $_SESSION['birthDate'] = $user['birthDate'];

            header("Location: ./");
        }
    } else {
        $error = "NO USER";
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

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Create Account</h1>
                <span>or use your email for registeration</span>
                <input type="text" placeholder="Username">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="POST">
                <h1>Log In</h1>
                <label class="mt-3" for="uname" class="form-label">Username | Email | Phone</label>
                <input type="text" id="uname" class="form-control" name="uname" placeholder="Username">
                <label class="mt-3" for="password" class="form-label">Password</label>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                <a href="#">Forget Your Password?</a>
                <button name="btnLogin">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/login/script.js"></script>
</body>

</html>