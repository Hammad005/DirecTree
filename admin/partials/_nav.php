<!-- Navbar Start -->
<nav class="navbar navbar-expand px-2 py-0">

    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <div class="container d-flex justify-content-center">
        <a href="home.php" class="d-flex flex-column align-items-center text-center navbar-brand mx-5">
            <img src="logo/logo.png" width="80px" alt="logo" class="me-0">
            <h6 class="mb-0" style="font-size: 10px; margin-top:5px;">AdminPanel</h6>
        </a>
    </div>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown me-2">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Notifications</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0">
                <?php
                include '_dbconnection.php';
                $listingSqli = "SELECT * FROM `listings` where `status` = 'pending' ORDER BY `id` DESC limit 1";
                $listingResult = mysqli_query($conn, $listingSqli);
                if (mysqli_num_rows($listingResult) > 0) {
                    $listingRow = mysqli_fetch_assoc($listingResult);
                    $timestamp = $listingRow['add_time'];
                    $date = new DateTime($timestamp);
                    $formattedDate = $date->format('M. d, Y | h:i:s A');
                ?>
                    <a href="listing_req.php" class="dropdown-item">
                        <h6 class="fw-normal mb-0">New Listing Request By:</h6>
                        <small style="color:black;"><?php
                                                    echo substr($listingRow['username'], 0, 13); ?></small></small>
                        <br>
                        <small style="color:gray;"><?php
                                                    echo $formattedDate ?></small></small>
                    </a>
                    <hr>
                <?php
                }
                ?>

                <?php
                $blogSql = "SELECT * FROM `blogs` where `status` = 'pending' ORDER BY `id` DESC limit 1";
                $blogResult = mysqli_query($conn, $blogSql);
                if (mysqli_num_rows($blogResult) > 0) {
                    $blogRow = mysqli_fetch_assoc($blogResult);
                    $timestamp = $blogRow['add-time'];
                    $date = new DateTime($timestamp);
                    $formattedDate = $date->format('M. d, Y | h:i:s A');
                ?>
                    <a href="blog_req.php" class="dropdown-item">
                        <h6 class="fw-normal mb-0">New Blog Request By:</h6>
                        <small style="color:black;"><?php
                                                    echo substr($blogRow['username'], 0, 13); ?></small></small>
                        <br>
                        <small style="color:gray;"><?php
                                                    echo $formattedDate ?></small></small>
                    </a>
                    <hr>
                <?php
                }
                ?>

                <?php
                $messageSql = "SELECT * FROM `message` ORDER BY `id` DESC limit 1";
                $messageResult = mysqli_query($conn, $messageSql);
                if (mysqli_num_rows($messageResult) > 0) {
                    $messageRow = mysqli_fetch_assoc($messageResult);
                    $timestamp = $messageRow['add_time'];
                    $date = new DateTime($timestamp);
                    $formattedDate = $date->format('M. d, Y | h:i:s A');
                ?>
                    <a href="messages.php" class="dropdown-item">
                        <h6 class="fw-normal mb-0">New Message By:</h6>
                        <small style="color:black;"><?php
                                                    echo substr($messageRow['name'], 0, 13); ?></small></small>
                        <br>
                        <small style="color:gray;"><?php
                                                    echo $formattedDate ?></small></small>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->