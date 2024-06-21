<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>



<main class="mt-5 pt-4">

    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <div class="col-md-12">

                <h1 class="mt-2 pt-2">List Karyawan</h1>
                <hr>
                <a href="<?= base_url('MyCorpec/Add_Karyawan') ?>" class="btn btn-primary my-2"><i class="bi bi-plus"></i> Karyawan</a>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <table class="table table-bordered mt-2">
                    <thead>
                        <tr class="text-center">
                            <th scope="row">No</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Email</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($karyawan as $k) : ?>

                            <tr class="text-center">
                                <td><?= $no++; ?></td>
                                <td><?= $k['username'] ?></td>
                                <td><?= $k['fullname'] ?></td>
                                <td><?= $k['email'] ?></td>
                                <td><?= $k['jabatan'] ?></td>
                                <td>
                                    <a href="<?= base_url('/MyCorpec') ?>/<?= $k['userid'] ?>/edit_karyawan" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>

                                    <form action="<?= base_url('/MyCorpec/' . $k['userid'] . '/DelKrywn') ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="bi bi-archive-fill"></i></button>
                                    </form>
                                    <!-- <a href="" class="btn btn-danger"><i class="bi bi-archive-fill"></i></a> -->
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</main>

<?= $this->endSection(); ?>