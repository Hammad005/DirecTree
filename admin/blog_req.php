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
        include 'modals/rejectBlogModal.php';
        ?>


        <!-- Content Start -->
        <div class="content">
            <?php
            include 'partials/_nav.php';
            ?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <h3><i class="fas fa-envelope-open-text me-2"></i> Blog Requests</h3>

                <?php
                $sql = "SELECT * FROM `blogs` WHERE `status` = 'pending' ORDER BY `id` DESC";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $timestamp = $row['add-time'];
                        $date = new DateTime($timestamp);
                        $formattedDate = $date->format('M. d, Y h:i:s A');
                ?>

                        <div class="row justify-content-center">
                            <div class="col-md-12 d-flex mb-4">
                                <div class="blog-entry bg-light justify-content-center" data-aos="fade-up"
                                    data-aos-duration="1000" data-aos-delay="100">
                                    <div class="text">
                                        <div class="list-team d-flex justify-content-start">
                                            <h3 class="mb-0"><?php
                                                                echo $row['username'];
                                                                ?> </h3>
                                        </div>
                                        <p class="meta mb-0 d-flex justify-content-start"><span><?php
                                                                                                echo $formattedDate;
                                                                                                ?></span></p>
                                        <h3 class="heading mb-2 mt-2"><?php
                                                                        echo $row['title'];
                                                                        ?></h3>
                                        <p class="mb-2"><?php
                                                        echo $row['content'];
                                                        ?></p>
                                        <div class="container d-flex justify-content-end  align-item-spacebetween">

                                            <button class="add-btn" type="button" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#rejectBlog">
                                                <i class="fas fa-times-circle"></i> Reject
                                            </button>

                                            <a class="add-btn ms-2" type="button" href="partials/_approvedBlog.php?blogId=<?php echo $row['id']; ?>">
                                                <i class="fas fa-check-circle"></i> Approved</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>

<div class="row justify-content-center">
                        <div class="col-md-12 d-flex mb-4">
                            <div class="blog-entry bg-light justify-content-center" data-aos="fade-up"
                                data-aos-duration="1000" data-aos-delay="100">
                                <div class="text">
                                    <div class="list-team d-flex justify-content-start">
                                        <h3 class="mb-0">There is no request for a blog post.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

            <?php
            include 'partials/_footer.php';
            ?>
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
        $('#rejectBlog').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var blogId = button.data('id'); // Extract the blog ID

            // Update the modal's delete button href with the blog ID
            var modal = $(this);
            modal.find('#deleteButton').attr('href', 'partials/_rejectBlog.php?blogId=' + blogId);
        });
    </script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>