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
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/home.css" />
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light nav-custome">

        <div class="container-fluid d-flex flex-column nav-left">
            <div class="flex-row w-100 d-flex">

                <!-- Logo and Navbar Toggler -->
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand px-3 order-1 order-md-0" href="#">
                    <img src="https://corpec.co.id/wp-content/uploads/2021/04/logo-web-corpec-2.png" alt="Logo Corpec">
                </a>

                <!-- Address and Contact Details -->
                <div class="collapse navbar-collapse ms-auto justify-content-end">
                    <div class="d-flex align-items-center">

                        <!-- Address Container -->
                        <div class="address-container">
                            <div class="icon-container">
                                <i class="bi bi-geo-alt fs-3"></i>
                            </div>
                            <div class="details-container address-details">
                                <p class="m-0">Jl. Penjernihan Dalam No.46 <br> Pejompongan, Jakarta Pusat</p>
                            </div>
                        </div>

                        <!-- Contact Container -->
                        <div class="contact-container">
                            <div class="icon-container">
                                <i class="bi bi-person-lines-fill fs-3"></i>
                            </div>
                            <div class="details-container">
                                <p class="m-0">admin@corpec.co.id</p>
                                <p class="m-0">+62 5735821</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Company</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Service
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Engineering</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Industrial</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Consumer Goods</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Audit</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Corpec History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Vision Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Our Partner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





    <?= $this->renderSection('content'); ?>

    <footer class="bg-dark text-light">
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-3">
                    <h6>Judul Alamat 1</h6>
                    <p>Alamat 1, Kota, Negara</p>
                </div>
                <div class="col-md-3">
                    <h6>Judul Alamat 2</h6>
                    <p>Alamat 2, Kota, Negara</p>
                </div>
                <div class="col-md-3">
                    <h6>Judul Alamat 3</h6>
                    <p>Alamat 3, Kota, Negara</p>
                </div>
                <div class="col-md-3 m-0">
                    <small>Call Us </small>
                    <h5>+62 5735821</h5>
                    <p>Send and Email For Partnership <br>admin@corpec.co.id</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center py-2">
                    <p>&copy; 2024 Copyright <b>PT Corpec Inspeksi Utama</b>. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>







    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery-3.5.1.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets') ?>/js/script.js"></script>
</body>

</html>