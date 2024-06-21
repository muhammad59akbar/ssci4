<?= $this->extend('layout/UserTemplate'); ?>



<?= $this->section('content'); ?>

<?= $this->include('Home/Corousel'); ?>

<div class="intro">
    <div class="container">
        <div class="row" style="margin-right: 0;">

            <div class="col-md-6 text-center">
                <img src="https://pbs.twimg.com/profile_images/985799194626506752/zs88CTIB_400x400.jpg" class="img-fluid" alt="Gambar">
            </div>
            <div class="col-md-6 intro-title">
                <h1>PT. Corpec Inspeksi Utama</h1>
                <h3>Certification, Inspection, Testing</h3>
                <p class="text-justify">
                    PT. Corpec Inspeksi Utama is a company established with the professional spirit. It is company objective to have wide range of the inspection service to satisfy the clients with excellent quality of work and professional resources. Developing mutual beneficial relationship and extensive network with professionals and business entities within area is our commitments in business.
                </p>
                <a href="#" class="btn btn-primary">View Profile</a>
            </div>
        </div>
    </div>

</div>


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
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Recent News</h2>
            <div class="line-news"></div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card m-2 shadow">
                <img src="https://corpec.co.id/wp-content/uploads/2021/04/advance-ndt-300x300-213x213.png" class="card-img-top" alt="Gambar 1">
                <div class="card-body">
                    <h5 class="card-title">Judul Card 1</h5>
                    <p class="card-text">Isi Card 1</p>
                    <p class="card-text"><small class="text-muted">11 April 2024</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-2 shadow">
                <img src="https://corpec.co.id/wp-content/uploads/2021/04/industrial-1-300x300-213x213.png" class="card-img-top" alt="Gambar 2">
                <div class="card-body">
                    <h5 class="card-title">Judul Card 2</h5>
                    <p class="card-text">Isi Card 2</p>
                    <p class="card-text"><small class="text-muted">Tanggal: 12 April 2024</small></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card m-2 shadow">
                <img src="https://corpec.co.id/wp-content/uploads/2021/04/audit-1-300x300-213x213.png" class="card-img-top" alt="Gambar 3">
                <div class="card-body">
                    <h5 class="card-title">Judul Card 3</h5>
                    <p class="card-text">Isi Card 3</p>
                    <p class="card-text"><small class="text-muted">Tanggal: 13 April 2024</small></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="text-center">
        <h3>Our Partner</h3>
        <div class="line-feature"></div>

        <p class="partner-corpec">Whether it is an official distributor or a corporate partnership, we welcome new business opportunities.</p>
        <p>Please contact us via the contact provided.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-wrap justify-content-center g-2">
                    <div class="col-4 col-md-2">
                        <img src="https://onesolution.pertamina.com/uploads/product/logo_pertamina-01_a881.jpg" alt="x" width="150" height="80">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>