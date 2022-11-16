<?= $this->extend('layout/layout') ?>
<?= $this->section('isActivePaket') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Paket</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Tambah Paket</h6>
            <!-- <button type="button" class="btn btn-info">Tambah</button> -->
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNama4" class="placeholder-shown">Nama Paket</label>
                        <input type="text" class="form-control placeholder-shown" id="inputNama4" placeholder="Paket Cuci Setrika">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNoKTP4">Harga</label>
                        <input type="text" class="form-control" id="inputNoKTP4" placeholder="10000">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Jenis Paket</label>
                        <select id="inputState" class="form-control">
                            <option disabled selected>Pilih Jenis Paket</option>
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="kaos">kaos</option>
                            <option value="bedcover">Bed Cover</option>
                            <option value="lain">Lain-lain</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Outlet</label>
                        <select id="inputState" class="form-control">
                            <option disabled selected>Pilih Outlet</option>
                            <option value="kiloan">Kiloan</option>
                            <option value="selimut">Selimut</option>
                            <option value="kaos">kaos</option>
                            <option value="bedcover">Bed Cover</option>
                            <option value="lain">Lain-lain</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>