<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <h2 class="mt-4 m-2">Write News</h2>
                <hr>

                <a href="ListBlog" class="m-2">&laquo; Back</a>

                <?= d($validationInput) ?>

                <form action="<?= base_url('CorpecBlog/CreateNews') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-4">
                        <label for="titleNews" class="form-label mx-2">Title</label>
                        <input type="text" class="form-control mx-2 <?= ($validationInput['titleNews']) ? 'is-invalid' : '' ?>" id="titleNews" aria-describedby="titleNews" name="titleNews" autocomplete="on">
                    </div>


                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="previmagekrywn">

                        </div>
                        <div class="col">
                            <label for="foto_krywn" class="form-label mx-2">Foto Karyawan</label>
                            <input class="form-control  <?= isset($ValidNewKaryawan['foto_krywn']) ? 'is-invalid' : '' ?>" type="file" id="foto_krywn" name="foto_krywn" onchange="changeImg()">
                            <?php if (isset($ValidNewKaryawan['foto_krywn'])) : ?>
                                <div class="invalid-feedback mx-2"><?= ($ValidNewKaryawan['foto_krywn']) ?></div>
                            <?php endif ?>

                        </div>



                    </div>
                    <div class="mb-3 mt-4">
                        <textarea class="content_news" name="content_news" id="content_news" style="display: none;"></textarea>
                    </div>






                    <button type="submit" class="btn btn-primary mb-3">Create</button>
                </form>


            </div>


        </div>
    </div>

    </div>

    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof ClassicEditor !== 'undefined') {
            ClassicEditor
                .create(document.querySelector('#content_news'))
                .catch(error => {
                    console.error(error);
                });
        } else {
            console.error("ClassicEditor is not defined");
        }
    });
</script>


<?= $this->endSection(); ?>