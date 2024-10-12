<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Colorlib">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>DirecTree</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../images/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/logo/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/logo/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="css/simple-line-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Sing in  Form -->
    <section id="sign-in">
        <div class="overlay"></div>
        <div class="container">
            <div class="signin-content">
                <!-- <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                    </div> -->
                <?php
                include '../partials/_dbconnection.php';
                $showAlert = false;
                $showError = false;
                $showUsernameError = false;
                $showPasswordError = false;
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['confirm-pass'];

                    $sql = "SELECT `username` FROM `users` WHERE `username` = '$username' UNION SELECT `username` FROM `adminlogin` WHERE `username` = '$username'";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        $showUsernameError = true;
                    }
                    else {
                        if ($password == $cpassword) {
                           $sql ="INSERT INTO `users` (`username`, `email`, `password`, `add-time`) VALUES 
                           ('$username', '$email', '$password', current_timestamp())";
                           $result = mysqli_query($conn, $sql);
                           if ($result) {
                            $showAlert = true;
                           }else{
                            $showError = true;

                           }
                        }
                        else{
                            $showPasswordError = true;
                        }
                    }
                    
                }
                ?>
                <div class="signin-form">
                    <img src="../images/logo/logo.png" width="100px" alt="sing in image">
                    <h2 class="form-title mt-2">Sign Up</h2>
                    <?php
                    if ($showUsernameError) {
                        echo '<div class="alert alert-warning alert-dismissible fade show w-100 " role="alert"
                        style="font-size:12px;">
                        <strong>Alert!</strong> This Username is already takken.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                        </div>';
                    }
                    if ($showPasswordError) {
                        echo '<div class="alert alert-warning alert-dismissible fade show w-100 " role="alert"
                        style="font-size:12px;">
                        <strong>Alert!</strong> Enter the same password in confirm password field.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                        </div>';
                    }
                    if ($showAlert) {
                        echo '<div class="alert alert-success alert-dismissible fade show w-100 " role="alert"
                        style="font-size:12px;">
                        <strong>Done!</strong> Account has been created, back to log in page.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                        </div>';
                    }
                    if ($showError) {
                        echo '<div class="alert alert-danger alert-dismissible fade show w-100 " role="alert"
                        style="font-size:12px;">
                        <strong>Error!</strong> Something Wrong please try again later.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                        </div>';
                    }
                    ?>

                    <form action="../sign-in/sign-up.php" method="POST" class="register-form" id="login-form">
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="username" id="your_name" placeholder="Username" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                            <input type="password" name="confirm-pass" id="re_pass"
                                placeholder="Repeat your password" />
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Sign up" />
                        </div>

                    </form>
                    <div class="signup-link">
                        <a href="sign-in.php" class="signup-btn-link">I am already member</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- JS -->
    <script src="../js/preloader.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>