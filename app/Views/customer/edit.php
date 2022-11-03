<?= $this->extend('layout/layout') ?>
<?= $this->section('isActivePelanggan') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Pelanggan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4 ">
    <div class="card-header py-3 border-left-primary">
        <h6 class="m-0 font-weight-bold text-info">Edit Pelanggan</h6>
        <!-- <button type="button" class="btn btn-info">Tambah</button> -->
    </div>
    <div class="card-body border-left-primary">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNama4">Nama</label>
                    <input type="text"  name="nama_member" class="form-control" id="inputNama4"  value="<?= $pelanggan['nama_member'] ?>" >
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNoKTP4">Nomer KTP</label>
                    <input type="text" name="no_ktp" class="form-control" id="inputNoKTP4"  value="<?= $pelanggan['no_ktp'] ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputState">Jenis Kelamin</label>
                    <select id="inputState" class="form-control" name="jenis_kelamin">
                        <option disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L" <?= ($pelanggan['jenis_kelamin'] == "L" ? "selected" : ""); ?>>Laki-laki</option>
                        <option value="P" <?= ($pelanggan['jenis_kelamin'] == "P" ? "selected" : ""); ?>>Perempuan</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTelepon">Telepon</label>
                    <input type="text" name="telp_member" class="form-control" id="inputTelepon"  value="<?= $pelanggan['telp_member'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAlamat4">Alamat</label>
                <input type="text" name="alamat_member" class="form-control" id="inputAlamat4"  value="<?= $pelanggan['alamat_member'] ?>">
            </div>
            <button type="submit" class="btn btn-info">Edit</button>
        </form>
    </div>
</div>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>
                