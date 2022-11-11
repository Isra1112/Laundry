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
<h1 class="h3 mb-3 text-gray-800">Profile</h1>

<!-- DataTales Example -->


<div class="card shadow mb-4 ">
    <div class="card-header py-3 border-left-primary">
        <div class="row">

            <h6 class="font-weight-bold text-primary col-md mt-2">Profile : </h6>
            <h6 class="font-weight-bold text-dark mr-2 mt-2">Action : </h6>
            <button type="button" id="edit" class="btn btn-dark btn-sm mr-1" onclick="edit(this)">Edit</button>
        </div>

        <!-- <button type="button" class="btn btn-info">Tambah</button> -->
    </div>
    <div class="card-body border-left-primary">
        <form method="post" action="<?= base_url('profile/' . $profiles[0]->id  . '/update') ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fullname">Fullname</label>
                    <input disabled type="text" class="form-control" id="fullname" name="fullname" placeholder="Mbape" value="<?= $profiles[0]->fullname ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone">Telephone</label>
                    <input disabled type="number" class="form-control" id="telephone" name="telephone" placeholder="0878277218" value="<?= '0' . $profiles[0]->telephone ?>">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select disabled id="gender" name="gender" class="form-control">
                        <option <?php echo $profiles[0]->gender == null ? 'selected' : ''; ?> disabled>Choose Gender</option>
                        <option <?php echo $profiles[0]->gender == 'm' ? 'selected' : ''; ?> value="m">Male</option>
                        <option <?php echo $profiles[0]->gender == 'f' ? 'selected' : ''; ?> value="f">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="birthdate">Birth Date</label>
                    <input disabled type="date" class="form-control group-text" id="birthdate" name="birthdate" placeholder="" value="<?php echo $profiles[0]->birthdate ?>">
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
    let edit = (el) => {
        el.disabled = true
        document.getElementById('simpan').disabled = false;
        document.getElementById('cancel').disabled = false;
        document.getElementById('fullname').disabled = false;
        document.getElementById('telephone').disabled = false;
        document.getElementById('birthdate').disabled = false;
        document.getElementById('gender').disabled = false;
        document.getElementById('canceledit').disabled = false;
    }

    function cancel(el) {
        document.getElementById('simpan').disabled = true;
        document.getElementById('cancel').disabled = true;
        document.getElementById('fullname').disabled = true;
        document.getElementById('telephone').disabled = true;
        document.getElementById('birthdate').disabled = true;
        document.getElementById('gender').disabled = true;
        document.getElementById('canceledit').disabled = true;
        document.getElementById('edit').disabled = false;
    }
</script>


<?= $this->endSection() ?>