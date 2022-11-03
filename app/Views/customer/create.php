<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveCustomer') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Customer</h1>

    <!-- DataTales Example -->
    <div class="card border-left-primary shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Customer</h6>
            <!-- <button type="button" class="btn btn-primary">Tambah</button> -->
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNama4" class="placeholder-shown">Nama</label>
                        <input type="text" class="form-control placeholder-shown" id="inputNama4" placeholder="Ronaldo....">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Jenis Kelamin</label>
                        <select id="inputState" class="form-control">
                            <option disabled selected>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTelepon">Telepon</label>
                        <input type="text" class="form-control" id="inputTelepon" placeholder="0878....">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAlamat4">Alamat</label>
                    <input type="text" class="form-control" id="inputAlamat4" placeholder="Jln Pakis RT 1 RW 5....">
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>