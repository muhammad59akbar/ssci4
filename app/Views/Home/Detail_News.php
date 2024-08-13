<?= $this->extend('layout/UserTemplate'); ?>

<?= $this->section('content'); ?>

<div class="padding-custome">
    <div class="pt-2 mt-3" style="background-color: #DFDFDF;">
        <div class="py-4 bg-body-secondary">
            <div class="container">
                <div class="d-flex flex-column align-items-md-start text-center">
                    <h2><?= $news['news_title'] ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3 my-5">
        <div class="row">
            <!-- Kolom besar dengan gambar ditengah -->
            <div class="col-lg-9">
                <div class="text-center mb-2">
                    <img src="<?= base_url('assets/images/news') ?>/<?= $news['image_news'] ?>" class="img-fluid" style="width:300px; height:250px; " alt="PT. Corpec Inspeksi Utama | <?= $news['news_title'] ?>">
                </div>
                <?= $news['news_description'] ?>
                <div class="text-center">
                    <a href="<?= base_url('/') ?>" class="btn btn-primary text-center">back</a>
                </div>

            </div>

            <div class="col-lg-3  p-2">
                <div class="card">
                    <h4 class="card-header bg-info text-white">Recent News</h3>
                        <?php foreach ($listNews as $list) : ?>
                            <a href="/<?= $list['url_news'] ?>/detail">
                                <div class="card m-2 ">
                                    <div class="d-flex justify-content-lg-evenly justify-content-start align-items-lg-center align-items-start">
                                        <div class="col-md-2 p-2">


                                            <img src="<?= base_url('assets/images/news') ?>/<?= $list['image_news'] ?>" class="rounded-circle " alt="Logo" style="max-width: 50px; height:50px">

                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h6 class="card-title"><?= mb_strimwidth($list['news_title'], 0, 35, ''); ?></h5>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach ?>

                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>