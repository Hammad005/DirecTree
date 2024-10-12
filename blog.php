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
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    include 'partials/_nav.php';
    ?>
    <!-- SLIDER -->
    <section id="blogs-hero" class="d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-lg-8 pb-5 mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <!-- <a class="blogs-brand " href="#">
                                <img src="images/logo/logo.png" alt="logo">
                            </a> -->
                            <h1 class="text-center">Blogs</h1>
                            <p>Welcome to the DirecTree Blog, your guide to discovering the best spots and services in
                                town! From top restaurants and cozy cafes to unique shops, exciting nightlife, and fun
                                activities, we cover it all.</p>
                            <p>Stay tuned for updates and tips on making the most of what your city has to offer. Start
                                exploring with us today!</p>
                            <p>
                                Discover the best spots and services in town, from great eats and unique shops to fun
                                activities and local gems. Stay updated with our latest posts and start exploring today!
                            </p>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['blogAdded'])) {
                        echo '
                        <div class="alert alert-success alert-dismissible fade show w-100 " role="alert"
                                    style="font-size:12px;">
                                    <strong>Submitted!</strong> Blog has been submitted. Please wait for the community to respond.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                    </div>';
                    } else if (!isset($_GET['blogAdded']) == false) {
                        echo '
                        <div class="alert alert-danger alert-dismissible fade show w-100 " role="alert"
                                    style="font-size:12px;">
                                    <strong>Error!</strong> Something wrong pLease try again later.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                    </div>>';
                    }
                    if (!isset($_SESSION['loggedin']) || $_SESSION == false) {
                        echo '
                            <div class="container text-center">
                                <p><b>Note:</b> Please sign in for add blog.</p>
                                <a href="sign-in/sign-in.php" class="btn btn-primary">
                                        <span class="ti-user pe-2"></span>Sign In</a>
                            </div>
                            ';
                    } else {
                        echo '
                            <div class="container text-center">
                                <a href="add_blog.php" class="btn btn-primary">
                                    <span class="ti-plus py-0"></span>
                                    Add Blog
                                </a>
                            </div>
                            ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- SLIDER END -->

    <!-- Blogs Section -->
    <section id="blogs" class="ftco-section bg-light">
        <div class="container-xl">
            <div class="row justify-content-center mb-5 mt-5" data-aos="fade-up"
                data-aos-duration="1000">
                <div class="col-md-7 heading-section text-center aos-init aos-animate" data-aos="fade-up"
                    data-aos-duration="1000">
                    <span class="subheading">Our Blogs</span>
                    <div class="styled-heading mb-3">
                        <h2>Explore Your City with the DirecTree Blogs!</h2>
                    </div>
                </div>
            </div>

            <?php
            $checkAdmin = "SELECT * FROM `adminlogin`";
            $checkResult = mysqli_query($conn, $checkAdmin);
            $checkRow = mysqli_fetch_assoc($checkResult);
            $admin = $checkRow['username'];

            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 3;
            $offset = ($page - 1) * $limit;
            $sql = "SELECT * FROM `blogs` WHERE `status`='approved' ORDER BY `id` DESC LIMIT $limit OFFSET $offset";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $timestamp = $row['add-time'];
                    $date = new DateTime($timestamp);
                    $formattedDate = $date->format('M. d, Y h:i:s A');
            ?>

                    <div class="row justify-content-center">
                        <div class="col-md-12 d-flex mb-4">
                            <div class="blog-entry justify-content-center" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="100">
                                <div class="text">
                                    <h3 class="heading mb-2"><?php
                                                                echo $row['title'];
                                                                ?></h3>
                                    <p class="mb-2"><?php
                                                    echo $row['content'];
                                                    ?></p>
                                    <div class="list-team">
                                        <h3 class="mb-0"><?php
                                                            if ($row['username'] === $admin) {
                                                                echo $admin . ' | Admin';
                                                            } else {
                                                                echo $row['username'];
                                                            }
                                                            ?> </h3>
                                    </div>
                                    <p class="meta mb-0 d-flex justify-content-end"><span><?php
                                                                                            echo $formattedDate;
                                                                                            ?></span></p>

                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
            <?php
            // Fetch the total number of approved blogs to calculate total pages
            $sql = "SELECT COUNT(*) AS total FROM `blogs` WHERE `status`='approved'";
            $totalResult = mysqli_query($conn, $sql);
            $totalRow = mysqli_fetch_assoc($totalResult);
            $totalBlogs = $totalRow['total'];

            // Calculate the total number of pages
            $pages = ceil($totalBlogs / $limit);
            ?>

            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <!-- Previous Button -->
                            <?php if ($page > 1): ?>
                                <li><a href="?page=<?php echo $page - 1; ?> #blogs">&lt;</a></li>
                            <?php endif; ?>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $pages; $i++): ?>
                                <li class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                                    <?php if ($i == $page): ?>
                                        <span><?php echo $i; ?></span>
                                    <?php else: ?>
                                        <a href="?page=<?php echo $i; ?> #blogs"><?php echo $i; ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Button -->
                            <?php if ($page < $pages): ?>
                                <li><a href="?page=<?php echo $page + 1; ?> #blogs">&gt;</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blogs Section -->
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
            once: true // Animations occur only once, do not reset when scrolling back up
        });
    </script>



    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>