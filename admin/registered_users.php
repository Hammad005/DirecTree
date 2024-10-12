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
        include 'modals/deleteUserModal.php';
        ?>


        <!-- Content Start -->
        <div class="content">
            <?php
            include 'partials/_nav.php';
            include 'isset/userIsset.php';
            ?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <h3><i class="fas fa-users me-2"></i>Registered Users</h3>
                <small class="note"><b>Note:</b> For security reasons, user passwords are not visible or accessible in
                    the admin panel. All passwords are securely stored using encryption, ensuring they remain
                    protected.
                </small>
                <div class="row g-4 pt-2">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Registered Users
                                <a href="add_user.php" class="d-flex justify-content-end" style="margin-top: -20px;">
                                    <button class="add-btn" type="button">
                                        <i class="fa fa-user-plus"></i> Add User</button>
                                </a>
                            </h6>
                            <div class="table-responsive">
                                <table class="table container text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Add Time</th>
                                            <th scope="col">Delete User</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $sql = "SELECT * FROM `users` ORDER BY `id` DESC";
                                    $result = mysqli_query($conn, $sql);
                                    $count = 1;
                                    $num = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $timestamp = $row['add-time'];
                                        $date = new DateTime($timestamp);
                                        $formattedDate = $date->format('M. d, Y h:i:s A');
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php if ($count <= 3) {
                                                        echo $row['username'] .
                                                            '<small style="color:#ff414d;"> | New</small>';
                                                    } else {
                                                        echo $row['username'];
                                                    } ?></td>
                                                <?php $num++;  ?>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $formattedDate; ?></td>

                                                <td><button class="add-btn" type="button"data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUser">
                                                            <i class="fa fa-trash me-1"></i> Delete</button></td>
                                            </tr>
                                        </tbody>
                                    <?php
                                        $count++;
                                    };
                                    ?>
                                </table>
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
    <script>
    $('#deleteUser').on('show.bs.modal', function (event) {
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