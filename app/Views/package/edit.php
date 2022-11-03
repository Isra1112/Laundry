<?= $this->extend('layout/layout') ?>
<?= $this->section('isActivePacakage') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<!-- Begin Page Content -->
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
    <h1 class="h3 mb-3 text-gray-800">Package</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3 border-left-primary">
            <div class="row float">
                    <h6 class="font-weight-bold text-dark col-md">Detail Package : </h6>
                    <button type="button" id="edit" class="btn btn-primary btn-sm mr-1" onclick="edit(this)">Print</button>
                    <button type="button" id="edit" class="btn btn-dark btn-sm mr-1" onclick="edit(this)">Edit</button>
                    <button type="button" data-href="<?= base_url('package/' . $package['id'] . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm mr-1">Delete</button>
                
            </div>

            <!-- <button type="button" class="btn btn-info">Tambah</button> -->
        </div>
        <div class="card-body border-left-primary">
            <form method="post" action="<?= base_url('package/' . $package['id'] . '/update') ?>">
                <div class="form-row">
                    <div class="form-group col-md-12 ">
                        <label for="inputNama4" class="placeholder-shown">Name</label>
                        <input disabled type="text" class="form-control placeholder-shown" id="name" name="name" placeholder="Paket Cuci Setrika" value="<?= $package['name'] ?>" required>

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputNoKTP4">Price</label>
                        <input disabled type="text" class="form-control" id="price" name="price" placeholder="10000" value="<?= $package['price'] ?>">
                    </div>
                </div>
                <button type="submit" id="simpan" class="btn btn-success" onclick="" disabled>Simpan</button>
                <button type="reset" id="cancel" class="btn btn-danger" onclick="" disabled>Cancel</button>
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