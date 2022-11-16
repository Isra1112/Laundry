<?= $this->extend('layout/layout') ?>
<?= $this->section('isActivePackage') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>


<?php
// To print success flash message
if (session()->getFlashdata("message")) {
?>
    <div class="alert alert-success">
        <?= session()->getFlashdata("message") ?>
    </div>
<?php
}
?>

<?php
// To print error messages
if (!empty($errors)) : ?>

    <?php foreach ($errors as $field => $error) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p><?= $error ?></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endforeach ?>

<?php endif ?>
<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Address</h1>

<!-- DataTales Example -->


<div class="card shadow mb-4 ">
    <div class="card-header py-3 border-left-primary">
        <div class="row">

            <h6 class="font-weight-bold text-primary col-md mt-2">Detail Address : </h6>
            <h6 class="font-weight-bold text-dark mr-2 mt-2">Action : </h6>
            <button type="button" id="edit" class="btn btn-dark btn-sm mr-1" onclick="edit(this)">Edit</button>
        </div>

        <!-- <button type="button" class="btn btn-info">Tambah</button> -->
    </div>
    <div class="card-body border-left-primary">
        <form method="post" action="<?= base_url('address/' . $addresses[0]->id  . '/update') ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Address Label</label>
                    <input disabled type="text" class="form-control" id="name" name="name" placeholder="Label" value="<?= $addresses[0]->name ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="note">Note</label>
                    <input disabled type="text" class="form-control" id="note" name="note" placeholder="Note" value="<?= $addresses[0]->note ?>">
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <textarea disabled class="form-control" id="address" name="address" placeholder="Full Address"><?php echo $addresses[0]->address ?></textarea>
                </div>
                <div class="form-group col-md-3">
                    <label for="latitude">Latitude</label>
                    <input disabled type="text" class="form-control" id="latitude" name="latitude" placeholder="8217" value="<?= $addresses[0]->lat ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="longtitude">Longitude</label>
                    <input disabled type="text" class="form-control" id="longtitude" name="longtitude" placeholder="8217" value="<?= $addresses[0]->lng ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 mr-12">

                    <div class="mx-12" id="map" style="height: 30rem; margin: 5% 10%"></div>
                </div>

            </div>


            <button type="submit" id="simpan" class="btn btn-success" onclick="" disabled>Simpan</button>
            <button type="reset" id="cancel" class="btn btn-danger" onclick="" disabled>Cancel</button>

        </form>
        <hr>
        <button disabled type="button" id="canceledit" class="btn btn-dark " onclick="cancel(this)">Cancel Edit</button>
    </div>
</div>



<script>
    var tileLayer = new L.TileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
    });

    var map = new L.Map('map', {
        'center': [document.getElementById('latitude').value == 0 ? -6.445433: document.getElementById('latitude').value, document.getElementById('longtitude').value == 0 ? 106.868958:document.getElementById('longtitude').value],
        'zoom': 12,
        'layers': [tileLayer]
    });

    var marker = L.marker([document.getElementById('latitude').value == 0 ? -6.445433: document.getElementById('latitude').value, document.getElementById('longtitude').value == 0 ? 106.868958:document.getElementById('longtitude').value], {
        draggable: true
    }).addTo(map);

    marker.on('dragend', function(e) {
        document.getElementById('latitude').value = marker.getLatLng().lat;
        document.getElementById('longtitude').value = marker.getLatLng().lng;
    });

    // L.tileLayer('http://tiles.mapc.org/basemap/{z}/{x}/{y}.png', {
    //     attribution: '© OpenStreetMap contributors',
    //     maxZoom: 17,
    //     minZoom: 15
    // }).addTo(map);

    // // bike lanes
    // L.tileLayer('http://tiles.mapc.org/trailmap-onroad/{z}/{x}/{y}.png', {
    //     maxZoom: 17,
    //     minZoom: 9
    // }).addTo(map);

    // L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    //     attribution: '© OpenStreetMap contributors',
    //     maxZoom: 17,
    //     minZoom: 9
    // }).addTo(map);


    // needed token
    //ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6IjZjNmRjNzk3ZmE2MTcwOTEwMGY0MzU3YjUzOWFmNWZhIn0.Y8bhBaUMqFiPrDRW9hieoQ';
    // ACCESS_TOKEN = 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpandmbXliNDBjZWd2M2x6bDk3c2ZtOTkifQ._QA7i5Mpkd_m30IGElHziw';
    //     L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + ACCESS_TOKEN, {
    //         attribution: 'Imagery © <a href="http://mapbox.com">Mapbox</a>',
    //         id: 'mapbox.streets'
    //     }).addTo(map); 

    let edit = (el) => {
        el.disabled = true
        document.getElementById('simpan').disabled = false;
        document.getElementById('cancel').disabled = false;
        document.getElementById('name').disabled = false;
        document.getElementById('note').disabled = false;
        document.getElementById('address').disabled = false;
        document.getElementById('canceledit').disabled = false;
        document.getElementById('latitude').disabled = false;
        document.getElementById('longtitude').disabled = false;
    }

    function cancel(el) {
        document.getElementById('simpan').disabled = true;
        document.getElementById('cancel').disabled = true;
        document.getElementById('name').disabled = true;
        document.getElementById('note').disabled = true;
        document.getElementById('address').disabled = true;
        document.getElementById('canceledit').disabled = true;
        document.getElementById('edit').disabled = false;
        document.getElementById('latitude').disabled = true;
        document.getElementById('longtitude').disabled = true;
    }
</script>


<?= $this->endSection() ?>