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
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <h3><i class="fas fa-edit me-1"></i>Edit Listing</h3>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6>Manage Listing Details</h6>
                            <small class="note"><b>Note:</b> You cannot edit username while adding or editing a
                                listing.
                            </small>
                            <?php
                            if (isset($_GET['listingId'])) {
                                $id = $_GET['listingId'];
                                $sql = "SELECT * FROM `listings` WHERE `id` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                            }
                            ?>
                            <form action="partials/_updateListing.php?idnew= <?php echo $id; ?>" method="POST"
                                enctype="multipart/form-data" class="mt-4">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Listing Category:</label>
                                    <div class="container">
                                        <div class="row">
                                            <?php
                                            $sqlCat = "SELECT * FROM `categories`";
                                            $catResult = mysqli_query($conn, $sqlCat);
                                            if (mysqli_num_rows($catResult) > 0) {
                                                while ($cat = mysqli_fetch_assoc($catResult)) {
                                                    // Check if the current category matches the listing category
                                                    $isChecked = ($cat['name'] === $row['listing_cat']) ? 'checked' : '';
                                            ?>
                                                    <div class="col-md-4">
                                                        <input type="radio" name="listing_cat" id="form-radio-control-<?php echo $cat['id']; ?>"
                                                            class="form-radio-control" value="<?php echo $cat['name']; ?>" <?php echo $isChecked; ?> required>
                                                        <small><?php echo $cat['name']; ?></small>
                                                    </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Username</label>
                                    <input type="text" name="username" id="form-control" class="form-control"
                                        placeholder="Enter Userame" value="<?php echo $row['username']; ?>" required readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Listing Name</label>
                                    <input type="text" name="name" id="form-control" class="form-control"
                                        placeholder="Enter Listing Name" value="<?php echo $row['name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Desciption</label>
                                    <textarea name="desciption" class="form-control" id="desc" cols="30" rows="4"
                                        placeholder="Enter Listing Desciption..." required><?php echo $row['desciption']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Address</label>
                                    <textarea name="address" class="form-control" id="form-control"
                                        placeholder="Enter Listing Address..." required><?php echo $row['address']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Location</label>
                                    <div class="toastBtn text-end">
                                        <button type="button" class="btn btn-primary" id="liveToastBtn">
                                            <svg viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                                                <path d="M960 0c530.193 0 960 429.807 960 960s-429.807 960-960 960S0 1490.193 0 960 429.807 0 960 0Zm0 101.053c-474.384 0-858.947 384.563-858.947 858.947S485.616 1818.947 960 1818.947 1818.947 1434.384 1818.947 960 1434.384 101.053 960 101.053Zm-42.074 626.795c-85.075 39.632-157.432 107.975-229.844 207.898-10.327 14.249-10.744 22.907-.135 30.565 7.458 5.384 11.792 3.662 22.656-7.928 1.453-1.562 1.453-1.562 2.94-3.174 9.391-10.17 16.956-18.8 33.115-37.565 53.392-62.005 79.472-87.526 120.003-110.867 35.075-20.198 65.9 9.485 60.03 47.471-1.647 10.664-4.483 18.534-11.791 35.432-2.907 6.722-4.133 9.646-5.496 13.23-13.173 34.63-24.269 63.518-47.519 123.85l-1.112 2.886c-7.03 18.242-7.03 18.242-14.053 36.48-30.45 79.138-48.927 127.666-67.991 178.988l-1.118 3.008a10180.575 10180.575 0 0 0-10.189 27.469c-21.844 59.238-34.337 97.729-43.838 138.668-1.484 6.37-1.484 6.37-2.988 12.845-5.353 23.158-8.218 38.081-9.82 53.42-2.77 26.522-.543 48.24 7.792 66.493 9.432 20.655 29.697 35.43 52.819 38.786 38.518 5.592 75.683 5.194 107.515-2.048 17.914-4.073 35.638-9.405 53.03-15.942 50.352-18.932 98.861-48.472 145.846-87.52 41.11-34.26 80.008-76 120.788-127.872 3.555-4.492 3.555-4.492 7.098-8.976 12.318-15.707 18.352-25.908 20.605-36.683 2.45-11.698-7.439-23.554-15.343-19.587-3.907 1.96-7.993 6.018-14.22 13.872-4.454 5.715-6.875 8.77-9.298 11.514-9.671 10.95-19.883 22.157-30.947 33.998-18.241 19.513-36.775 38.608-63.656 65.789-13.69 13.844-30.908 25.947-49.42 35.046-29.63 14.559-56.358-3.792-53.148-36.635 2.118-21.681 7.37-44.096 15.224-65.767 17.156-47.367 31.183-85.659 62.216-170.048 13.459-36.6 19.27-52.41 26.528-72.201 21.518-58.652 38.696-105.868 55.04-151.425 20.19-56.275 31.596-98.224 36.877-141.543 3.987-32.673-5.103-63.922-25.834-85.405-22.986-23.816-55.68-34.787-96.399-34.305-45.053.535-97.607 15.256-145.963 37.783Zm308.381-388.422c-80.963-31.5-178.114 22.616-194.382 108.33-11.795 62.124 11.412 115.76 58.78 138.225 93.898 44.531 206.587-26.823 206.592-130.826.005-57.855-24.705-97.718-70.99-115.729Z" />
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                                        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <img src="../images/logo/favicon/favicon-32x32.png" height="20px" width="20px" class="me-2" alt="...">
                                                <strong class="me-auto">To add a location to your listing?</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">
                                                1. Go to Google Maps.
                                                <br>
                                                2. Search for your listing location.
                                                <br>
                                                3. Click on the “Share” button.
                                                <br>
                                                4. Select the “Embed a map” option.
                                                <br>
                                                5. Copy the provided iframe link.
                                                <br>
                                                6. Paste the iframe link here.
                                            </div>
                                        </div>
                                    </div>

                                    <textarea name="location" class="form-control" id="form-control" placeholder="Enter Listing location" required><?php echo $row['location']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Opening Timing</label>
                                    <input type="time" name="open_time" id="form-control" class="form-control"
                                        placeholder="Enter opening timing" value="<?php echo $row['open_time']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Closing Timing</label>
                                    <input type="time" name="close_time" id="form-control" class="form-control"
                                        placeholder="Enter closing timing" value="<?php echo $row['close_time']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Phone</label>
                                    <input type="number" name="phone" id="form-control" class="form-control"
                                        placeholder="Enter Listing Number (if any)" value="<?php echo $row['phone']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Website</label>
                                    <input type="text" name="website" id="form-control" class="form-control"
                                        placeholder="Enter Listing Website (if any)" value="<?php echo $row['website']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Current Picture:</label>
                                    <img src="listing/<?php echo $row['picture']; ?>" alt="Profile_Picture" width="150px" height="100px">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Update Picture</label>
                                    <input type="file" name="picture" id="form-control" class="form-control"
                                        placeholder="Enter Listing Picture">
                                </div>
                                <button type="submit" name="updateListing" class="btn btn-primary">Update</button>
                            </form>
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