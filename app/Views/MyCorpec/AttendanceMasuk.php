<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>

<main class="mt-5 pt-4">

    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <div class="col-md-12">

                <h1 class="mt-2 pt-2">Data Absensi Kehadiran</h1>
                <hr>
                <?php if (!empty($attendances)): ?>
                    <table id="myTable" class="table table-bordered mt-2">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Kantor</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($attendances as $attendance):
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $attendance->company_name ?></td>
                                    <td><?= $attendance->fullname ?></td>
                                    <td><img src="<?= base_url('assets/images/absen/' . $attendance->photo) ?>" alt="photo"
                                            width="50"></td>
                                    <td><?= $attendance->location ?></td>
                                    <td><?= $attendance->created_at ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="mt-4">Tidak ada data absensi.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</main>

<?= $this->endSection(); ?>