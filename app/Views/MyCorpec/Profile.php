<?= $this->extend('layout/AdminTemplate'); ?>


<?= $this->section('content'); ?>


<main class="mt-5 pt-4 ">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body text-center">
                <div class="card-images mb-3">

                    <img src="<?= base_url('assets/images/karyawan') ?>/<?= user()->image_karyawan ?>" alt="Left Image" class="card-image img-fluid" data-toggle="modal" data-target="#imageModal" data-image="<?= base_url('assets/images/karyawan') ?>/<?= user()->image_karyawan ?>" style="width: 250px; height: 250px; ">

                    <?php if ($userGroup !== 'Direktur') : ?>

                        <img src="<?= base_url('assets/images/rek') ?>/<?= user()->gmbr_rekktp ?>" alt="Right Image" class="card-image img-fluid " style="width: 300px; height: 250px; " data-toggle="modal" data-target="#imageModal" data-image="<?= base_url('assets/images/rek') ?>/<?= user()->gmbr_rekktp ?>" style=" width: 300px">

                    <?php endif; ?>
                </div>
                <h5 class="card-title">Nama: <?= user()->fullname ?></h5>
                <p class="card-text">No Rekening: <?= user()->rek_karyawan ?></p>
                <span class="badge">tester</span>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Preview</h5>
                    <button type="button" class="p-2 bg-danger border-0 text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" alt="Image Preview" class="img-fluid">
                </div>
            </div>
        </div>
    </div>




</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        $('[data-toggle="modal"]').on('click', function() {
            var imageSrc = $(this).data('image');
            $('#modalImage').attr('src', imageSrc);
        });
    });
</script>



<?= $this->endSection(); ?>