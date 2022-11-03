<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveUser') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">User</h1>

    <!-- DataTales Example -->
    <div class="card border-left-primary shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
            <!-- <button type="button" class="btn btn-primary">Tambah</button> -->
        </div>
        <div class="card-body">
            <form>
                    <div class="form-group">
                        <label for="inputNama4" class="placeholder-shown">Nama Lengkap</label>
                        <input type="text" class="form-control placeholder-shown" id="inputNama4" placeholder="Lionel Messi">
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNama4" class="placeholder-shown">Username</label>
                        <input type="text" class="form-control placeholder-shown" id="inputNama4" placeholder="mesi2">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNoKTP4">Password</label>
                        <input type="password" class="form-control" id="inputNoKTP4" placeholder="password">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputState">Role</label>
                        <select id="inputState" class="form-control">
                            <option disabled selected>Pilih Role</option>
                            <?php foreach ($roles as $key => $role) :?>
                                <option value="<?php $role->name ?>"><?php echo $role->name ?></option>;
                            <?php endforeach ?>
                        </select>
                    </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>