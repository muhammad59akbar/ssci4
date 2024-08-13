<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">

                <h2 class="mt-4 m-2">Pengaturan Absen</h2>
                <hr>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success m-2" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <?php if (in_array($userGroup, ['Direktur', 'Admin'])) : ?>
                    <a href="<?= base_url('/MyCorp/presence/create') ?>" class="btn btn-primary mb-3">Tambah Presensi</a>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan / Kantor</th>
                            <th>Lokasi</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Akhir</th>
                            <?php if (in_array($userGroup, ['Direktur'])) : ?>
                                <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($presences as $presence) : ?>
                            <tr>
                                <td><?= $presence['company_name'] ?></td>
                                <td><?= $presence['location'] ?></td>
                                <td><?= $presence['start_time'] ?></td>
                                <td><?= $presence['end_time'] ?></td>
                                <td>
                                    <?php if (in_array($userGroup, ['Direktur'])) : ?>
                                        <a href="<?= base_url('/MyCorp/presence/' . $presence['id'] . '/edit') ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                        <form action="<?= base_url('/MyCorp/presence/' . $presence['id'] . '/delete') ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="bi bi-archive-fill"></i></button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>