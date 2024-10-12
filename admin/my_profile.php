<?php
include 'partials/_dbconnection.php';

session_name("admin-login");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
    header('location: index.php');
    exit;
}

if (isset($_GET['destroySession'])) {
    session_write_close();
    session_name('access');
    session_start();
    unset($_SESSION['access-loggedin']);
    session_write_close();
    session_name("admin-login");
    session_start();
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
        ?>


        <!-- Content Start -->
        <div class="content">
            <?php
            include 'partials/_nav.php';
            ?>
            <?php
            if (isset($_GET['updated'])) {
                echo '
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Updated successfully!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Admin profile Updated successfully.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <script src="path/to/bootstrap.bundle.js"></script>
                        <script>
                            // Automatically open the modal when the page loads
                            window.onload = function() {
                                var myModal = new bootstrap.Modal(document.getElementById("myModal"));
                                myModal.show();
                            };
                        </script>
                        ';
            }

            if (isset($_GET['updateFaild'])) {
                echo '
                        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update failed!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Admin profile Update failed, something wrong please try again later.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <script src="path/to/bootstrap.bundle.js"></script>
                        <script>
                            // Automatically open the modal when the page loads
                            window.onload = function() {
                                var myModal = new bootstrap.Modal(document.getElementById("myModal"));
                                myModal.show();
                            };
                        </script>
                        ';
            }
            ?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <h3><i class="fas fa-user-shield me-2"></i>My Profile</h3>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-5" style="min-height: 100%;">

                            <div class="testimonial-item text-center">
                                <?php
                                if (isset($_SESSION['id'])) {
                                    $id = $_SESSION['id'];
                                    $sql = "SELECT * FROM `adminlogin` WHERE `id` = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    $timestamp = $row['add_time'];
                                    $date = new DateTime($timestamp);
                                    $formattedDate = $date->format('M. d, Y h:i:s A');
                                }
                                ?>
                                <img class="img-fluid rounded-circle mx-auto mb-4" src="img/<?php echo $row['profile_pic']; ?>" style="width: 100px; height: 100px;">
                                <h5 class="mb-1">
                                    <?php echo $row['username']; ?>
                                </h5>
                                <p>Admin</p>
                                <p class="mb-0">
                                    <strong style="color: #ff414d;">Email:</strong> <?php echo $row['email']; ?>
                                </p>
                                <p class="mb-0">
                                    <strong style="color: #ff414d;">Location:</strong> <?php echo $row['location']; ?>
                                </p>
                                <p class="mb-0">
                                    <strong style="color: #ff414d;">Joined:</strong> <?php echo $formattedDate; ?>
                                </p>
                                <p class="mb-0">
                                    <strong style="color: #ff414d;">Password:</strong> <?php echo str_repeat('*', strlen($row['password'])); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>