<?= $this->extend('layout/layout') ?>
<?= $this->section('isActivePaket') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <?php
    // To print success flash message
    if (session()->get("success")) {
    ?>
        <div class="alert alert-success">
            <?= session()->get("success") ?>
        </div>
    <?php
    }
    ?>

    <?php
    // To print error messages
    if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $field => $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Paket</h1>

    <!-- DataTales Example -->
    <div class="card shadow border-left-primary mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Paket</h6>
            <!-- <button type="button" class="btn btn-info">Tambah</button> -->
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('package/store') ?>">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNama4" class="placeholder-shown">Nama Paket</label>
                        <input type="text" class="form-control placeholder-shown" id="name" name="name" placeholder="Paket Cuci Setrika" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNoKTP4">Harga</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="10000">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>