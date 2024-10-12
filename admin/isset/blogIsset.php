<?php
    if (isset($_GET['blogDeleted'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog Deleted!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Blog deleted successfully.
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
    if (isset($_GET['blogRejected'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog Rejected!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                The blog has been rejected for publication on the site..
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
    if (!isset($_GET['blogDeleted']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog Delete failed!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Blog Delete failed, something wrong please try again later.
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
    if (!isset($_GET['blogRejected']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog rejection failed!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Blog rejection failed, something wrong please try again later.
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
    if (isset($_GET['blogAdded'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog Added Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               New blog post added successfully.
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
    if (!isset($_GET['blogAdded']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to add blog!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Unable to add blog post. Please try again.
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
    if (isset($_GET['blogUpdated'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog Updated Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Blog post updated successfully.
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
    if (isset($_GET['blogApproved'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Blog Approved Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Blog post approved successfully.
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
    if (!isset($_GET['blogUpdated'])==false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to update blog!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Unable to update blog post. Please try again.
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
    if (!isset($_GET['blogApproved'])==false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to approved blog!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Unable to approved blog post. Please try again.
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