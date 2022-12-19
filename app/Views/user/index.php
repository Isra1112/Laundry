<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveUser') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>


    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header  py-6">
            <h6 class="m-0 font-weight-bold text-primary">List User</h6>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead class="" style="background-color: #f4f2f2;">
                        <tr class="text-dark">
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($users as $key => $user) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <!-- <a href="<?= base_url('user/' . $user->id . '/edit') ?>" data-href="<?= base_url('user/' . $user->id . '/edit') ?>" class="btn btn-sm btn-outline-success">edit</a> -->
                                    <a href="#" data-href="<?= base_url('user/' . $user->id . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-outline-danger">Delete</a>

                                </td>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>