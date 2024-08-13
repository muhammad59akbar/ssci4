<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4">
    <div class="container">
        <h2 class="mt-4">Data Gaji</h2>
        <hr>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <?php if (in_array($userGroup, ['Direktur'])) : ?>
            <a href="<?= base_url('MyCorp/salary/create') ?>" class="btn btn-primary my-2"><i class="bi bi-plus"></i>
                Gaji</a>
        <?php endif; ?>

        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Gaji</th>
                    <th>Potongan</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salaries as $salary) : ?>
                    <tr>
                        <td><?= $salary->fullname ?></td>
                        <td><?= formatRupiah($salary->total_salary) ?></td>
                        <td><?= $salary->deduction == 0 ? '-' : formatRupiah($salary->deduction) ?></td>
                        <td><?= $salary->transfer_date ?></td>
                        <td>
                            <a href="<?= base_url('/MyCorp/salary') ?>/<?= $salary->id ?>/detail" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                            <?php if (in_array($userGroup, ['Direktur'])) : ?>
                                <a href="<?= base_url('/MyCorp/salary') ?>/<?= $salary->id ?>/edit" class="btn btn-info"><i class="bi bi-pencil-square"></i></a>

                                <form action="<?= base_url('/MyCorp/salary/' . $salary->id . '/delete') ?>" method="post" class="d-inline">
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
</main>
<?= $this->endSection(); ?>