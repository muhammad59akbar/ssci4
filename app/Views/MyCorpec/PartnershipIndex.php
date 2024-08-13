<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>

<main class="mt-5 pt-4 ">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4 p-2">
                <h2 class="mt-4 m-2">Partner With Corpec</h2>

                <hr>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Partner
                </button>
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success mt-2" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>

                <!-- Modal -->
                <div class="modal fade <?= !empty($validasi) ? 'show' : '' ?>" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Partners</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('/CorpecBlog/addPartnership') ?>" method="post" enctype="multipart/form-data">
                                    <? csrf_field() ?>

                                    <div class="col-sm-8 flex flex-column mb-2">
                                        <img class="img-thumbnail" src="<?= base_url('assets/images/addimage.png') ?>" alt="" width="250" height="250" id="previmagePartner">

                                    </div>
                                    <div class="col">
                                        <label for="imagePartner" class="form-label mx-2">Image Partner</label>
                                        <input class="form-control  <?= isset($validasi['imagePartner']) ? 'is-invalid' : '' ?>" type="file" id="imagePartner" name="imagePartner" onchange="changeImg()">
                                        <?php if (isset($validasi['imagePartner'])) : ?>
                                            <div class=" invalid-feedback mx-2"><?= ($validasi['imagePartner']) ?>
                                            </div>
                                        <?php endif ?>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>






            </div>

            <!--  -->
            <div class=" p-2 mx-4">
                <div class="row justify-content-center">
                    <?php foreach ($partners as $partner) : ?>
                        <div class="col-6 col-md-3 d-flex flex-column align-items-center mb-3">

                            <div class="w-100">
                                <img src="<?= base_url('assets/images/partners/' . $partner['imagepartner']) ?>" alt="Partner Image" class="img-thumbnail mb-2 partner-image" style="width:100%; height:150px">
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#editModal<?= $partner['partnerid'] ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>
                                <form action="<?= base_url('/CorpecBlog/DeletePartner/' . $partner['partnerid']) ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>

                        </div>

                        <!-- Edit Partner Modal -->
                        <div class="modal fade" id="editModal<?= $partner['partnerid'] ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $partner['partnerid'] ?>" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel<?= $partner['partnerid'] ?>">Edit Partner</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('/CorpecBlog/EditPartnership/' . $partner['partnerid']) ?>" method="post" enctype="multipart/form-data">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name='partnerid' value="<?= $partner['partnerid'] ?>">
                                            <input type="hidden" name="imagepartnerOld" value="<?= $partner['imagepartner'] ?>">
                                            <div class="mb-3 text-center">
                                                <img class="img-thumbnail" src="<?= base_url('assets/images/partners/' . $partner['imagepartner']) ?>" alt="Partner Image" width="250" height="250" id="previmagePartnerEdit<?= $partner['partnerid'] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="imagePartnerEdit<?= $partner['partnerid'] ?>" class="form-label">Image Partner</label>
                                                <input class="form-control" type="file" id="imagePartnerEdit<?= $partner['partnerid'] ?>" name="imagePartner" onchange="changeImgEdit(<?= $partner['partnerid'] ?>)">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!--  -->

        </div>
    </div>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (document.querySelector('.modal.show')) {
            var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        }
    });

    function changeImgEdit(id) {
        var input = document.getElementById('imagePartnerEdit' + id);
        var reader = new FileReader();

        reader.onload = function(e) {
            document.getElementById('previmagePartnerEdit' + id).src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
</script>


<?= $this->endSection(); ?>