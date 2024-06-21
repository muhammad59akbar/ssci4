<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <h2 class="mt-4 m-2">Add Karyawan</h2>

                <!-- empty($ValidNewKaryawan->getErrors()) ? $redirectedErrors : $validation->listErrors()  -->

                <a href="<?= base_url('MyCorpec/List_Karyawan') ?>" class="m-2">&laquo; Back</a>



                <form action="<?= base_url('/MyCorpec/Create') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-4">
                        <label for="email" class="form-label mx-2">Email address</label>
                        <input type="email" class="form-control mx-2 <?= isset($ValidNewKaryawan['email']) ? 'is-invalid' : '' ?>" id="email" aria-describedby="email" name="email" autocomplete="on" value="<?= old('email') ?>">
                        <?php if (isset($ValidNewKaryawan['email'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['email']) ?></div>
                        <?php endif ?>

                    </div>
                    <div class="mb-3 mt-4">
                        <label for="password" class="form-label mx-2">Password</label>
                        <input type="password" class="form-control mx-2 <?= isset($ValidNewKaryawan['password']) ? 'is-invalid' : '' ?>" id="password" aria-describedby="password" name="password" autocomplete="on" value="<?= old('password') ?>">
                        <?php if (isset($ValidNewKaryawan['password'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['password']) ?></div>
                        <?php endif ?>

                    </div>

                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="previmagekrywn">

                        </div>
                        <div class="col">
                            <label for="foto_krywn" class="form-label mx-2">Foto Karyawan</label>
                            <input class="form-control  <?= isset($ValidNewKaryawan['foto_krywn']) ? 'is-invalid' : '' ?>" type="file" id="foto_krywn" name="foto_krywn" onchange="changeImg()">
                            <?php if (isset($ValidNewKaryawan['foto_krywn'])) : ?>
                                <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['foto_krywn']) ?></div>
                            <?php endif ?>

                        </div>


                    </div>
                    <div class="mb-3 mt-4">
                        <label for="namaLengkap" class="form-label mx-2">Nama Lengkap</label>
                        <input type="text" class="form-control mx-2  <?= isset($ValidNewKaryawan['namaLengkap']) ? 'is-invalid' : '' ?>" id="namaLengkap" aria-describedby="namaLengkap" name="namaLengkap" autocomplete="on" value="<?= old('namaLengkap') ?>">
                        <?php if (isset($ValidNewKaryawan['namaLengkap'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['namaLengkap']) ?></div>
                        <?php endif ?>

                    </div>
                    <div class="row mb-2 p-2">
                        <div class="col">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control  <?= isset($ValidNewKaryawan['username']) ? 'is-invalid' : '' ?>" id="username" name="username" aria-describedby="username" autocomplete="on" value="<?= old('username') ?>">
                            <?php if (isset($ValidNewKaryawan['username'])) : ?>
                                <div class="invalid-feedback"><?= ($ValidNewKaryawan['username']) ?></div>
                            <?php endif ?>


                        </div>
                        <div class="col">
                            <label for="nik_karyawan" class="form-label">NIK Karyawan</label>
                            <input type="text" class="form-control <?= isset($ValidNewKaryawan['nik_karyawan']) ? 'is-invalid' : '' ?>" id="nik_karyawan" name="nik_karyawan" aria-describedby="nik_karyawan" value="<?= old('nik_karyawan') ?>">
                            <?php if (isset($ValidNewKaryawan['nik_karyawan'])) : ?>
                                <div class="invalid-feedback"><?= ($ValidNewKaryawan['nik_karyawan']) ?></div>
                            <?php endif ?>

                        </div>
                    </div>


                    <div class="row mb-2 p-2">
                        <div class="col ">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="text" class="form-control <?= isset($ValidNewKaryawan['usia']) ? 'is-invalid' : '' ?>" id="usia" name="usia" aria-describedby="usia" autocomplete="on" value="<?= old('usia') ?>">
                            <?php if (isset($ValidNewKaryawan['usia'])) : ?>
                                <div class="invalid-feedback"><?= ($ValidNewKaryawan['usia']) ?></div>
                            <?php endif ?>


                        </div>
                        <div class="col">
                            <label for="norekening" class="form-label">No Rekening</label>
                            <input type="text" class="form-control <?= isset($ValidNewKaryawan['norekening']) ? 'is-invalid' : '' ?>" id="norekening" name="norekening" aria-describedby="norekening" value="<?= old('norekening') ?>">
                            <?php if (isset($ValidNewKaryawan['norekening'])) : ?>
                                <div class="invalid-feedback"><?= ($ValidNewKaryawan['norekening']) ?></div>
                            <?php endif ?>

                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="..." width="250" height="250" id="prevrekktp">

                        </div>
                        <div class="col">
                            <label for="rekktp" class="form-label mx-2">Foto Buku Rekening dan KTP</label>
                            <input class="form-control <?= isset($ValidNewKaryawan['rekktp']) ? 'is-invalid' : '' ?>" type="file" id="rekktp" name="rekktp" onchange="changeImg()">
                            <?php if (isset($ValidNewKaryawan['rekktp'])) : ?>
                                <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['rekktp']) ?></div>
                            <?php endif ?>
                        </div>

                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Jabatan</label>
                        <select class="form-select" aria-label="Default select example" name="jabatan">
                            <option value="1">Direktur</option>
                            <option value="2">Admin</option>
                            <option value="3">Mandor</option>
                            <option value="4" selected>Teknisi</option>
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