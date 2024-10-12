<?php
    if (isset($_GET['deleted'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Deleted!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                User deleted successfully.
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
    if (!isset($_GET['deleted']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Delete failed!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                User Delete failed, something wrong please try again later.
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
    if (isset($_GET['userAdded'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Added Successfully!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               New user added successfully.
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
    if (!isset($_GET['userAdded']) == false) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to add user!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Unable to add user. Please try again.
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
    if (isset($_GET['usernameTakken'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Failed to add user!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               Username is already taken. Please choose a different one.
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
    if (isset($_GET['passwordNotMatch'])) {
        echo '
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Passwords do not match!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Passwords do not match. Please re-enter your password.
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