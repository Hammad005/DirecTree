<?php
    if (isset($_GET['listingDeleted'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Deleted!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                listing deleted successfully.
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
    if (isset($_GET['listingRejected'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Rejected!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                The listing has been rejected for publication on the site..
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
    if (isset($_GET['listingExist'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Exist!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                This listing is already exist in this category.
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
    if (!isset($_GET['listingDeleted']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Delete failed!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                listing Delete failed, something wrong please try again later.
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
    if (!isset($_GET['listingRejected']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing rejection failed!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                listing rejection failed, something wrong please try again later.
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
    if (isset($_GET['listingAdded'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Added Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               New listing added successfully.
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
    if (!isset($_GET['listingAdded']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to add listing!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Unable to add listing post. Please try again.
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
    if (isset($_GET['listingUpdated'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Updated Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               listing post updated successfully.
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
    if (isset($_GET['listingApproved'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">listing Approved Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               The listing has been approved successfully.
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
    if (!isset($_GET['listingUpdated'])==false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to update listing!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Unable to update listing post. Please try again.
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
    if (!isset($_GET['listingApproved'])==false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to approved listing!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Unable to approved listing. Please try again.
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