<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <h2 class="mt-4 m-2">Edit User</h2>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <hr>
                <?= d($karyawan) ?>
                <a href="<?= base_url('MyCorpec/List_Karyawan') ?>" class="m-2">&laquo; kembali</a>
                <form action="/MyCorpec/edit_karyawan/<?= $karyawan->userid ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="id" value="<?= $karyawan->userid ?>">
                    <input type="hidden" name="fotolama" value="<?= $karyawan->image_karyawan ?>">
                    <input type="hidden" name="rektplama" value="<?= $karyawan->gmbr_rekktp ?>">

                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label mx-2">Email address</label>
                        <input type="email" class="form-control <?= isset($validationupdate['email']) ? 'is-invalid' : '' ?> mx-2" id="email" aria-describedby="emailHelp" name="email" autocomplete="on" value="<?= $karyawan->email ?>">
                        <?php if (isset($validationupdate['email'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($validationupdate['email']) ?></div>
                        <?php endif ?>
                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?php base_url() ?>/assets/images/karyawan/<?= $karyawan->image_karyawan; ?>" alt="<?= user()->username; ?>" src="" width="250" height="250" id="previmagekrywn">

                        </div>
                        <div class="col">
                            <label for="email" class="form-label mx-2">Foto Karyawan</label>
                            <input class="form-control  <?= isset($ValidNewKaryawan['foto_krywn']) ? 'is-invalid' : '' ?>" type="file" id="foto_krywn" name="foto_krywn" onchange="changeImg()">
                            <?php if (isset($ValidNewKaryawan['foto_krywn'])) : ?>
                                <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['foto_krywn']) ?></div>
                            <?php endif ?>
                        </div>

                    </div>
                    <div class="mb-3 mt-4">
                        <label for="namaLengkap" class="form-label mx-2">Nama Lengkap</label>
                        <input type="text" class="form-control mx-2  <?= isset($validationupdate['namaLengkap']) ? 'is-invalid' : '' ?>" id="namaLengkap" aria-describedby="namaLengkap" name="namaLengkap" autocomplete="on" value="<?= $karyawan->fullname; ?>">
                        <?php if (isset($validationupdate['namaLengkap'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($validationupdate['namaLengkap']) ?></div>
                        <?php endif ?>

                    </div>
                    <div class="row mb-2 p-2">
                        <div class="col">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control  <?= isset($validationupdate['username']) ? 'is-invalid' : '' ?>" id="username" name="username" aria-describedby="username" autocomplete="on" value="<?= $karyawan->username ?>">
                            <?php if (isset($validationupdate['username'])) : ?>
                                <div class="invalid-feedback"><?= ($validationupdate['username']) ?></div>
                            <?php endif ?>


                        </div>
                        <div class="col">
                            <label for="nik" class="form-label">NIK Karyawan</label>
                            <input type="text" class="form-control <?= isset($validationupdate['nik']) ? 'is-invalid' : '' ?>" id="nik" name="nik" aria-describedby="nik" value="<?= $karyawan->nik_krywn ?>">
                            <?php if (isset($validationupdate['nik'])) : ?>
                                <div class="invalid-feedback"><?= ($validationupdate['nik']) ?></div>
                            <?php endif ?>

                        </div>
                    </div>


                    <div class="row mb-2 p-2">
                        <div class="col ">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" class="form-control  <?= isset($validationupdate['usia']) ? 'is-invalid' : '' ?>" id="usia" name="usia" aria-describedby="usia" autocomplete="on" value="<?= $karyawan->usia_karyawan ?>">
                            <?php if (isset($validationupdate['usia'])) : ?>
                                <div class="invalid-feedback"><?= ($validationupdate['usia']) ?></div>
                            <?php endif ?>


                        </div>
                        <div class="col">
                            <label for="norekening" class="form-label">No Rekening</label>
                            <input type="text" class="form-control <?= isset($validationupdate['norekening']) ? 'is-invalid' : '' ?>" id="norekening" name="norekening" aria-describedby="norekening" value="<?= $karyawan->rek_karyawan ?>">
                            <?php if (isset($validationupdate['norekening'])) : ?>
                                <div class="invalid-feedback"><?= ($validationupdate['norekening']) ?></div>
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?php base_url() ?>/assets/images/rek/<?= $karyawan->gmbr_rekktp; ?>" alt="..." src="" width="250" height="250" id="prevrekktp">

                        </div>
                        <div class="col">
                            <label for="email" class="form-label mx-2">Foto Buku Rekening dan KTP</label>
                            <input class="form-control  <?= isset($ValidNewKaryawan['rekktp']) ? 'is-invalid' : '' ?>" type="file" id="rekktp" name="rekktp" onchange="changeImg()">
                            <?php if (isset($ValidNewKaryawan['rekktp'])) : ?>
                                <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['rekktp']) ?></div>
                            <?php endif ?>
                        </div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Jabatan</label>
                        <select class="form-select" aria-label="Default select example" name="jabatan">
                            <?php foreach ($jabatan as $j) : ?>
                                <option value="<?= $j->id ?>" <?= $karyawan->jabatan == $j->name ? 'selected' : '' ?>><?= $j->name ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>



                    <button type="submit" class="btn btn-primary mb-3">Save</button>
                </form>


            </div>






        </div>
    </div>

    </div>

    </div>
</main>

<?= $this->endSection(); ?>