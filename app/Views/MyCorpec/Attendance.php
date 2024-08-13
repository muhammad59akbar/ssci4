<?= $this->extend('layout/AdminTemplate'); ?>

<?= $this->section('content'); ?>
<main class="mt-5 pt-4">
    <div class="container">
        <div class="flex flex-column mx-2 my-2 border border-2 rounded">
            <div class="mx-4">
                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <h2 class="mt-4 m-2">Absensi</h2>

                <form action="<?= base_url('/MyCorp/attendance/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="mb-3 mt-4">
                        <label for="photo" class="form-label mx-2">Foto</label>
                        <div class="d-flex flex-column flex-md-row justify-content-between">
                            <div id="my_camera" class="mx-auto mb-3 mb-md-0"></div>
                            <div id="photo_preview" class="mx-auto"></div>
                        </div>
                        <br />
                        <input type="hidden" name="photo" id="photo">
                        <input type="hidden" id="latitude" name="latitude">
                        <input type="hidden" id="longitude" name="longitude">
                        <input type="text" class="form-control mx-2 <?= isset($validate['location']) ? 'is-invalid' : '' ?>" id="location" name="location" readonly>
                        <?php if (isset($validate['location'])) : ?>
                            <div class="invalid-feedback mx-2"><?= ($validate['location']) ?></div>
                        <?php endif ?>
                        <button type="button" class="btn btn-info mx-2 mt-2" onclick="takeSnapshot()">Ambil
                            Foto</button>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3" id="absenButton" style="display:none;">Absen</button>
                </form>
            </div>
        </div>
    </div>
</main>
<script src="<?= base_url('assets') ?>/js/jquery-3.5.1.js"></script>
<script src="<?= base_url('assets') ?>/js/webcam.min.js"></script>
<script>
    Webcam.set({
        width: 320,
        height: 240,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');

    function takeSnapshot() {
        Webcam.snap(function(data_uri) {
            document.getElementById('photo').value = data_uri;
            document.getElementById('photo_preview').innerHTML = '<img src="' + data_uri + '" class="img-fluid"/>';
            document.getElementById('absenButton').style.display = 'block';
        });
    }


    function showErrorSnackBar(message) {
        alert(message);
    }

    const readLocation = (setLocation, setError, setAccuracy) => {
        if (navigator.geolocation) {
            const geoId = navigator.geolocation.watchPosition(
                (position) => {
                    const lat = position.coords.latitude;
                    const lng = position.coords.longitude;
                    const accuracy = position.coords.accuracy;

                    setLocation({
                        lat,
                        lng
                    });
                    setAccuracy(accuracy);
                    console.log({
                        lat,
                        lng
                    }, accuracy);

                    const locationElement = document.getElementById('location');
                    const latitudeElement = document.getElementById('latitude');
                    const longitudeElement = document.getElementById('longitude');

                    if (locationElement) locationElement.value = lat + ", " + lng;
                    if (latitudeElement) latitudeElement.value = lat;
                    if (longitudeElement) longitudeElement.value = lng;

                    if (accuracy > 10) {
                        // showErrorSnackBar("The GPS accuracy isn't good enough");
                        console.log('Akurat');
                    }
                },
                (e) => {
                    showErrorSnackBar(e.message);
                    setError(e.message);
                }, {
                    enableHighAccuracy: true,
                    maximumAge: 2000,
                    timeout: 5000
                }
            );

            return () => {
                console.log('Clear watch called');
                navigator.geolocation.clearWatch(geoId);
            };
        } else {
            setError("Geolocation is not supported by this browser.");
        }
    };

    function setLocation(location) {
        console.log("Location set to:", location);
    }

    function setError(errorMessage) {
        console.error("Error:", errorMessage);
    }

    function setAccuracy(accuracy) {
        console.log("Accuracy set to:", accuracy);
    }

    window.onload = function() {
        readLocation(setLocation, setError, setAccuracy);
    }
</script>


<?= $this->endSection(); ?>