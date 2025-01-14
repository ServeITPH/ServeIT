<?php

require_once 'sharedAssets/connect.php';
include("admin/adminAssets/user.php");

if (!isset($_SESSION['userID'])) {
    die("Unauthorized access!");
}

$userID = $_SESSION['userID'];

$stmt = $conn->prepare("SELECT username, email, phoneNumber, profilePicture FROM users WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phoneNumber = trim($_POST['phoneNumber'] ?? '');

    // File Upload Handling
    if (isset($_FILES['profilePicture']) && $_FILES['profilePicture']['error'] === 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['profilePicture']['name'];
        $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $file_tmp = $_FILES['profilePicture']['tmp_name'];
        $file_size = $_FILES['profilePicture']['size'];

        if (in_array($file_ext, $allowed) && $file_size < 2 * 1024 * 1024) { // Max 2MB
            $new_filename = uniqid() . '.' . $file_ext;
            $upload_path = 'uploads/' . $new_filename;

            if (!is_dir('uploads')) {
                mkdir('uploads', 0777, true);
            }

            if (move_uploaded_file($file_tmp, $upload_path)) {
                $stmt = $conn->prepare("UPDATE users SET profilePicture = ? WHERE userID = ?");
                $stmt->bind_param("si", $new_filename, $userID);
                $stmt->execute();
                $stmt->close();
            }
        }
    }

    // Update user details using prepared statements
    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, phoneNumber = ? WHERE userID = ?");
    $stmt->bind_param("sssi", $username, $email, $phoneNumber, $userID);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Profile updated successfully!";
    } else {
        $_SESSION['error_message'] = "Error updating profile: " . $conn->error;
    }

    $stmt->close();
    header("Location: edit-profile.php"); // Redirect to avoid form resubmission
    exit();
}

function safe_echo($value)
{
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Edit</title>

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
    <link rel="stylesheet" href="assets/css/profile/edit-profile.css">

</head>

<div>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success_message'];
            unset($_SESSION['success_message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['error_message'];
            unset($_SESSION['error_message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php include("sharedAssets/nav.php") ?>
    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-info">
                    <?php if ($user['profilePicture']): ?>
                        <img src="uploads/<?php echo safe_echo($user['profilePicture']); ?>" alt="Profile"
                            class="profile-picture">
                    <?php else: ?>
                        <div class="profile-picture"></div>
                    <?php endif; ?>
                    <div class="profile-details">
                        <h2><?php echo safe_echo(ucfirst($user['username'])); ?></h2>
                        <div class="member-since">Member since
                            <?php echo date('Y', strtotime($user['accountDate'] ?? 'now')); ?>
                        </div>
                        <div class="location">📍 Philippines</div>
                    </div>
                </div>
                <div class="action-buttons">
                    <button class="btn" onclick="window.history.back();">Back</button>
                    <button class="btn" onclick="window.location.href='login.php';">Log out</button>
                </div>
            </div>
        </div>

        <div class="profile-form">
            <div class="form-header">
                <h2>My Profile</h2>
                <p>Manage and Protect your account</p>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-content">
                    <div class="form-left">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo safe_echo($user['username']); ?>">
                        </div>

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" value="" disabled>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo safe_echo($user['email']); ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phoneNumber"
                                value="<?php echo safe_echo($user['phoneNumber']); ?>">
                        </div>


                        <button type="submit" class="save-btn">Save</button>
                    </div>

                    <div class="form-right">
                        <span class="divider"></span>
                        <div class="profile-upload">
                            <?php if ($user['profilePicture']): ?>
                                <img src="uploads/<?php echo safe_echo($user['profilePicture']); ?>" alt="Profile"
                                    class="upload-preview">
                            <?php else: ?>
                                <div class="upload-preview"></div>
                            <?php endif; ?>
                            <label class="select-image-btn">
                                Select Image
                                <input type="file" name="profilePicture" style="display: none;">
                            </label>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" value="Philippines" disabled>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div>
        <!-- smpayment -->
        <?php include("sharedAssets/smpayment.php"); ?>
        <!-- footer -->
        <?php include("sharedAssets/footer.php") ?>

    </div>



    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</html>