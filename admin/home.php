<?php
include 'partials/_dbconnection.php';
session_name("admin-login");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {
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
        <div id="spinner" class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
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
            include 'modals/accessDeniedModal.php';
            ?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-users fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Registered Users</p>
                                <h6 class="mb-0">
                                    <?php
                                    $userSql = "SELECT * FROM `users`";
                                    $userResult = mysqli_query($conn, $userSql);
                                    $userCount = mysqli_num_rows($userResult);
                                    $userFormattedCount = str_pad($userCount, 2, '0', STR_PAD_LEFT);
                                    echo $userFormattedCount;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Listings</p>
                                <h6 class="mb-0">
                                    <?php
                                    $listingSql = "SELECT * FROM `listings`";
                                    $listingResult = mysqli_query($conn, $listingSql);
                                    $listingCount = mysqli_num_rows($listingResult);
                                    $listingFormattedCount = str_pad($listingCount, 2, '0', STR_PAD_LEFT);
                                    echo $listingFormattedCount;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-blog fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Blogs</p>
                                <h6 class="mb-0">
                                    <?php
                                    $blogSql = "SELECT * FROM `blogs`";
                                    $blogResult = mysqli_query($conn, $blogSql);
                                    $blogCount = mysqli_num_rows($blogResult);
                                    $BlogFormattedCount = str_pad($blogCount, 2, '0', STR_PAD_LEFT);
                                    echo $BlogFormattedCount;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-comments fa-2x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Messages</p>
                                <h6 class="mb-0">
                                    <?php
                                    $messageSql = "SELECT * FROM `message`";
                                    $messageResult = mysqli_query($conn, $messageSql);
                                    $messageCount = mysqli_num_rows($messageResult);
                                    $messageFormattedCount = str_pad($messageCount, 2, '0', STR_PAD_LEFT);
                                    echo $messageFormattedCount;
                                    ?>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Listings</h6>
                        <a href="listing.php">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="col-12 table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Username</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    $admin = $_SESSION['username'];
                                    $sql = "SELECT * FROM `listings` ORDER BY `id` DESC LIMIT 5";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $timestamp = $row['add_time'];
                                            $date = new DateTime($timestamp);
                                            $formattedDate = $date->format('M. d, Y | h:i:s A');
                                    ?>
                                <tr>
                                    <td><?php if ($row['username'] == $admin) {
                                                                    echo strtoupper('Admin');
                                                                } else {
                                                                    echo strtoupper($row['username']);
                                                                }?></td>
                                    <td><?php echo strtoupper($row['listing_cat']); ?></td>
                                    <td><?php echo substr(strtoupper($row['name']),0,10).'...'; ?></td>
                                    <td><?php echo substr(strtoupper($row['desciption']),0,10).'...'; ?></td>
                                    <td><?php echo $formattedDate?></td>
                                    <td><?php echo strtoupper($row['status']); ?></td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h6 class="mb-0">New Blogs</h6>
                                <a href="blogs.php">Show All</a>
                            </div>
                            <?php
                                $sql = "SELECT * FROM `blogs` WHERE `status` = 'approved' ORDER BY `id` DESC LIMIT 3";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $timestamp = $row['add-time'];
                                        $date = new DateTime($timestamp);
                                        $formattedDate = $date->format('M. d, Y');
                            ?>
                            <div class="d-flex align-items-center border-bottom py-3">
                                <div class="w-100 ms-3">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-0"><?php echo substr(strtoupper($row['title']),0,20).'...'; ?></h6>
                                        <small><?php echo $formattedDate; ?></small>
                                    </div>
                                    <span><?php echo substr(strtoupper($row['content']),0,35).'...'; ?></span>
                                </div>
                            </div>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-xl-6">
                        <div class="h-100 bg-light rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Calender</h6>
                            </div>
                            <div id="calender"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Widgets End -->
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