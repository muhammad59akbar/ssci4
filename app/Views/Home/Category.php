<?= $this->extend('layout/UserTemplate'); ?>

<?= $this->section('content'); ?>

<div class="padding-custome">
    <div class="pt-2 mt-3" style="background-color: #DFDFDF;">
        <div class="py-4 bg-body-secondary">
            <div class="container">
                <div class="d-flex flex-column  align-items-center align-items-md-start text-center ">
                    <h1>Service <?= esc($categoryName); ?></h1>
                    <p>PT. Corpec Inspeksi Utama</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-3 my-5">

        <div class="row mt-3">
            <div class="col-md-8 text-start">
                <?php foreach ($news as $n) : ?>
                    <div class="card mb-3 p-2" style="max-width: 720px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= base_url('assets/images/news') ?>/<?= $n['image_news'] ?>" class="img-fluid rounded-start w-100 h-100" alt=" PT. Corpec Inspeksi Utama <?= ($categoryName); ?>">
                            </div>
                            <div class="col-md-8 d-flex flex-column">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $n['news_title'] ?></h5>
                                    <?php
                                    // Find content starting from <p> tag
                                    preg_match('/<p>(.*?)<\/p>/s', $n['news_description'], $matches);
                                    $content = !empty($matches[1]) ? $matches[1] : '';
                                    ?>


                                    <p class="card-text">
                                        <?= strip_tags(substr($content, 0, 100)); ?>
                                        <?php if (strlen(strip_tags($content)) > 100) : ?>
                                            ... <a href="<?= base_url() . $n['url_news'] ?>/detail?>">Read more</a>
                                        <?php endif; ?>
                                    </p>


                                </div>
                                <div class="d-flex justify-content-between p-2 align-items-center">
                                    <small class="text-muted mx-2"><?= date('F j, Y', strtotime($n['created_at'])); ?></small>
                                    <a href="<?= base_url() . $n['url_news'] ?>/detail?>" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>





            </div>
            <div class="col-lg-4">
                <div class="border border-primary text-white bg-primary p-3 rounded">
                    <h4>Contact Information</h4>
                    <hr>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="bi bi-telephone-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2">+62 1234567890</p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <i class="bi bi-envelope-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2">admin@corpec.co.id</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2 mb-1 fw-bold">Head Office</p>
                            <p class="mb-0">Jl. Penjernihan Dalam No.46<br>
                                Pejompongan, Jakarta Pusat<br>
                                DKI Jakarta 10210 - Indonesia</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="flex-shrink-0">
                            <i class="bi bi-geo-alt-fill fs-4 me-2"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mt-2 mb-1 fw-bold">Operational Office</p>
                            <p class="mb-0">Jl. Sirsak – H. Usman RT 001/002 No.
                                32B, Jagakarsa, Jakarta Selatan, DKI
                                Jakarta 12620
                        </div>
                    </div>



                </div>


            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>