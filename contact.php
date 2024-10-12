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
    <link rel="apple-touch-icon" sizes="180x180" href="images/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/logo/favicon/site.webmanifest">
    <link rel="mask-icon" href="images/logo/favicon/safari-pinned-tab.svg" color="#5bbad5">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/themify-icons/0.1.2/css/themify-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    <?php
    include 'partials/_nav.php';
    ?>
    <!-- Contact hero -->
    <section id="contact-hero" class="d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-lg-8 text-center pb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <a class="contact-brand" href="#">
                                <img src="images/logo/logo.png" alt="logo">
                            </a>
                            <h1 class="text-center">We'd Love to Hear from You!</h1>
                            <p>Whether you have a question, feedback, or just want to say hello, we're here to help.
                                Feel free to reach out to us for any inquiries, suggestions, or support. Simply fill out
                                the contact form below, and we'll get back to you as soon as possible. Your thoughts and
                                ideas are important to us, and we look forward to connecting with you!</p>
                        </div>
                    </div>
                    <div class="container text-center">
                        <a href="contact.php #contact" class="btn btn-primary">
                            <span class="ti-arrow-down py-0"></span>
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-hero END -->
    <!-- contact Section -->
    <section id="contact" class="ftco-section ftco-contact-section ftco-no-pt ftco-no-pb viewed bg-light">
        <div class="row g-0">
            <div class="col-md-6 mt-0 heading-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                <div class="container">
                    <div class="styled-heading mt-5">
                        <h3><b>Contact Us</b></h3>
                    </div>
                </div>
                <div class="contact-wrap w-100 p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dbox w-100 d-flex align-items-start">
                                <div class="text">
                                    <p>
                                        <em><span class="ti-location-pin"></span>Address:</em>
                                        <a href="https://maps.app.goo.gl/jVmK2kUuaJBDjEAF7">Clifton, Karachi City, Sindh
                                            Pakistan</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dbox w-100 d-flex align-items-start">
                                <div class="text">
                                    <p>
                                        <em><span class="ti-email"></span> Email:</em>
                                        <a href="mailto:DirecTree@gmail.com">DirecTree@gmail.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dbox w-100 d-flex align-items-start">
                                <div class="text">
                                    <p>
                                        <em><span class="ti-mobile"></span>Phone:</em>
                                        <a href="tel://3389554885">+92 3389 55488 5</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $subject = $_POST['subject'];
                        $message = $_POST['message'];
                        $sql = "INSERT INTO `message` (`name`, `email`, `subject`, `message`, `add_time`) 
                        VALUES ('$name', '$email', '$subject', '$message', current_timestamp());";
                        $send = mysqli_query($conn, $sql);
                        if ($send) {
                            echo '<div class="alert alert-success alert-dismissible fade show w-100 " role="alert"
                                    style="font-size:12px;">
                                    <strong>Done!</strong> Message has been send.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                    </div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissible fade show w-100 " role="alert"
                                    style="font-size:12px;">
                                    <strong>Error!</strong> Something wrong pLease try again later.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                    </div>';
                        }
                    }
                    ?>
                    <form action="contact.php #contact" method="POST" id="contactForm" name="contactForm" class="contactForm mt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Subject" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="4"
                                        placeholder="Create a message here" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="social-media w-100 mt-4">
                        <p>
                            <a href="https://www.facebook.com/"><span class="ti-facebook"></span></a>
                            <a href="https://twitter.com/"><span class="ti-twitter"></a>
                            <a href="https://www.instagram.com/"><span class="ti-instagram"></a>
                            <a href="https://www.pinterest.com/"><span class="ti-pinterest"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-md-flex align-items-stretch aos-init aos-animate mb-sm-0" data-aos="fade-up"
                data-aos-delay="100" data-aos-duration="1000">
                <div class="img w-100" style="background-image: url(images/contact-form.jpg); background-position: center;"></div>
            </div>
        </div>

    </section>
    <!-- End About Section -->
    <?php
    include 'partials/_footer.php';
    ?>
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- jQuery, Bootstrap JS. -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/preloader.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>