<?= $this->extend('layout/UserTemplate'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="text-center">
        <h1 style="margin: 5px;">Featured Services</h1>
        <div class="line-feature"></div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-3 m-3">
            <div class=" text-center">
                <img src="<?= base_url('assets/images/ndtservice.webp') ?>" alt="" width="100" height="100">
                <div class="mt-1">
                    <h6 class="card-title">NDT Service</h6>
                    <span class="card-text">
                        Mendeteksi dan mengevaluasi cacat pada material untuk memastikan operasi yang aman, kontrol kualitas, dan penilaian umur pabrik.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 m-3">
            <div class=" text-center">
                <img src="<?= base_url('assets/images/garment.webp') ?>" alt="" width="100" height="100">
                <div class="mt-1">
                    <h6 class="card-title">Garment Inspection</h6>
                    <span class="card-text">Menyediakan Layanan untuk industri softlines dan aksesoris, memastikan kualitas dan keamanan produk sesuai regulasi dari permintaan pasar.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 m-3">
            <div class=" text-center">
                <img src="<?= base_url('assets/images/auditservice.webp') ?>" alt="" width="100" height="100">
                <div class="mt-1">
                    <h6 class="card-title">Audit Service</h6>
                    <span class="card-text">Memastikan produk Anda memenuhi standar internasional dan kebutuhan pasar dengan layanan audit dan pengujian terbaik.
                    </span>
                </div>
            </div>
        </div>


    </div>
</div>





<?= $this->endSection(); ?>