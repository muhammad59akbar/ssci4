<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/dashboard.css" />
</head>

<body>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container-fluid">
            <!-- triggered sidebar -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
            </button>
            <!-- end triggered sidebar -->
            <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">mdproadmin</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar" aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="topNavBar">

                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-2">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="me-2 d-lg-inline text-gray-600"></span>
                            <img src="" width="40px" height="40px" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="">Profile</a></li>
                            <li><a class="dropdown-item" href="">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('/corpecpro/logout') ?>">Logout</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- top navigation bar -->


    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar" style="background-color:#0C395F;">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase p-3">
                            CORE
                        </div>
                    </li>
                    <li>
                        <a href="" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                            <span class="ms-1">Dashboard</span>
                        </a>
                    </li>
                    <li class="my-2">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Interface
                        </div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#post">
                            <span class="me-2"><i class="bi bi-layout-split"></i></span>
                            <span class="ms-2">Post</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="post">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-pencil-square"></i>
                                            <span class="ms-2">Write Post</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-sticky"></i>
                                            <span class="ms-2">View Post</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="my-2">
                        <hr class="dropdown-divider bg-light" />
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                            Addons
                        </div>
                    </li>
                    <li>
                        <a href="" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-person-lines-fill"></i>
                                <span class="ms-2">Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?= site_url('/corpecpro/logout') ?>" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-box-arrow-right"></i>
                                <span class="ms-2">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- offcanvas -->

    <?= $this->renderSection('content'); ?>


    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/js/script.js"></script>
</body>

</html>