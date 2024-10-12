<!--============================= HEADER =============================-->
<?php
include '_dbconnection.php';
session_name(name: "user-login");
session_start();
?>
<div class="nav-menu">
    <div class="bg transition">
        <div class="container-fluid fixed ">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="index.php #slider">
                            <img src="images/logo/logo.png" alt="logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="icon-menu"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php #slider">Home</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="index.php #about">About</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="listing.php #listing-hero">Listings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="blog.php #blogs-hero">Blogs</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="contact.php #contact-hero">Contact</a>
                                </li>

                                <?php
                                if (!isset($_SESSION['loggedin']) || $_SESSION == false) {
                                    echo '
                                            <li><a href="sign-in/sign-in.php" class="btn btn-outline-light top-btn ">
                                        <span class="ti-user pe-2"></span>Sign In</a></li>
                                            ';
                                } else {
                                    echo '
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Account
                                            <span class="icon-arrow-down"></span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <a class="dropdown-item" href="manage_account.php">Manage Account</a>
                                            <a class="dropdown-item" href="partials/_logout.php">Sign Out</a>
                                        </div>
                                    </li>
                                    <li><a href="add_listing.php" class="btn btn-outline-light top-btn"><span class="ti-plus"></span>
                                            Add Listing</a></li>
                                    ';
                                }
                                ?>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//END HEADER -->