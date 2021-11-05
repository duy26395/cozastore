<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/login.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:300,600" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <script src="vendor/animsition/js/animsition.min.js"></script>

    <!--===============================================================================================-->
    <script src="bootstrap-sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="bootstrap-sweetalert/dist/sweetalert.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <title>Login</title>
</head>

<body>

    <div class="container animsition">
        <section id="formHolder">

            <div class="row">

                <!-- Brand Box -->
                <div class="col-sm-6 brand">
                    <a href="index.php" class="logo">
                        <img src="images/icons/logo-01.png" alt="IMG-LOGO">
                    </a>

                    <div class="heading">
                        <!-- <h2>Marina</h2>
                        <p>Your Right Choice</p> -->
                    </div>

                    <div class="success-msg">
                        <p>Great! You are one of our members now</p>
                        <a href="#" class="profile">Your Profile</a>
                    </div>
                </div>


                <!-- Form Box -->
                <div class="col-sm-6 form">
                    <!-- Login Form -->
                    <div class="login form-peice">
                        <form class="login-form" onsubmit="return false" method="post">
                            <div class="form-group">
                                <label for="loginemail">Email Adderss</label>
                                <input type="email" name="loginemail" id="loginemail" required>
                            </div>

                            <div class="form-group">
                                <label for="loginPassword">Password</label>
                                <input type="password" name="loginPassword" id="loginPassword" required>
                            </div>
                            <div class="CTA">
                                <input id="btnlogin" type="submit" value="Login">
                            </div>
                            <div class="col-md-12 CTA d-flex justify-content-between">
                                <a href="#" class="switch">I'm new members</a>
                                <a href="#" class="fg">Forget password</a>
                            </div>
                            <p class="msg"></p>
                            <div class="col-md-12 CTA">
                                <ul class="social-network social-circle">
                                    <li><a href="facebook-Login/facbookControler.php" class="icoFacebook" title="Facebook"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="icoTwitter" title="Twitter"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="google-Login/googleAPI-Controler.php" class="icoGoogle" title="Google +"><i
                                                class="fab fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                    <!-- End Login Form -->


                    <!-- Signup Form -->
                    <div class="signup form-peice switched">
                        <form class="signup-form" action="#" method="post">

                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="username" id="name" class="name">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Adderss</label>
                                <input type="email" name="emailAdress" id="email" class="email">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number - <small>Optional</small></label>
                                <input type="text" name="phone" id="phone">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="pass">
                                <span class="error"></span>
                            </div>

                            <div class="form-group">
                                <label for="passwordCon">Confirm Password</label>
                                <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                                <span class="error"></span>
                            </div>

                            <div class="CTA">
                                <input type="submit" value="Signup Now" id="submit">
                                <a href="#" class="switch">I have an account</a>
                            </div>
                        </form>
                    </div>
                    <!-- End Signup Form -->
                </div>
            </div>

        </section>


        <footer>
            <p>
                Source by: Mohmdhasan - Remake by : Duy_dev
            </p>
        </footer>

    </div>
    <div class="alert alert-warning alert-dismissible fade" role="alert">
        
    </div>
</body>

</html>