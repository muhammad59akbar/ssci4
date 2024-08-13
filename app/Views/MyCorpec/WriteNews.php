<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <h2 class="mt-4 m-2">Write News</h2>
                <hr>

                <a href="ListBlog" class="m-2">&laquo; Back</a>



                <form action="<?= base_url('CorpecBlog/CreateNews') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-4">
                        <label for="titleNews" class="form-label mx-2">Title</label>
                        <input type="text" class="form-control mx-2 <?= isset($validationInput['titleNews']) ? 'is-invalid' : '' ?>" id="titleNews" aria-describedby="titleNews" name="titleNews" autocomplete="on" value="<?= old('titleNews') ?>">
                        <?php if (isset($validationInput['titleNews'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($validationInput['titleNews']) ?></div>
                        <?php endif ?>
                    </div>


                    <div class="row mb-2">
                        <div class="col-sm-3 flex flex-column mb-2">
                            <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="previmageNews">

                        </div>
                        <div class="col">
                            <label for="image_news" class="form-label mx-2">Image News</label>
                            <input class="form-control  <?= isset($validationInput['image_news']) ? 'is-invalid' : '' ?>" type="file" id="image_news" name="image_news" onchange="changeImg()" value="<?= old('image_news') ?>">
                            <?php if (isset($validationInput['image_news'])) : ?>
                                <div class="invalid-feedback mx-2"><?= ($validationInput['image_news']) ?></div>
                            <?php endif ?>

                        </div>



                    </div>
                    <div class="mb-3 mt-4">
                        <textarea class="content_news <?= isset($validationInput['content_news']) ? 'is-invalid' : '' ?>" name="content_news" id="content_news" style="display: none;"><?= old('content_news') ?></textarea>
                        <?php if (isset($validationInput['content_news'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($validationInput['content_news']) ?></div>
                        <?php endif ?>

                    </div>

                    <div class="mb-3 mt-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" aria-label="Default select example" name="category_news">
                            <option value="1">Engineering</option>
                            <option value="2">Industrial</option>
                            <option value="3">Consumer Goods</option>
                            <option value="4">Audit</option>
                        </select>

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