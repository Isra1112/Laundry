<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveTransaction') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Transaction</h1>

    <!-- DataTales Example -->


    <div class="card shadow mb-4 ">
        <div class="card-header py-3 border-left-primary">
            <div class="row float">
                <h6 class="font-weight-bold text-dark col-md">Create Transaction : </h6>

            </div>

            <!-- <button type="button" class="btn btn-info">Tambah</button> -->
        </div>
        <div class="card-body border-left-primary">
            <form method="post" action="<?= base_url('package/' . "package['id'] " . '/update') ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Customer</label>
                        <select id="inputState" class="form-control">
                            <option disabled>Customer</option>
                            <option selected value="L">Ahmad Sudarsono</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                            <label for="inputNoKTP4">Telephone</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="10000" value="<?= '08212322928' ?>">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNoKTP4">Address</label>
                        <input type="text" class="form-control group-text" id="price" name="price" placeholder="10000" value="<?= 'Jln Tapos RT 1 RW 9' ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Package</label>
                        <select id="inputState" class="form-control">
                            <option>Customer</option>
                            <option selected value="L">Cuci Setrika Wangi Reguler</option>
                            <option value="P">Cuci Setrika Wangi Express 6 Jam</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Qty</label>
                        <div class="input-group">

                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="5">
                            <div class="input-group-append">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Sub-total</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="40000" disabled>

                        </div>
                    </div>

                </div>
                <div class="form-row ">
                    <div class="form-group col-md-6">
                        <label for="inputState">Package</label>
                        <select id="inputState" class="form-control">
                            <option>Customer</option>
                            <option value="L">Cuci Setrika Wangi Reguler</option>
                            <option selected value="P">Cuci Setrika Wangi Express 1 Hari</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Qty</label>
                        <div class="input-group">

                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="3">
                            <div class="input-group-append">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputState">Sub-total</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="45000" disabled>

                        </div>
                    </div>

                </div>
                <div class="form-row justify-content-md-center border-bottom border-grey">
                    <div class="form-group ">
                        <a href="#" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <span class="border-bottom border-success"></span>
                <div class="form-row mt-2">
                    <div class="form-group col-md-3">
                        <label for="inputState">Total Price</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="124000" disabled>

                        </div>
                    </div>
                </div>
                <button type="submit" id="simpan" class="btn btn-success" onclick="" disabled>Simpan</button>
            </form>
        </div>
    </div>
    <script>
        let edit = (el) => {
            el.disabled = true
            document.getElementById('simpan').disabled = false;
            document.getElementById('cancel').disabled = false;
            document.getElementById('name').disabled = false;
            document.getElementById('price').disabled = false;
        }

        function cancel(el) {
            el.disabled = true
            document.getElementById('simpan').disabled = true;
            document.getElementById('edit').disabled = false;
            document.getElementById('name').disabled = true;
            document.getElementById('price').disabled = true;
        }
    </script>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>