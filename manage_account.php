<?php
session_name(name: "user-login");
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION == false) {
    header('location: index.php');
    exit;
}
session_write_close();
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
    <!-- Themify Icon -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body data-aos-easing="ease" data-aos-duration="400" data-aos-delay="0">
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Account?</h5>
                <button type="button" class="btn-close" style="box-shadow:none;" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure, you want to delete your account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="box-shadow: none;">Cancel</button>
                    <a id="deleteButton" class="btn btn-primary" type="button" href="#">
                        <i class="fa fa-trash me-1"></i> Delete</a>
            </div>
        </div>
    </div>
</div>
    <?php
    include 'partials/_nav.php'
    ?>
    <!-- SLIDER -->
    <section id="acc" class="d-flex align-items-center">
        <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-lg-12 pb-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h1 class="text-center">Manage Profile<i class="fas fa-user-cog ms-2" style="color: #ff414d;"></i></h1>
                            <div class="col-12">
                                <?php
                                if (isset($_GET['updated'])) {
                                    echo '
                                        <div class="alert alert-success alert-dismissible fade show w-100 " role="alert"
                                                    style="font-size:12px;">
                                                    <strong>Updated successfully!</strong> Account has been Updated successfully.
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                                    </div>';
                                }
                                if (isset($_GET['showUsernameError'])) {
                                    echo '  <div class="alert alert-warning alert-dismissible fade show w-100 " role="alert"
                                                style="font-size:12px;">
                                                <strong>Alert!</strong> Account has been updated, but the username remains the same because it is not available.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                                </div>';
                                }
                                if (isset($_GET['updateFailed'])) {
                                    echo '  <div class="alert alert-warning alert-dismissible fade show w-100 " role="alert"
                                                style="font-size:12px;">
                                                <strong>Update failed!</strong> Update failed, something wrong please try again later.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="box-shadow:none;"></button>
                                                </div>';
                                }
                                ?>
                                <div class="form-box rounded h-100 p-5">
                                    <div class="testimonial-item text-center">
                                        <?php
                                        if (isset($_SESSION['id'])) {
                                            $id = $_SESSION['id'];
                                            $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            $row = mysqli_fetch_assoc($result);
                                        }
                                        ?>
                                        <p class="mb-0">
                                            <strong style="color: #ff414d;">Username:</strong> <?php echo $row['username']; ?>
                                        </p>
                                        <p class="mb-0">
                                            <strong style="color: #ff414d;">Email:</strong> <?php echo $row['email']; ?>
                                        </p>
                                        <p class="mb-0">
                                            <strong style="color: #ff414d;">Password:</strong> <?php echo str_repeat('*', strlen($row['password'])); ?>
                                        </p>
                                        <p class="mt-3 mb-0">
                                            <a href="edit_account.php?id=<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-user-edit" aria-hidden="true"></i>
                                                    Edit Account
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-primary mt-2 mt-lg-0" data-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#deleteUser">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                Delete Account
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
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

        $('#deleteUser').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var userId = button.data('id'); // Extract the blog ID

            // Update the modal's delete button href with the blog ID
            var modal = $(this);
            modal.find('#deleteButton').attr('href', 'partials/_deleteUser.php?userId=' + userId);
        });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>