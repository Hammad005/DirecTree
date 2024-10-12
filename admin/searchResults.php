<?php
include '../partials/_dbconnection.php';
session_name("admin-login");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION == false) {
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DirecTree-AdminPanel</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../images/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/logo/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/logo/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <?php
        include 'partials/_sidebar.php';
        ?>


        <!-- Content Start -->
        <div class="content">
            <?php include 'partials/_nav.php'; ?>
            <div class="container-fluid pt-4 px-4">
                <h3><i class="fas fa-search me-2"></i>Search Results</h3>
                <div class="row g-4 pt-2">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <?php
                            if (isset($_GET['search'])) {
                                $search = mysqli_real_escape_string($conn, $_GET['search']);
                            }else{
                                $search = null;
                            }
                            // Search Result From Listings
                            $listings_sql = "SELECT * FROM `listings` WHERE MATCH(`username`,`listing_cat`,`name`,`desciption`,`address`,`phone`,`website`) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
                            $listings_result = mysqli_query($conn, $listings_sql);
                            $listings_num = mysqli_num_rows($listings_result);

                            // Search Result From Blogs
                            $blogs_sql = "SELECT * FROM `blogs` WHERE MATCH(`username`,`title`,`content`) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
                            $blogs_result = mysqli_query($conn, $blogs_sql);
                            $blogs_num = mysqli_num_rows($blogs_result);

                            // Search Result From Messages
                            $messages_sql = "SELECT * FROM `message` WHERE MATCH(`name`,`email`,`subject`,`message`) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
                            $messages_result = mysqli_query($conn, $messages_sql);
                            $messages_num = mysqli_num_rows($messages_result);

                            // Search Result From Users
                            $users_sql = "SELECT * FROM `users` WHERE MATCH(`username`,`email`) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
                            $users_result = mysqli_query($conn, $users_sql);
                            $users_num = mysqli_num_rows($users_result);

                            // Search Result From Categories
                            $cat_sql = "SELECT * FROM `categories` WHERE MATCH(`name`) AGAINST ('$search' IN NATURAL LANGUAGE MODE)";
                            $cat_result = mysqli_query($conn, $cat_sql);
                            $cat_num = mysqli_num_rows($cat_result);

                            // Check if any results were found
                            $num = $listings_num + $blogs_num + $messages_num + $users_num + $cat_num;
                            if ($num === 0) {
                                echo '
                                <h4><strong>
                                    Your search "<small style="color:black;">' . $search . '</small>" did not match any documents.
                                </strong></h4><hr>';
                                include 'partials/_noSearchFound.php'; 
                            } else {
                                // Display Listings Results
                                if ($listings_num > 0) {
                                    echo '
                                    <h4><strong>
                                    Search results for "<small style="color:black;">' . $search . '</small>".
                                    </strong></h4><hr>
                                    ';
                                    echo '<h4 style="color: black;"><strong>Listings:</strong></h4><ul>';
                                    while ($listings_row = mysqli_fetch_assoc($listings_result)) {
                                        echo '
                                        <li>
                                            <a href="listing.php">
                                            <b>' . $listings_row['username'] . '</b>
                                            <i class="fa-solid fa-caret-right" style="color:black;"></i>
                                            <b>' . $listings_row['listing_cat'] . '</b>
                                            <i class="fa-solid fa-caret-right" style="color:black;"></i>
                                            <b>' . $listings_row['name'] . '</b>
                                            <i class="fa-solid fa-caret-right" style="color:black;"></i>
                                            <p class="ps-4"><b style="color:black;">Description: </b>' . $listings_row['desciption'] . '</p>
                                            <p class="ps-4"><b style="color:black;">Address: </b>' . $listings_row['address'] . '</p>
                                            <p class="ps-4"><b style="color:black;">Phone: </b>' . (!empty($listings_row['phone']) ? $listings_row['phone'] : 'No phone number') . '</p>
                                            <p class="ps-4"><b style="color:black;">Website: </b>' . (!empty($listings_row['website']) ? $listings_row['website'] : 'No website') . '</p>
                                            </a>
                                        </li>';
                                    }                                    
                                    echo '</ul><br>';
                                }

                                // Display Blogs Results
                                if ($blogs_num > 0) {
                                    echo '<h4 style="color: black;"><strong>Blogs:</strong></h4><ul>';
                                    while ($blogs_row = mysqli_fetch_assoc($blogs_result)) {
                                        echo '
                                        <li>
                                            <a href="blog.php">
                                                <b>' . $blogs_row['username'] . '</b>
                                                <br>
                                                <b style="color:black;">' . $blogs_row['title'] . '</b>
                                                <p class="ps-4">' . $blogs_row['content'] . '</p>
                                            </a>
                                        </li>';
                                    }
                                    echo '</ul><br>';
                                }

                                // Display Messages Results
                                if ($messages_num > 0) {
                                    echo '<h4 style="color: black;"><strong>Messages:</strong></h4><ul>';
                                    while ($messages_row = mysqli_fetch_assoc($messages_result)) {
                                        echo '
                                        <li>
                                            <a href="messages.php">
                                            <b>' . $messages_row['name'] . '</b>
                                            <i class="fa-solid fa-caret-right" style="color:black;"></i>
                                            <b>' . $messages_row['email'] . '</b>
                                            <br>
                                            <b style="color:black;">' . $messages_row['subject'] . '</b>
                                            <p class="ps-4">' . $messages_row['message'] . '</p>
                                            </a>
                                        </li>';
                                    }
                                    echo '</ul><br>';
                                }

                                // Display Users Results
                                if ($users_num > 0) {
                                    echo '<h4 style="color: black;"><strong>Users:</strong></h4><ul>';
                                    while ($users_row = mysqli_fetch_assoc($users_result)) {
                                        echo '
                                        <li>
                                            <a href="registered_users.php">
                                            <b>' . $users_row['username'] . '</b>
                                            <p class="ps-4">' . $users_row['email'] . '</p>
                                            </a>
                                        </li>';
                                    }
                                    echo '</ul><br>';
                                }

                                // Display Categories Results
                                if ($cat_num > 0) {
                                    echo '<h4 style="color: black;"><strong>Categories:</strong></h4><ul>';
                                    while ($cat_row = mysqli_fetch_assoc($cat_result)) {
                                        echo '
                                        <li>
                                            <a href="listings-categories.php">
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
            <?php include 'partials/_footer.php'; ?>
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script>
        $('#deleteUser').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var userId = button.data('id'); // Extract the blog ID

            // Update the modal's delete button href with the blog ID
            var modal = $(this);
            modal.find('#deleteButton').attr('href', 'partials/_deleteUser.php?userId=' + userId);
        });
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>