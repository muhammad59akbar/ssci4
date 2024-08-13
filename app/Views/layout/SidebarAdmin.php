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
                    <a href="<?= base_url('MyCorpec/Dashboard') ?>" class="nav-link px-3">
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
                    <?php if (in_array($userGroup, ['Direktur'])) : ?>
                        <a href="<?= base_url('MyCorpec/List_Karyawan') ?>" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span class="ms-1">User Settings</span>
                        </a>
                    <?php endif; ?>
                    <?php if (in_array($userGroup, ['Admin', 'Direktur'])) : ?>
                        <a href="<?= base_url('MyCorp/presence') ?>" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span class="ms-1">Presensi</span>
                        </a>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#post">
                            <span class="me-2"><i class="bi bi-layout-split"></i></span>
                            <span class="ms-2">News</span>
                            <span class="ms-auto">
                                <span class="right-icon">
                                    <i class="bi bi-chevron-down"></i>
                                </span>
                            </span>
                        </a>
                        <div class="collapse" id="post">
                            <ul class="navbar-nav ps-3">
                                <li>
                                    <a href="<?= base_url('CorpecBlog/Write_News') ?>" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-pencil-square"></i>
                                            <span class="ms-2">Write News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('CorpecBlog/ListBlog') ?>" class="nav-link px-3">
                                        <span class="me-2"><i class="bi bi-sticky"></i>
                                            <span class="ms-2">View News</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <a href="<?= base_url('CorpecBlog/Partnership') ?>" class="nav-link px-3">
                            <span class="me-2"><i class="bi bi-briefcase-fill"></i></span>
                            <span class="ms-1">Partnership</span>
                        </a>

                    <?php endif; ?>
                    <a href="<?= base_url('MyCorp/salary') ?>" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-people"></i></span>
                        <span class="ms-1">Gaji Karyawan</span>
                    </a>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#absensi">
                        <span class="me-2"><i class="bi bi-layout-split"></i></span>
                        <span class="ms-2">Data Absensi</span>
                        <span class="ms-auto">
                            <span class="right-icon">
                                <i class="bi bi-chevron-down"></i>
                            </span>
                        </span>
                    </a>
                    <div class="collapse" id="absensi">
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="<?= base_url('MyCorp/attendance') ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-camera"></i>
                                        <span class="ms-2">Absen</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('MyCorp/attendance/in') ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-sticky"></i>
                                        <span class="ms-2">Data Kehadiran</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('MyCorp/attendance/late') ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-sticky"></i>
                                        <span class="ms-2">Data Terlambat</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('MyCorp/attendance/alpha') ?>" class="nav-link px-3">
                                    <span class="me-2"><i class="bi bi-sticky"></i>
                                        <span class="ms-2">Data Tidak Masuk</span>
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
                    <a href="<?= base_url('/MyCorpec/Profile') ?>" class="nav-link px-3">
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