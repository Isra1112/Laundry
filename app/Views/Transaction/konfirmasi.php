<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveTransaksi') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header  py-6">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="http://localhost:8080/transaksi" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                <i class="fas fa-arrow-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped " id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($transaksi as $key => $trans) : ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $trans->kode_invoice ?></td>
                                <td><?= $trans->nama_member ?></td>
                                <td><?= $trans->total_harga ?></td>
                                <td><?= $trans->status ?></td>
                                <td>

                                    <a href="<?= base_url('transaksi/' . $trans->user_id . '/edit') ?>" data-href="<?= base_url('transaksi/' . $trans->user_id . '/edit') ?>" class="btn btn-sm btn-info">Konfirmasi Bayar</a>
                                    

                                </td>

                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>