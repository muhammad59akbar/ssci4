<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>



<main>
    <div class="container-fluid d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="row">
            <div class="col-md-12">
                <h4>Welcome Back </h4>
                <h1 class="text-center"><?= user()->username; ?></h1>
            </div>
        </div>

    </div>
</main>


<?= $this->endSection(); ?>