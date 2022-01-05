<?php
session_start();
$title = "Home | Perpustakaan Hakim";
require_once("./templates/header.php") ?>
<!-- Content body -->
<div class="content-body">
    <!-- Content -->
    <div class="content ">
        <div class="page-header d-md-flex justify-content-between">
            <div>
                <h3>Welcome back, <?php if (isset($_SESSION['username'])) echo $_SESSION['username'];
                                    else echo 'user' ?></h3>
                <p class="text-muted">This page shows an overview for your account summary.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title mb-2">Monthly Financial Status</h6>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-floating">
                                    <i class="ti-reload"></i>
                                </a>
                                <div class="dropdown">
                                    <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-more-alt"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="text-muted mb-4">Check how you're doing financially for current month</p>
                        <div id="sales"></div>
                        <div class="text-center mt-3">
                            <a href="#" class="btn btn-primary">
                                <i class="ti-download mr-2"></i> Create Report
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Buku</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-primary-bright text-primary rounded-pill">
                                                <i class="ti-cloud"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">0.16%</div>
                                </div>
                                <p class="mb-0"><a href="#" class="link-1">See comments</a> and respond to customers' comments.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">User</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-info-bright text-info rounded-pill">
                                                <i class="ti-map"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">12.87%</div>
                                </div>
                                <p class="mb-0"><a class="link-1" href="#">See visits</a> that had a higher than expected
                                    bounce rate.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Admin</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-secondary-bright text-secondary rounded-pill">
                                                <i class="ti-email"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">12.87%</div>
                                </div>
                                <p class="mb-0"><a class="link-1" href="#">See referring</a> domains that sent most visits
                                    last month.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title">Download</h6>
                                <div class="d-flex align-items-center mb-3">
                                    <div>
                                        <div class="avatar">
                                            <span class="avatar-title bg-warning-bright text-warning rounded-pill">
                                                <i class="ti-dashboard"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="font-weight-bold ml-1 font-size-30 ml-3">12.87%</div>
                                </div>
                                <p class="mb-0"><a class="link-1" href="#">See clients</a> that accepted your invitation to
                                    connect.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="row my-3">
                            <div class="col-md-6 ml-auto mr-auto">
                                <figure>
                                    <img class="img-fluid" src="assets/media/svg/upgrade.svg" alt="upgrade">
                                </figure>
                            </div>
                        </div>
                        <h4 class="mb-3 text-center">Get an Upgrade</h4>
                        <div class="row my-3">
                            <div class="col-md-10 ml-auto mr-auto">
                                <p class="text-muted">Get additional 500 GB space for your documents and files. Expand your storage and enjoy your business. Change plan for more space.</p>
                                <button class="btn btn-primary" data-dismiss="modal">Plan Upgrade</button>
                            </div>
                        </div>
                        <a href="#" class="align-items-center d-flex link-1 small justify-content-center" data-dismiss="modal">
                            <i class="ti-close font-size-10 mr-1"></i>Close
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ./ Content -->
    <?php require_once("./templates/footer.php") ?>