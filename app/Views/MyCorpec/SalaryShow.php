<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <h2 class="mt-4 m-2">Detail Gaji</h2>

                <div class="mb-3 mt-4">
                    <label for="user_name" class="form-label mx-2">Nama Karyawan</label>
                    <input type="text" id="user_name" class="form-control mx-2" value="<?= $user->fullname ?>" readonly>
                </div>
                <div class="mb-3 mt-4">
                    <label for="user_name" class="form-label mx-2">rekening</label>
                    <input type="text" id="user_name" class="form-control mx-2" value="<?= $user->rek_karyawan ?>" readonly>
                </div>
                <div class="mb-3 mt-4">
                    <label for="total_salary" class="form-label mx-2">Total Gaji</label>
                    <input type="text" id="total_salary" class="form-control mx-2" value="<?= formatRupiah($salary['total_salary']) ?>" readonly>
                </div>
                <div class="mb-3 mt-4">
                    <label for="deductions" class="form-label mx-2">Total Potongan</label>
                    <input type="text" id="deductions" class="form-control mx-2" value="<?= formatRupiah($salary['deduction']) ?>" readonly>
                </div>
                <div class="mb-3 mt-4">
                    <label for="transfer_photo" class="form-label mx-2">Bukti Transfer</label>
                    <div class="mt-2">
                        <img src="<?= base_url('assets/images/transfers/' . $salary['transfer_photo']) ?>" alt="Bukti Transfer" class="img-thumbnail" width="200">
                    </div>
                </div>
                <div class="mb-3 mt-4">
                    <label for="note" class="form-label mx-2">Catatan</label>
                    <textarea id="note" class="form-control mx-2" readonly><?= $salary['note'] ?></textarea>
                </div>
                <a href="<?= base_url('/MyCorp/salary') ?>" class="btn btn-primary mb-3">Kembali</a>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection(); ?>