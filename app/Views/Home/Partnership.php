<?= $this->extend('layout/UserTemplate'); ?>

<?= $this->section('content'); ?>


<div class="padding-custome">
    <div class="pt-2 mt-3" style="background-color: #DFDFDF;">
        <div class="py-4 bg-body-secondary">

            <div class="container">
                <div class="d-flex flex-column  align-items-center align-items-md-start text-center ">
                    <span>Partnership</span>
                    <h1>PT. Corpec Inspeksi Utama</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="text-center">
            <img src="<?= base_url('assets/images/corpecpart.png') ?>" alt="Corpec Inspeksi Utama" style="width:100%" />
        </div>
        <p class="text-center">Whether it is official distributor or factory partnership, we
            welcome new business opportunities. Please do not hesitate
            to contact us through the available contact.
        </p>

        <div class="row mb-3">
            <div class="col">
                <div class="d-flex flex-wrap justify-content-center g-2">
                    <?php foreach ($partners as $p) : ?>
                        <div class="col-4 col-md-2">
                            <img src="<?= base_url('assets/images/partners') ?>/<?= $p['imagepartner'] ?>" alt="x" width="150" height="80">
                        </div>
                    <?php endforeach ?>



                </div>
            </div>
        </div>
    </div>


</div>




<?= $this->endSection(); ?>