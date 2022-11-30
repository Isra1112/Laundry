<?= $this->extend('layout/layout') ?>
<?= $this->section('isActivePackage') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Package</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header  py-6">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a class="btn btn-primary btn-icon-split" href="<?php base_url('package/create') ?>" role="button">
                <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="" style="background-color: #f4f2f2;">
                        <tr class="text-dark">
                            <th>No</th>
                            <th>Package Name</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($packages as $key => $package) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $package->name ?></td>
                                <td><?= $package->price ?></td>
                                <td>

                                    <a href="<?= base_url('package/' . $package->id . '/edit') ?>" data-href="<?= base_url('package/' . $package->id . '/edit') ?>" class="btn btn-sm btn-outline-success">edit</a>
                                    <a href="#" data-href="<?= base_url('package/' . $package->id . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>

                                </td>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>