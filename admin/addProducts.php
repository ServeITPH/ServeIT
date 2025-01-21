<?php

include("../sharedAssets/connect.php");
include("adminAssets/user.php");

$success = false;
$error = '';

if (isset($_POST['btnSubmit'])) {
    // Get the form data
    $type = $_POST['type'];
    $title = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['longDescription'];
    $shortDescription = $_POST['shortDescription'];
    $price = $_POST['price'];
    $attachment = $_FILES['attachment']['name']; // Get the attachment filename
    $attachmentTemp = $_FILES['attachment']['tmp_name']; // Temporary file path

    // Validate input (optional but recommended)
    if (empty($title) || empty($category) || empty($price)) {
        $error = "Please fill out all required fields.";
    } else {
        // Define the path to upload the file
        $uploadDir = "../assets/images/items/";
        $uploadFile = $uploadDir . basename($attachment);

        // Attempt to move the uploaded file to the server
        if (move_uploaded_file($attachmentTemp, $uploadFile)) {
            // File uploaded successfully, now insert the data into the database
            $stmt = $conn->prepare("INSERT INTO items (title, description, price, attachment, type, categoryName, shortDescription) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssss", $title, $description, $price, $attachment, $type, $category, $shortDescription);

            // Execute the statement
            if ($stmt->execute()) {
                $success = true;
            } else {
                $error = "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            $error = "Failed to upload the file.";
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Add Products/Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="adminAssets/css/nav/nav.css">
    <!-- tab icon -->
    <link rel="icon" href="../assets/images/nav/logo-nav.png">
    <!-- font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- icons -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <style>
        textarea {
            resize: none;
        }

        .card-1 {
            background-color: #D9D9D9;
        }
    </style>

</head>

<body>
    <?php include("adminAssets/nav.php"); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-5 text-center">
                <h1><b>ADD PRODUCT / SERVICES</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="col-md-11 card card-1 m-5 rounded-5 mx-auto">
                    <div class="container-fluid rounded-top-5" style="background-color: #000; height: 50px;"></div>
                    <div class="row p-5">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="row g-5 justify-content-center">
                                <div class="col-md-6 mt-5">
                                    <label for="category" class="form-label">Type</label>
                                    <select class="form-select rounded-pill" id="category" name="type">
                                        <option selected>Service</option>
                                        <option>Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row pt-5 g-5 d-flex justify-content-center">
                                <div class="col-md-6">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control rounded-pill" id="productName" name="name"
                                        placeholder="Enter product name">
                                </div>
                                <div class="col-md-6">
                                    <label for="tags" class="form-label">Category</label>
                                    <input type="text" class="form-control rounded-pill" id="tags" name="category"
                                        placeholder="Enter tags">
                                </div>
                                <div class="col-md-6">
                                    <label for="productDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control rounded-4" id="productDescription" rows="4" name="shortDescription"
                                        placeholder="Enter product description"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="longDescription" class="form-label">Long Description</label>
                                    <textarea class="form-control rounded-4" id="longDescription" rows="7" name="longDescription"
                                        placeholder="Enter product description"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control rounded-pill" id="price" name="price"
                                        placeholder="Enter price">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <label for="attachment" class="form-label">Attachment</label>
                                    <input type="file" class="form-control rounded-pill" id="attachment" name="attachment">
                                </div>
                            </div>
                            <div class="col-12 mt-5 text-center">
                                <button type="submit" class="btn btn-primary" name="btnSubmit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- for temporary sidebar use only. tanggalin once na malagay data ng tables -->
        <div class="container container-space">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>