<?= $this->extend('layout/UserTemplate'); ?>



<?= $this->section('content'); ?>

<?= $this->include('Home/Corousel'); ?>


<div class="intro">
    <div class="container">
        <div class="row" style="margin-right: 0;">

            <div class="col-md-6 text-center">
                <img src="<?= base_url('assets/images/corpecLogo.jpg') ?>" class="img-fluid" alt="Corpec Inspeksi Utama">
            </div>
            <div class="col-md-6 intro-title">
                <h1>PT. Corpec Inspeksi Utama </h1>
                <h3>Certification, Inspection, Testing</h3>
                <p class="text-justify">
                    PT. Corpec Inspeksi Utama is a company established with the professional spirit. It is company objective to have wide range of the inspection service to satisfy the clients with excellent quality of work and professional resources. Developing mutual beneficial relationship and extensive network with professionals and business entities within area is our commitments in business.
                </p>
                <a href="<?= base_url('/profile') ?>" class="btn btn-primary">View Profile</a>
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
                        Detecting and evaluating defects in materials to ensure safe operations, quality control, and assessment of plant lifespan.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 m-3">
            <div class=" text-center">
                <img src="<?= base_url('assets/images/garment.webp') ?>" alt="" width="100" height="100">
                <div class="mt-1">
                    <h6 class="card-title">Garment Inspection</h6>
                    <span class="card-text">Providing services for the softlines and accessories industry, ensuring product quality and safety in accordance with market demand regulations.</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 m-3">
            <div class=" text-center">
                <img src="<?= base_url('assets/images/auditservice.webp') ?>" alt="" width="100" height="100">
                <div class="mt-1">
                    <h6 class="card-title">Audit Service</h6>
                    <span class="card-text">Ensuring your products meet international standards and market requirements with the best audit and testing services.
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
        <?php foreach ($news as $n) :  ?>
            <?php

            preg_match_all('/<p>(.*?)<\/p>/is', $n['news_description'], $matches);
            $text = implode(' ', $matches[1]);
            $text = htmlspecialchars_decode(strip_tags($text));
            $words = explode(' ', $text);
            $truncatedDescription = implode(' ', array_slice($words, 0, 10));
            if (count($words) > 4) {
                $truncatedDescription .= '... <a href="' . $n['url_news'] . '/detail">read more</a>';
            }
            ?>



            <div class="col-md-4 mt-2">
                <div class="card  shadow w-100 h-100">
                    <img src="<?= base_url('assets/images/news') ?>/<?= $n['image_news'] ?>" class="card-img-top" alt="PT Corpec Inspeksi Utama | <?= $n['news_title'] ?>" style="height:250px; ">
                    <div class="card-body">
                        <h5 class="card-title"><?= mb_strimwidth($n['news_title'], 0, 36, ''); ?></h5>
                        <p class="card-text"><?= $truncatedDescription ?></p>
                        <p class="card-text"><small class="text-muted"><?= $n['created_at']; ?></small></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<div class="container mt-5">
    <div class="text-center">
        <h3>Our Partner</h3>
        <div class="line-feature"></div>

        <p class="partner-corpec">Whether it is an official distributor or a corporate partnership, we welcome new business opportunities.</p>
        <p>Please contact us via the contact provided.</p>
    </div>

    <div class="container mb-4">
        <div class="row">
            <div class="col">
                <div class="d-flex flex-wrap justify-content-center g-2">
                    <?php foreach ($partners as $p) : ?>

                        <div class="col-4 col-md-2">

                            <img src="<?= base_url('assets/images/partners') ?>/<?= $p['imagepartner'] ?>" alt="PT. Corpec Inspeksi Utama | Logo Partners" width="150" height="80">

                        </div>



                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>
</div>




<?= $this->endSection(); ?>