<?php
            if (isset($_GET['accessDenied']) > 0) {
                echo '
                    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Access Denied!</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Incorrect username or password.
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