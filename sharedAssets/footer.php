<!-- help -->

<?php

$userID = $_SESSION['userID'];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message'])) {
    $messageFooter = mysqli_real_escape_string($conn, $_POST['message']);
    $sendMessageQuery = "INSERT INTO chats(senderID, receiverID, message, isRead) VALUES ('$userID', '$receiverID', '$messageFooter', 'yes')";
    executeQuery($sendMessageQuery);

    header("Location: chats.php?id=$receiverID&username=$username");

    $messagesQuery = "SELECT * FROM chats WHERE ((receiverID=$receiverID AND senderID=$userID) OR (receiverID=$userID AND senderID=$receiverID))";
    $messagesResult = executeQuery($messagesQuery);
}


?>

<div class="container-fluid help-section" style="margin: 0px; padding: 20px 0;">
    <div class="help-title text-center mb-3" style="font-size: 1.5rem; font-weight: bold;">
        HOW CAN WE HELP?
    </div>
    <div class="container d-flex justify-content-center align-items-center">
        <?php if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) { ?>
            <!-- eto lalabas pag log-in -->
            <form method="POST" action="chats.php" class="d-flex align-items-center" style="max-width: 600px; width: 100%;">
                <input class="form-control me-2 need-help" type="text" placeholder="Type a message here" name="message" required>
                <button class="btn btn-outline-primary need-help-btn" type="submit">Send</button>
            </form>
        <?php } else { ?>
            <!-- eto lalabas kapag di log-in -->
            <form method="POST" action="chats.php" class="d-flex align-items-center" style="max-width: 600px; width: 100%;">
                <input class="form-control me-2 need-help" type="text" placeholder="Please log in to send a message" name="message" disabled>
                <button class="btn btn-outline-primary need-help-btn" type="submit" disabled>Send</button>
            </form>
        <?php } ?>
    </div>
</div>



<!-- main footer -->

<div class="container-fluid" style="background-color: #000000">
    <div class="container">
        <footer class="text-center text-lg-start text-white">
            <div class="container-fluid p-4 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-1" style="font-family:Dela Gothic One, sans-serif;">
                                SERVE<span style="color:#19AFA5; ">IT</span>
                            </h6>
                            <p style="font-size: 12px;">
                                The content on the Serve It website is provided for informational purposes only.
                                While
                                we strive to ensure accuracy, we do not guarantee the completeness, reliability, or
                                timeliness of the information. Use of our website and services is at your own risk.
                                Serve It is not liable for any damages or losses resulting from reliance on our
                                content
                                or services. By using our site, you agree to these terms.
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 text-center">
                            <h6 class="text-uppercase mb-4 font-weight-bold">MarketPlace</h6>
                            <p><a class="text-white" href="services.php">Services</a></p>
                            <p><a class="text-white" href="products.php">Products</a></p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 text-center">
                            <h6 class="text-uppercase mb-4 font-weight-bold">COMPANY</h6>
                            <p><a class="text-white" href="about.php">About ServeIt</a></p>
                            <p><a class="text-white" href="helpCenter.php">Help Center</a></p>
                            <p><a class="text-white" href="chats.php">Contact Us</a></p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-center">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                            <p><i class="fa-brands fa-tiktok mx-1" href="."></i> ServeIT</p>
                            <a href="https://github.com/ServeITPH">
                                <p><i class="fa-brands fa-github mx-1"></i> Serve-IT</p>
                            </a>
                            <a href="https://discord.gg/czuSHrzM">
                                <p><i class="fa-brands fa-discord mx-1"></i>Serve-IT.ph</p>
                            </a>
                        </div>
                    </div>
                </section>
                <hr class="my-3">
                <section class="p-3 pt-0">
                    <div class="row d-flex align-items-center">
                        <div class="col-md-7 col-lg-8 text-center text-md-start">
                            <div class="p-3">
                                © 2024 Copyright:
                                <a href="https://github.com/ServeITPH" style="color:#19AFA5">Serve-It.Ph</a>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                            <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" role="button"
                                href="https://github.com/ServeITPH"><i class="fab fa-github"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                    class="fab fa-google"></i></a>
                            <a class="btn btn-outline-light btn-floating m-1" role="button"><i
                                    class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                </section>
            </div>
        </footer>
    </div>
</div>