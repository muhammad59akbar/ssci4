<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>

<main class="mt-5 pt-4 ">
    <div class="container d-flex align-items-center justify-content-center">
        <?= dd($news) ?>
        <div class="col-md-12 my-4">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4 text-center">
                        <img src="https://corpec.co.id/wp-content/uploads/2021/04/PROFILE-1.png" class="img-fluid rounded-start m-2" alt="..." style="width: 300px; height:200px;">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h1 class="card-title">Card title</h1>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            <div class="d-flex justify-content-end">
                                <a href="" class="btn btn-info mx-2"><i class="bi bi-pencil-square"></i></a>

                                <form action="" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')"><i class="bi bi-archive-fill"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</main>

<?= $this->endSection(); ?>