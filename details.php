<?php
if (!isset($_GET['id'])) {
    header('location: index.php #slider');
    exit;
} else {
    $id = $_GET['id'];
}
?>
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
    <!--============================= HEADER =============================-->
    <!-- Modal -->
    <?php
    include 'partials/_nav.php';
    $sql = "SELECT * FROM `listings` WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ratings & Reviews | <?php echo $row['name'] ?></h5>
                    <button type="button" class="btn-close" style="box-shadow:none;" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php $_SERVER['REQUEST_URI'] ?> #review" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>
                                    Overall, how would you describe your experience?
                                </h3>
                                <div class="col-6 col-md-4">
                                    <p class="mt-3">
                                        <span class="star-rating">
                                            <label for="rate-1" style="--i:1"><i class="fa-solid fa-star"></i></label>
                                            <input type="radio" name="rating" id="rate-1" value="1">
                                            <label for="rate-2" style="--i:2"><i class="fa-solid fa-star"></i></label>
                                            <input type="radio" name="rating" id="rate-2" value="2">
                                            <label for="rate-3" style="--i:3"><i class="fa-solid fa-star"></i></label>
                                            <input type="radio" name="rating" id="rate-3" value="3">
                                            <label for="rate-4" style="--i:4"><i class="fa-solid fa-star"></i></label>
                                            <input type="radio" name="rating" id="rate-4" value="4">
                                            <label for="rate-5" style="--i:5"><i class="fa-solid fa-star"></i></label>
                                            <input type="radio" name="rating" id="rate-5" value="5">
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <h3>
                                    Anything to share?
                                </h3>
                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter your name" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="comment" class="form-control" id="message" cols="40" rows="3"
                                        placeholder="Enter your comment" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    style="text-decoration: none; box-shadow: none;">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--//END HEADER -->
    <!-- Details hero -->
    <section id="details-hero" class="d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-lg-8 text-center pb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <a class="contact-brand" href="#">
                                <img src="images/logo/logo.png" alt="logo">
                            </a>
                            <?php
                            $checkAdmin = "SELECT * FROM `adminlogin`";
                            $checkResult = mysqli_query($conn, $checkAdmin);
                            $checkRow = mysqli_fetch_assoc($checkResult);
                            $admin = $checkRow['username'];

                            $sql = "SELECT * FROM `listings` WHERE `id` = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $listing = $row['name'];
                            ?>
                            <h1 class="text-center"><?php echo $listing ?></h1>
                            <p><?php echo $row['desciption'] ?></p>
                        </div>
                    </div>
                    <div class="container text-center">
                        <a href="details.php?id=<?php echo $id ?>#details" class="btn btn-primary">
                            Details
                            <span class="ti-arrow-down py-0"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Details-hero END -->
    <!-- Details Section -->
    <section id="details" class="ftco-section ftco-contact-section ftco-no-pt ftco-no-pb viewed bg-light">
        <div class="row g-0">
            <div class="col-md-6 mt-0 heading-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                <div class="container text-center">
                    <a href="admin/listing/<?php echo $row['picture'] ?>"
                        class="img-brand img-property d-flex align-items-center justify-content-center glightbox"
                        style="background-image: url(admin/listing/<?php echo $row['picture'] ?>); background-position: center center;">
                        <div class="icon-brand d-flex align-items-center justify-content-center">
                            <i class="ion-ios-search"></i>
                        </div>
                    </a>
                    <br>
                    <?php
                    include 'partials/_svgLogic.php';
                    ?>
                    <span class="subheading"><?php echo $row['listing_cat'] ?></span>
                    <div class="styled-heading mt-2 mb-0">
                        <h3><b><?php echo $row['name'] ?></b></h3>
                    </div>
                    <div class="sub-heading">
                        <p><?php echo $row['desciption'] ?></p>
                    </div>
                </div>
                <div class="contact-wrap w-100 p-4 mt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="dbox w-100 d-flex align-items-start">
                                <ul>
                                    <li>
                                    <p><span class="fas fa-user-shield"></span><em> Added By:</em>
                                            <?php
                                            if ($row['username'] === $admin) {
                                                echo strtoupper($admin . ' | Admin');
                                            } else {
                                                echo strtoupper($row['username']);
                                            }
                                            ?>
                                        </p>
                                    </li>
                                    <li>
                                        <p><span class="ico fa fa-clock"></span><em> Timing:</em>
                                            <?php
                                            $openTime = $row['open_time'];
                                            $closeTime = $row['close_time'];
                                            if ($openTime === $closeTime) {
                                                echo '24hrs';
                                            } else {
                                                $openTimeFormatted = DateTime::createFromFormat('H:i:s', $openTime)->format('h:i A');
                                                $closeTimeFormatted = DateTime::createFromFormat('H:i:s', $closeTime)->format('h:i A');
                                                echo $openTimeFormatted . ' - ' . $closeTimeFormatted;
                                            }
                                            ?>
                                        </p>
                                    </li>
                                    <li>
                                        <p><span class="fa fa-phone"></span><em> Phone:</em>
                                        <a href="tel://<?php echo isset($row['phone']) && !empty($row['phone']) ? $row['phone'] : '#'; ?>" style="color:grey;">
                                                    <?php echo isset($row['phone']) && !empty($row['phone']) ? $row['phone'] : 'No phone number'; ?>
                                                </a>
                                        </p>
                                    </li>
                                    <li>
                                        <p><span class="fa fa-earth"></span><em> Website:</em>
                                            <a href="<?php echo isset($row['website']) && !empty($row['website']) ? $row['website'] : '#'; ?>" style="color:grey;">
                                                <?php echo isset($row['website']) && !empty($row['website']) ? $row['website'] : 'No website'; ?>
                                            </a>
                                        </p>
                                    </li>
                                    <li>
                                        <p><span class="ico fa fa-star"></span><em> Ratings & Reviews:</em>
                                        <?php
                                                $review = "SELECT * FROM `reviews` WHERE `listing` = '$listing'";
                                                $reviewResult  = mysqli_query($conn, $review);
                                                $good = 0;
                                                $bad = 0;
                                                while ($rating = mysqli_fetch_assoc($reviewResult )) {
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
                                        </p>
                                    </li>
                                    <li>
                                        <p><span class="ion-ios-pin" style="font-size: 18px;"></span><em> Address:</em>
                                            <?php echo $row['address'] ?>
                                        </p>
                                    </li>
                                    <li>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            <i class="ti-plus"></i>
                                            Write A Review
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6 d-flex  aos-init aos-animate " data-aos="fade-up" data-aos-delay="100"
                data-aos-duration="1000">
                <div class="img w-100">
                    <?php echo html_entity_decode($row['location']) ?>
                </div>
            </div>
        </div>
        <div class="row g-0">
            <!-- <div class="col-md-12 mt-0 heading-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                <div class="contact-wrap w-100 p-4 mt-0">
                    <div class="heading">
                        <h2 class="h2">Post Comment or Review</h2>
                    </div>
                    <form id="contactForm" name="contactForm" class="contactForm mt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="40" rows="3"
                                        placeholder="Write a comment or review" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Post
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <div id="review" class="col-md-12 mt-0 heading-section aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                <div class="contact-wrap w-100 p-4 mt-0">
                    <div class="heading">
                        <h2 class="h2">Reviews:</h2>
                    </div>
                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $listing = $row['name'];
                        $rating = isset($_POST['rating']) ? $_POST['rating'] : null;
                        $name = $_POST['name'];
                        $comment = $_POST['comment'];
                        //Replace < to &lt; for error handling in database
                        $commecommentnt_content = str_replace("<", "&lt;", $comment);
                        //Replace > to &gt; for error handling in database
                        $comment = str_replace(">", "&gt;", $comment);
                        //Replace ' to &apos; for error handling in database
                        $comment = str_replace("'", "&apos;", $comment);

                        $sql = "INSERT INTO `reviews` (`listing`, `rating`, `name`, `comment`, `add_time`) 
                        VALUES ('$listing', '$rating', '$name', '$comment', current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo '<div class="alert alert-success alert-dismissible fade show w-100 " role="alert"
                            style="font-size:12px;">
                            <strong>Done!</strong> Review has been post.
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
                    <div class="comment">
                        <?php
                        $sql = "SELECT * FROM `reviews` WHERE `listing` = '$listing' ORDER BY `id` DESC";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($review = mysqli_fetch_assoc($result)) {
                        ?>
                                <span><?php echo $review['name'] ?>:</span>
                                <p><?php echo $review['comment'] ?></p>
                                <p class="justify-content-center text-end">
                                    <span>Ratings: </span>
                                    <?php
                                    $stars = (int)$review['rating'];
                                    $totalStars = 5;
                                    for ($i = 1; $i <= $totalStars; $i++) {
                                        if ($i <= $stars) {
                                            echo '<i class="fa fa-star checked"></i>';
                                        } else {
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                    }
                                    ?>
                                </p>
                                <hr>
                        <?php
                            }
                        } else {
                            echo '<span>No reviews yet!</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Details Section -->
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