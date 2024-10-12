<!-- Sidebar Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile Management Access</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <small><strong>Note:</strong>To manage your profile, please enter your username and password. This is to ensure the security of your account.</small>
                <form action="partials/_handleAccess.php" class="mt-3" method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="floatingInput"
                            placeholder="Enter Your Username" required>
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password"
                            required>
                        <label for="floatingPassword">Password</label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Authenticate</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="sidebar pe-4 pb-3">
    <nav class="navbar">
        <div class="navbar-nav w-100">
            <a href="#" class="sidebar-toggler flex-shrink-0 d-flex ml-auto  d-lg-none mt-2">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <a href="home.php" class="container d-flex align-items-center justify-content-center text-center navbar-brand mx-5 mt-3 mb-3">
            <img src="logo/logo.png" width="120px" alt="logo" class="me-0">
            <h6 class="mb-0" style="font-size: 13px; margin-top:5px;">AdminPanel</h6>
        </a>

        <div class="navbar-nav w-100">
            <form method="GET" action="searchResults.php" class="nav-item mb-3 ms-4">
                <input class="form-control border-0" name="search" type="search" placeholder="Search" required>
                <button class="btn btn-primary" style="width: 100%;" type="submit">Search</button>
            </form>
            <a href="home.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fas fa-user-shield me-2"></i>My Account</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="my_profile.php" class="dropdown-item "><i class="fas fa-user-shield me-2"></i>My Profile</a>
                    <button type="button" class="dropdown-item " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-user-cog me-2"></i>Manage Profile</button>
                    <a href="partials/_logout.php" class="dropdown-item "><i class="fa fa-sign-out-alt me-2"></i>Log Out</a>
                </div>
            </div>
            <a href="registered_users.php" class="nav-item nav-link"><i class="fas fa-users me-2"></i>Registered Users</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-chart-area me-2"></i>Listings</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="listing.php" class="dropdown-item"><i class="fas fa-address-book me-2"></i>All Listings</a>
                    <a href="add_listing.php" class="dropdown-item"><i class="fas fa-plus-circle me-2"></i> Add Listing</a>
                    <a href="listing_req.php" class="dropdown-item"><i class="fas fa-paper-plane me-2"></i> Listing Request</a>
                    <a href="listings-categories.php" class="dropdown-item"><i class="fas fa-th-list me-2"></i>Listings Categories</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-blog me-2"></i>Blogs</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="blogs.php" class="dropdown-item"><i class="fas fa-book-open me-2"></i>All Blogs</a> 
                    <a href="add_blog.php" class="dropdown-item"><i class="fas fa-plus-circle me-2"></i> Add Blog</a>
                    <a href="blog_req.php" class="dropdown-item"><i class="fas fa-envelope-open-text me-2"></i> Blog Requests</a>
                </div>
            </div>
            <a href="messages.php" class="nav-item nav-link"><i class="fas fa-comments me-2"></i>Messages</a>
            <a href="partials/_logout.php" class="nav-item nav-link"><i class="fa fa-sign-out-alt me-2"></i>Log out</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->