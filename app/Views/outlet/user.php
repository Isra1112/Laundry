<?= $this->extend('layout/layout') ?>
<!-- <?= $this->section('leafletRouting') ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" />
<link rel="stylesheet" href="../dist/leaflet-routing-machine.css" />
<?= $this->endSection() ?> -->
<?= $this->section('isActivePackage') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>



<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Outlet</h1>

<!-- DataTales Example -->


<div class="card shadow mb-4 ">
    <div class="card-header py-3 border-top-primary">
        <div class="row">

            <h6 class="font-weight-bold text-primary col-md mt-2 text-center">Outlet Location</h6>
        </div>

        <!-- <button type="button" class="btn btn-info">Tambah</button> -->
    </div>
    <div class="card-body border-left-primary">
        <div class="mx-12" id="map" style="height: 40rem; margin: 2.5% 10% 1%"></div>
        <div class="text-center">
            <p>Outlet Address :</p>
            <p><?php echo $outlet[0]->address ?></p>
            <p>Telephone : <?php echo $outlet[0]->telephone ?> Email : <?php echo $outlet[0]->email ?></p>
        </div>
        <hr>
        <button type="button" id="canceledit" class="btn btn-dark " onclick="cancel(this)">Cancel Edit</button>
    </div>
</div>


<!-- <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script src="../dist/leaflet-routing-machine.js"></script>
<script src="Control.Geocoder.js"></script>
<script src="config.js"></script>
<script src="index.js"></script> -->
<script>
    var tileLayer = new L.TileLayer('http://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="http://cartodb.com/attributions">CartoDB</a>'
    });

    var map = new L.Map('map', {
        'center': [<?php echo $outlet[0]->lat ?>, <?php echo $outlet[0]->lng ?>],
        'zoom': 15,
        'layers': [tileLayer]
    });

    var storeIcon = L.icon({
        iconUrl: '<?php echo base_url('img/map-marker-store.png') ?>',

        iconSize: [50, 80], // size of the icon
        shadowSize: [50, 64], // size of the shadow
        iconAnchor: [22, 70], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62], // the same for the shadow
        popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    });

    L.marker([<?php echo $outlet[0]->lat ?>, <?php echo $outlet[0]->lng ?>], {
        icon: storeIcon
    }).addTo(map).bindPopup("Outlet");

    if (<?php echo $addresses[0]->lat ?> !== 0 && <?php echo $addresses[0]->lng ?> !== 0) {
        var marker = L.marker([<?php echo $addresses[0]->lat ?>, <?php echo $addresses[0]->lng ?>], {
            draggable: false
        }).addTo(map).bindPopup("<?php echo $addresses[0]->name ?>");


        var polygon = L.polygon([
            [<?php echo $addresses[0]->lat ?>, <?php echo $addresses[0]->lng ?>],
            [<?php echo $outlet[0]->lat ?>, <?php echo $outlet[0]->lng ?>]
        ]).addTo(map).bindPopup('Distance : <?php echo $distance ?> KM');
    }

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
        document.getElementById('longtitude').disabled = false;
    }
</script>


<?= $this->endSection() ?>