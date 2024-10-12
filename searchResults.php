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

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
    <?php
    include 'partials/_nav.php'
    ?>
    <!-- SLIDER -->
    <section id="search" class="d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-lg-12 pb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <h1 class="text-center"><i class="fas fa-search me-2" style="color: #ff414d;"></i>Search Results</h1>
                            <?php
                            if (isset($_GET['search'])) {
                                $search = mysqli_real_escape_string($conn, $_GET['search']);
                            } else {
                                $search = null;
                            }
                            $checkAdmin = "SELECT * FROM `adminlogin`";
                            $checkResult = mysqli_query($conn, $checkAdmin);
                            $checkRow = mysqli_fetch_assoc($checkResult);
                            $admin = $checkRow['username'];

                            // Search Result From Listings
                            $listings_sql = "SELECT * FROM `listings` WHERE MATCH(`username`,`listing_cat`,`name`,`desciption`,`address`,`phone`,`website`) AGAINST ('$search')";
                            $listings_result = mysqli_query($conn, $listings_sql);
                            $listings_num = mysqli_num_rows($listings_result);

                            // Search Result From Blogs
                            $blogs_sql = "SELECT * FROM `blogs` WHERE MATCH(`username`,`title`,`content`) AGAINST ('$search')";
                            $blogs_result = mysqli_query($conn, $blogs_sql);
                            $blogs_num = mysqli_num_rows($blogs_result);


                            // Search Result From Categories
                            $cat_sql = "SELECT * FROM `categories` WHERE MATCH(`name`) AGAINST ('$search' )";
                            $cat_result = mysqli_query($conn, $cat_sql);
                            $cat_num = mysqli_num_rows($cat_result);

                            // Check if any results were found
                            $num = $listings_num + $blogs_num + $cat_num;
                            if ($num === 0) {
                                echo '<p class="text-center">Your search "<small style="color:#ff414d;">' . $search . '</small>" did not match any documents</p>';
                                include 'partials/_noSearchFound.php';
                            } else {
                                // Display Listings Results
                                if ($listings_num > 0) {
                                    echo '<p class="text-center">Search results for "<small style="color:#ff414d;">' . $search . '</small>"</p>';
                                    echo '<h4><strong>Listings:</strong></h4><ul>';
                                    while ($listings_row = mysqli_fetch_assoc($listings_result)) {
                                        echo '
                                        <li>
                                            <a href="details.php?id=' .$listings_row['id']. '">
                                            <b>';
                                        if ($listings_row['username'] === $admin) {
                                            echo strtoupper($admin . ' | Admin');
                                        } else {
                                            echo strtoupper($listings_row['username']);
                                        }
                                        echo '</b>
                                            <i class="fa-solid fa-caret-right" style="color:#ff414d;"></i>
                                            <b>' . strtoupper($listings_row['listing_cat']) . '</b>
                                            <i class="fa-solid fa-caret-right" style="color:#ff414d;"></i>
                                            <b>' . strtoupper($listings_row['name']) . '</b>
                                            <br>
                                            <div class="small ps-4"><b style="color:#ff414d;">Description: </b>' . $listings_row['desciption'] . '</div>
                                            <div class="small ps-4"><b style="color:#ff414d;">Address: </b>' . $listings_row['address'] . '</div>
                                            <div class="small ps-4"><b style="color:#ff414d;">Phone: </b>' . (!empty($listings_row['phone']) ? $listings_row['phone'] : 'No phone number') . '</div>
                                            <div class="small ps-4"><b style="color:#ff414d;">Website: </b>' . (!empty($listings_row['website']) ? $listings_row['website'] : 'No website') . '</div>
                                            </a>
                                        </li><br>';
                                    }
                                    echo '</ul>';
                                }

                                // Display Blogs Results
                                if ($blogs_num > 0) {
                                    echo '<h4 style="color: black;"><strong>Blogs:</strong></h4><ul>';
                                    while ($blogs_row = mysqli_fetch_assoc($blogs_result)) {
                                        echo '
                                        <li>
                                            <a href="blog.php #blogs">
                                                <b>';
                                                if ($blogs_row['username'] === $admin) {
                                                    echo strtoupper($admin . ' | Admin');
                                                } else {
                                                    echo strtoupper($blogs_row['username']);
                                                }
                                                echo '</b>
                                                <br>
                                                <b style="color:#ff414d;">' . $blogs_row['title'] . '</b>
                                                <br>
                                                <div class="small ps-4">' . $blogs_row['content'] . '</div>
                                            </a>
                                        </li><br>';
                                    }
                                    echo '</ul>';
                                }

                                // Display Categories Results
                                if ($cat_num > 0) {
                                    echo '<h4 style="color: black;"><strong>Categories:</strong></h4><ul>';
                                    while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                        echo '
                                        <li>
                                            <a href="listing.php #listing-cat">
                                            <b>' . $cat_row['name'] . '</b>
                                            </a>
                                        </li>';
                                    }
                                    echo '</ul><br>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- SLIDER END -->

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