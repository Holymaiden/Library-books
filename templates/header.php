<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?></title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/media/image/favicon.png" />

        <!-- Main css -->
        <link rel="stylesheet" href="vendors/bundle.css" type="text/css">

        <!-- Google font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Daterangepicker -->
        <link rel="stylesheet" href="vendors/datepicker/daterangepicker.css" type="text/css">

        <!-- DataTable -->
        <link rel="stylesheet" href="vendors/dataTable/datatables.min.css" type="text/css">

        <!-- App css -->
        <link rel="stylesheet" href="assets/css/app.min.css" type="text/css">

        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="horizontal-navigation">
        <!-- Preloader -->
        <div class="preloader">
                <div class="preloader-icon"></div>
                <span>Loading...</span>
        </div>
        <!-- ./ Preloader -->

        <!-- Sidebar group -->
        <div class="sidebar-group">

        </div>
        <!-- ./ Sidebar group -->

        <!-- Layout wrapper -->
        <div class="layout-wrapper">

                <!-- Header -->
                <div class="header d-print-none">
                        <div class="header-container">
                                <div class="header-left">
                                        <div class="navigation-toggler">
                                                <a href="#" data-action="navigation-toggler">
                                                        <i data-feather="menu"></i>
                                                </a>
                                        </div>

                                        <div class="header-logo">
                                                <a href=index.php>
                                                        <img class="logo" src="assets/media/image/logo.png" alt="logo">
                                                </a>
                                        </div>
                                </div>

                                <div class="header-body">
                                        <div class="header-body-left">
                                                <ul class="navbar-nav">
                                                        <li class="nav-item mr-3">
                                                                <div class="header-search-form">
                                                                        <form>
                                                                                <div class="input-group">
                                                                                        <div class="input-group-prepend">
                                                                                                <button class="btn">
                                                                                                        <i data-feather="search"></i>
                                                                                                </button>
                                                                                        </div>
                                                                                        <input type="text" class="form-control" placeholder="Search">
                                                                                        <div class="input-group-append">
                                                                                                <button class="btn header-search-close-btn">
                                                                                                        <i data-feather="x"></i>
                                                                                                </button>
                                                                                        </div>
                                                                                </div>
                                                                        </form>
                                                                </div>
                                                        </li>
                                                </ul>
                                        </div>

                                        <div class="header-body-right">
                                                <ul class="navbar-nav">
                                                        <li class="nav-item">
                                                                <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                                                                        <i data-feather="search"></i>
                                                                </a>
                                                        </li>

                                                        <li class="nav-item dropdown d-none d-md-block">
                                                                <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                                                        <i class="maximize" data-feather="maximize"></i>
                                                                        <i class="minimize" data-feather="minimize"></i>
                                                                </a>

                                                        </li>
                                                        <?php
                                                        if (isset($_SESSION['username'])) { ?>
                                                                <li class="nav-item dropdown">
                                                                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                                                                <figure class="avatar avatar-sm">
                                                                                        <img src="assets/media/image/user/man_avatar3.jpg" class="rounded-circle" alt="avatar">
                                                                                </figure>
                                                                                <span class="ml-2 d-sm-inline d-none"><?= $_SESSION['username'] ?></span>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                                                                <div class="text-center py-4">
                                                                                        <figure class="avatar avatar-lg mb-3 border-0">
                                                                                                <img src="assets/media/image/user/man_avatar3.jpg" class="rounded-circle" alt="image">
                                                                                        </figure>
                                                                                        <h5 class="text-center"><?= $_SESSION['username'] ?></h5>
                                                                                        <div class="mb-3 small text-center text-muted">@<?= $_SESSION['username'] ?></div>
                                                                                        <a href="#" class="btn btn-outline-light btn-rounded">Manage Your Account</a>
                                                                                </div>
                                                                                <div class="list-group">
                                                                                        <a href="settings.php" class="list-group-item">View Profile</a>
                                                                                        <a href="logout.php" class="list-group-item text-danger">Sign Out!</a>

                                                                                </div>
                                                                        </div>
                                                                </li>
                                                        <?php } else { ?>
                                                                <a href="login.php" class="list-group-item text-primary">Login</a>
                                                        <?php } ?>
                                                </ul>
                                        </div>
                                </div>

                                <ul class="navbar-nav ml-auto">
                                        <li class="nav-item header-toggler">
                                                <a href="#" class="nav-link">
                                                        <i data-feather="arrow-down"></i>
                                                </a>
                                        </li>
                                </ul>
                        </div>
                </div>
                <!-- ./ Header -->
                <!-- Content wrapper -->
                <div class="content-wrapper">
                        <!-- begin::navigation -->
                        <div class="navigation">
                                <div class="navigation-header">
                                        <span>Navigation</span>
                                        <a href="#">
                                                <i class="ti-close"></i>
                                        </a>
                                </div>
                                <div class="navigation-menu-body">
                                        <ul>
                                                <li>
                                                        <a class="active" href=index.php>
                                                                <span class="nav-link-icon">
                                                                        <i data-feather="pie-chart"></i>
                                                                </span>
                                                                <span>Dashboard</span>
                                                        </a>
                                                </li>
                                                <li>
                                                        <a href="books.php">
                                                                <span class="nav-link-icon">
                                                                        <i data-feather="shopping-cart"></i>
                                                                </span>
                                                                <span>Books</span>
                                                        </a>
                                                </li>
                                                <li>
                                                        <a href="#">
                                                                <span class="nav-link-icon">
                                                                        <i data-feather="edit-3"></i>
                                                                </span>
                                                                <span>Forms</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <a href="basic-forms.html">Basic Forms</a>
                                                                </li>
                                                                <li>
                                                                        <a href="custom-forms.html">Custom Forms</a>
                                                                </li>
                                                                <li>
                                                                        <a href="advanced-forms.html">Advanced Forms</a>
                                                                </li>
                                                                <li>
                                                                        <a href="form-validation.html">Form Validation</a>
                                                                </li>
                                                                <li>
                                                                        <a href="form-wizard.html">Form Wizard</a>
                                                                </li>

                                                                <li>
                                                                        <a href="form-repeater.html">Form Repeater</a>
                                                                </li>
                                                                <li>
                                                                        <a href="file-upload.html">File Upload</a>
                                                                </li>
                                                                <li>
                                                                        <a href="ckeditor.html">CKEditor</a>
                                                                </li>
                                                                <li>
                                                                        <a href="datepicker.html">Datepicker</a>
                                                                </li>
                                                                <li>
                                                                        <a href="timepicker.html">Timepicker</a>
                                                                </li>
                                                                <li>
                                                                        <a href="colorpicker.html">Colorpicker</a>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="#">
                                                                <span class="nav-link-icon">
                                                                        <i data-feather="layers"></i>
                                                                </span>
                                                                <span>Components</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <a href="#">Elements</a>
                                                                        <ul>
                                                                                <li>
                                                                                        <a href="alert.html">Alerts</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="accordion.html">Accordion</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="buttons.html">Buttons</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="dropdown.html">Dropdown</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="list-group.html">List Group</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="pagination.html">Pagination</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="typography.html">Typography</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="media-object.html">Media Object</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="progress.html">Progress</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="modal.html">Modal</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="spinners.html">Spinners</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="navs.html">Navs</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="tab.html">Tab</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="tooltip.html">Tooltip</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="popovers.html">Popovers</a>
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <a href="#">Cards</a>
                                                                        <ul>
                                                                                <li>
                                                                                        <a href="basic-cards.html">Basic Cards </a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="image-cards.html">Image Cards </a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="scroll-cards.html">Scroll Cards </a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="other-cards.html">Others Cards</a>
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <a href="#">Tables</a>
                                                                        <ul>
                                                                                <li>
                                                                                        <a href="basic-tables.html">Basic Tables</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="dataTable.html">Datatable</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="responsive-tables.html">Responsive Tables</a>
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <a href="#">Charts</a>
                                                                        <ul>
                                                                                <li>
                                                                                        <a href="apexchart.html">Apex Chart</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="chartjs.html">Chartjs</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="justgage.html">Justgage</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="morsis.html">Morsis</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="peity.html">Peity</a>
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <a href="#">Maps</a>
                                                                        <ul>
                                                                                <li>
                                                                                        <a href="google-map.html">Google Map</a>
                                                                                </li>
                                                                                <li>
                                                                                        <a href="vector-map.html">Vector Map</a>
                                                                                </li>
                                                                        </ul>
                                                                </li>
                                                                <li>
                                                                        <a href="avatar.html">
                                                                                Avatar
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="icons.html">
                                                                                Icons
                                                                        </a>
                                                                </li>
                                                                <li>
                                                                        <a href="colors.html">
                                                                                Colors
                                                                        </a>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <li>
                                                        <a href="#">
                                                                <span class="nav-link-icon">
                                                                        <i data-feather="gift"></i>
                                                                </span>
                                                                <span>Plugins</span>
                                                        </a>
                                                        <ul>
                                                                <li>
                                                                        <a href="sweet-alert.html">Sweet Alert</a>
                                                                </li>
                                                                <li>
                                                                        <a href="lightbox.html">Lightbox</a>
                                                                </li>
                                                                <li>
                                                                        <a href="toast.html">Toast</a>
                                                                </li>
                                                                <li>
                                                                        <a href="tour.html">Tour</a>
                                                                </li>
                                                                <li>
                                                                        <a href="slick-slide.html">Slick Slide</a>
                                                                </li>
                                                                <li>
                                                                        <a href="nestable.html">Nestable</a>
                                                                </li>
                                                        </ul>
                                                </li>
                                                <?php if (isset($_SESSION['l']))
                                                        if ($_SESSION['l'] == 1) { ?>
                                                        <li>
                                                                <a href="#">
                                                                        <span class="nav-link-icon">
                                                                                <i data-feather="copy"></i>
                                                                        </span>
                                                                        <span>Admin</span>
                                                                </a>
                                                                <ul>
                                                                        <li>
                                                                                <a href="admins.php">Admins</a>
                                                                        </li>
                                                                        <li>
                                                                                <a href="users.php">Users</a>
                                                                        </li>
                                                                </ul>
                                                        </li>
                                                <?php } ?>
                                        </ul>
                                </div>
                        </div>
                        <!-- end::navigation -->