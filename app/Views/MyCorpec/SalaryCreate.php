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
                <h2 class="mt-4 m-2">Tambah Gaji</h2>



                <form action="<?= base_url('/MyCorp/salary/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-4">
                        <label for="user_id" class="form-label mx-2">Nama Karyawan</label>
                        <select name="user_id" id="user_id" class="select2 form-select mx-2 <?= isset($validate['user_id']) ? 'is-invalid' : '' ?>" onchange="calculateDeduction()">
                            <option value="" class="mx-2">Pilih Karyawan</option>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user->id ?>"><?= $user->fullname ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($validate['user_id'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['user_id'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3 mt-4">
                        <p class="form-label mx-2">Rekening Karyawan</p>
                        <div class="border rounded mx-2 p-2 ">
                            <span id="rek_karyawan" class="form-control-plaintext"></span>
                        </div>
                    </div>


                    <div class="mb-3 mt-4">
                        <label for="deductions" class="form-label mx-2">Total Potongan</label>
                        <input type="text" id="deductions" class="form-control mx-2" readonly>
                    </div>
                    <div class="mb-3 mt-4">
                        <label for="total_salary" class="form-label mx-2">Total Gaji</label>
                        <input type="text" name="total_salary" id="total_salary" class="form-control mx-2 <?= isset($validate['total_salary']) ? 'is-invalid' : '' ?>" value="<?= old('total_salary') ?>" readonly>
                        <?php if (isset($validate['total_salary'])) : ?>
                            <div class="invalid-feedback mx-2"><?= $validate['total_salary'] ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="..." width="250" height="250" id="prevtransfer">

                        </div>
                        <div class="col">
                            <label for="transfer_photo" class="form-label mx-2">Bukti Transfer</label>
                            <input type="file" name="transfer_photo" id="transfer_photo" onchange="changeImg()" class="form-control mx-2 <?= isset($validate['transfer_photo']) ? 'is-invalid' : '' ?>">
                            <?php if (isset($validate['transfer_photo'])) : ?>
                                <div class="invalid-feedback mx-2"><?= $validate['transfer_photo'] ?></div>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="mb-3 mt-4">
                        <label for="note" class="form-label mx-2">Catatan</label>
                        <textarea name="note" id="note" class="form-control mx-2"><?= old('note') ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function calculateDeduction() {
        const userId = document.getElementById('user_id').value;

        if (userId) {
            fetch(`<?= base_url('/MyCorp/salary/getSalaryAndDeduction') ?>/${userId}`)
                .then(response => response.json())
                .then(data => {
                    const rekKaryawanElement = document.getElementById('rek_karyawan');
                    rekKaryawanElement.innerText = data.rek_karyawan;
                    if (data.rek_karyawan) {
                        rekKaryawanElement.classList.remove('form-control-plaintext');
                    } else {
                        rekKaryawanElement.classList.add('form-control-plaintext');
                    }

                    document.getElementById('deductions').value = Math.abs(data.deduction);
                    document.getElementById('total_salary').value = data.total_salary - Math.abs(data.deduction);

                })
                .catch(error => console.error('Error:', error));
        } else {

            document.getElementById('deductions').value = '';
            document.getElementById('total_salary').value = '';
            document.getElementById('rek_karyawan').innerText = '';
            document.getElementById('rek_karyawan').classList.add('form-control-plaintext');

        }


    }
</script>

<?= $this->endSection(); ?>