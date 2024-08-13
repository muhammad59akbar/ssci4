<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>

<main class="mt-5 pt-4">

    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <div class="col-md-12">

                <h1 class="mt-2 pt-2">Absensi</h1>
                <hr>
                <?php if (in_array($userGroup, ['Admin', 'Mandor', 'Teknisi'])) : ?>
                    <a href="<?= base_url('MyCorp/attendance/create') ?>" class="btn btn-primary my-2"><i class="bi bi-plus"></i>
                        Absen</a>
                <?php endif; ?>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($attendances)) : ?>
                    <table id="myTable" class="table table-bordered mt-2">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Kantor</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Lokasi</th>
                                <th>Status</th>
                                <th>Potongan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($attendances as $attendance) :
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $attendance->company_name ?></td>
                                    <td><?= $attendance->fullname ?></td>
                                    <td>
                                        <?php
                                        if ($attendance->photo) {
                                        ?>
                                            <img src="<?= base_url('assets/images/absen/' . $attendance->photo) ?>" alt="photo" width="50">
                                        <?php
                                        } else {
                                        ?>
                                            -
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?= $attendance->location ?></td>
                                    <td><?= $attendance->status ?></td>
                                    <!-- <td><?= $attendance->status != 'Tidak Masuk' ? $attendance->created_at : '-' ?></td> -->
                                    <td><?= $attendance->deduction == 0 ? '-' : formatRupiah($attendance->deduction) ?></td>
                                    <td><?= $attendance->created_at ?></td>
                                    <!-- <td><?= $attendance->entry_time ?? $attendance->exit_time ?></td> -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <p class="mt-4">Tidak ada data absensi.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<?= $this->endSection(); ?>