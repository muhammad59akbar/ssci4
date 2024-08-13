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
                <h2 class="mt-4 m-2">Tambah Presensi</h2>
                <hr>

                <form action="<?= base_url('/MyCorp/presence/store') ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-4">
                        <label for="company_name" class="form-label mx-2">Nama Perusahaan</label>
                        <input type="text" name="company_name" id="company_name" class="form-control mx-2 <?= isset($validate['company_name']) ? 'is-invalid' : '' ?>" value="<?= old('company_name') ?>">
                        <?php if (isset($validate['company_name'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['company_name'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="location" class="form-label mx-2">Lokasi</label>
                        <input type="text" name="location" id="location" class="form-control mx-2 <?= isset($validate['location']) ? 'is-invalid' : '' ?>" value="<?= old('location') ?>">
                        <?php if (isset($validate['location'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['location'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="start_time" class="form-label mx-2">Jam Mulai</label>
                        <input type="time" name="start_time" id="start_time" class="form-control mx-2 <?= isset($validate['start_time']) ? 'is-invalid' : '' ?>" value="<?= old('start_time') ?>">
                        <?php if (isset($validate['start_time'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['start_time'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="max_start_time" class="form-label mx-2">Jam Tutup Absen</label>
                        <input type="time" name="max_start_time" id="max_start_time" class="form-control mx-2 <?= isset($validate['max_start_time']) ? 'is-invalid' : '' ?>" value="<?= old('max_start_time') ?>">
                        <?php if (isset($validate['max_start_time'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['max_start_time'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="end_time" class="form-label mx-2">Jam Pulang</label>
                        <input type="time" name="end_time" id="end_time" class="form-control mx-2 <?= isset($validate['end_time']) ? 'is-invalid' : '' ?>" value="<?= old('end_time') ?>">
                        <?php if (isset($validate['end_time'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['end_time'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="max_end_time" class="form-label mx-2">Jam Tutup Absen</label>
                        <input type="time" name="max_end_time" id="max_end_time" class="form-control mx-2 <?= isset($validate['max_end_time']) ? 'is-invalid' : '' ?>" value="<?= old('max_end_time') ?>">
                        <?php if (isset($validate['max_end_time'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['max_end_time'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="user_ids" class="form-label mx-2">Pilih Karyawan</label>
                        <select name="user_ids[]" id="user_ids" multiple class="select2 form-select mx-2 <?= isset($validate['user_ids']) ? 'is-invalid' : '' ?>">
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user->id ?>"><?= $user->fullname ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($validate['user_ids'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['user_ids'] ?></div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>