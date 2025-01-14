<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ServeIT | Admin Dashboard</title>
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
                <h1><b style="color: #19AFA5;">ADD</b> <b>PRODUCT/SERVICES</b></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="col-md-11 card card-1 m-5 rounded-5 mx-auto">
                    <div class="container-fluid rounded-top-5" style="background-color: #000; height: 50px;"></div>
                    <div class="row p-5">
                        <form>
                            <div class="row g-5 d-flex justify-content-center">
                                <div class="col-md-6">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control rounded-pill" id="productName"
                                        placeholder="Enter product name">
                                </div>
                                <div class="col-md-6">
                                    <label for="tags" class="form-label">Tags</label>
                                    <input type="text" class="form-control rounded-pill" id="tags"
                                        placeholder="Enter tags">
                                </div>
                                <div class="col-md-6">
                                    <label for="productDescription" class="form-label">Product Description</label>
                                    <textarea class="form-control rounded-4" id="productDescription" rows="7"
                                        placeholder="Enter product description"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control rounded-pill" id="price"
                                        placeholder="Enter price">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <label for="attachment" class="form-label">Attachment</label>
                                    <input type="file" class="form-control rounded-pill" id="attachment">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-select rounded-pill" id="category">
                                        <option selected>Service</option>
                                        <option>Product</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mt-5 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
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