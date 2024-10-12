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
    <!--============================= HEADER =============================-->
    <?php
    include 'partials/_nav.php';
    ?>
    <!-- Sports-hero -->
    <section id="sports-hero" class="d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-lg-8 text-center pb-5 mt-5 ">
                    <div class="row text-center justify-content-center">
                        <div class="col-lg-9">
                            <p class="breadcrumbs text-center">
                                <span class="me-2">
                                    <a href="listing.php">
                                        Listing
                                        <i class="fa fa-chevron-right"></i>
                                    </a>
                                </span>
                                <span>
                                    Sports
                                    <i class="fa fa-chevron-right"></i>
                                </span>
                            <div class="styled-heading">
                                <h1>Sports</h1>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sports-hero END -->
    <!-- Sports Section -->
    <section id="sports" class="ftco-section mb-0 bg-light">
        <div class="container-xl">
            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-12 heading-section text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        Looking for sports action<span>?</span>
                    </h2>
                    <span class="subheading">Discover sports grounds, shops, and more right here!</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
            <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $limit = 8;
                $offset = ($page - 1) * $limit;
                $sql = "SELECT * FROM `listings` WHERE `listing_cat` = 'sports' AND `status` = 'approved' ORDER BY `id` LIMIT $limit OFFSET $offset";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $listing = $row['name'];
                ?>
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up"
                            data-aos-delay="100" data-aos-duration="1000">
                            <div class="listing-wrap">
                                <a href="admin/listing/<?php echo $row['picture']; ?>"
                                    class="img img-property d-flex align-items-center justify-content-center glightbox"
                                    style="background-image: url(admin/listing/<?php echo $row['picture']; ?>); background-position: center;">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <i class="ion-ios-search"></i>
                                    </div>
                                </a>

                                <div class="text text-center">
                                    <?php
                                    include 'partials/_svgLogic.php';
                                    ?>
                                    <span class="subheading"><?php echo $row['listing_cat']; ?></span>
                                    <h3><a href="details.php?id=<?php echo $row['id']; ?>#details-hero"><?php echo substr($row['name'], 0, 17); ?></a></h3>
                                    <ul>
                                        <li>
                                            <p><span class="ion-ios-pin" style="font-size: 18px;"></span>
                                                <?php echo substr($row['address'], 0, 20) . '...'; ?>
                                            </p>
                                        </li>
                                        <li>
                                            <p><span class="fa fa-phone"></span>
                                                <?php
                                                if (isset($row['phone']) && !empty($row['phone'])) {
                                                    echo $row['phone'];
                                                } else {
                                                    echo 'No phone number';
                                                }
                                                ?>
                                            </p>
                                        </li>
                                        <li>
                                            <p>
                                                <span class="fa fa-earth"></span>
                                                <?php
                                                if (isset($row['website']) && !empty($row['website'])) {
                                                    echo substr($row['website'], 0, 25) . '...';
                                                } else {
                                                    echo 'No website';
                                                }
                                                ?>
                                            </p>

                                        </li>
                                    </ul>
                                    <div class="info-wrap2 d-flex align-items-center mb-3">
                                        <p class="review">
                                            <span class="rev">Ratings <small>
                                                    <?php
                                                    $review = "SELECT * FROM `reviews` WHERE `listing` = '$listing'";
                                                    $reviewResult  = mysqli_query($conn, $review);
                                                    $good = 0;
                                                    $bad = 0;
                                                    while ($rating = mysqli_fetch_assoc($reviewResult)) {
                                                        $r = (int)$rating['rating'];
                                                        if ($r >= 3) {
                                                            $good++;
                                                        } else {
                                                            $bad++;
                                                        }
                                                    }
                                                    $totalRating = $good + $bad;
                                                    if ($totalRating > 0) {
                                                        $ratingPer = ($good / $totalRating) * 5;
                                                    } else {
                                                        $ratingPer = 0;
                                                    }
                                                    echo round($ratingPer) . '.0/5';
                                                    ?>
                                                </small>
                                                <span class="ico ion-ios-star"></span>
                                            </span>
                                            <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
            <?php

            // Fetch the total number of approved blogs to calculate total pages
            $sql = "SELECT COUNT(*) AS total FROM `listings` WHERE `listing_cat` = 'sports' AND `status` = 'approved'";
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
                                <li><a href="?page=<?php echo $page - 1; ?>">&lt;</a></li>
                            <?php endif; ?>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $pages; $i++): ?>
                                <li class="<?php echo ($i == $page) ? 'active' : ''; ?>">
                                    <?php if ($i == $page): ?>
                                        <span><?php echo $i; ?></span>
                                    <?php else: ?>
                                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    <?php endif; ?>
                                </li>
                            <?php endfor; ?>

                            <!-- Next Button -->
                            <?php if ($page < $pages): ?>
                                <li><a href="?page=<?php echo $page + 1; ?>">&gt;</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sports Section -->
    <!--//END HEADER -->
    <!--============================= FOOTER =============================-->
    <?php
    include 'partials/_footer.php';
    ?>
    <!--//END FOOTER -->
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