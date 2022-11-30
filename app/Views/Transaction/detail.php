<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveCollapseTransaction') ?>
active
<?= $this->endSection() ?>
<?= $this->section('isActiveHistory') ?>
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
                <h6 class="font-weight-bold text-dark col-md">Detail Transaction : </h6>

            </div>

            <!-- <button type="button" class="btn btn-info">Tambah</button> -->
        </div>
        <div class="card-body border-left-primary">
            <p>User</p>
            <br>
            <table class="table table-striped ">
                <tbody>
                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Email</td>
                        <td><?php echo $transactions[0]->email ?></td>
                    </tr>
                    <tr >
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Fullname</td>
                        <td><?php echo $transactions[0]->fullname ?></td>
                    </tr>
                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Telephone</td>
                        <td><?php echo $transactions[0]->telephone ?></td>
                    </tr>
                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Address Label</td>
                        <td><?php echo $transactions[0]->name ?></td>
                    </tr>
                    <tr >
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Full Address</td>
                        <td><?php echo $transactions[0]->address ?></td>
                    </tr>
                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Address Note</td>
                        <td><?php echo $transactions[0]->note ?></td>
                    </tr>

                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">Invoice</td>
                        <td><?php echo $transactions[0]->invoice ?></td>
                    </tr>
                    <tr >
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">base_price</td>
                        <td><?php echo $transactions[0]->base_price ?></td>
                    </tr>
                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">total_price</td>
                        <td><?php echo $transactions[0]->total_price ?></td>
                    </tr>
                    <tr>
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">delivery</td>
                        <td><?php echo $transactions[0]->invoice ?></td>
                    </tr>
                    <tr >
                        <td class="bg-primary text-gray-100 font-weight-bold" width="30%">paid</td>
                        <td><?php echo $transactions[0]->paid ?></td>
                    </tr>
                </tbody>
            </table>
            <p>Package Selected</p>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="" style="background-color: #f4f2f2;">
                    <tr class="text-dark">
                        <th>#</th>
                        <th>Package</th>
                        <th>Package Price</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($packages as $key => $package) : ?>
                        <tr class="">
                            <td><?= $key + 1 ?></td>
                            <td><?= $package->name ?></td>
                            <td><?= "Rp. " . number_format($package->pack_price, 0, '', ',') ?></td>
                            <td><?= "Rp. " . number_format($package->quantity, 0, '', ',') ?></td>
                            <td><?= "Rp. " . number_format($package->total_price, 0, '', ',') ?></td>


                        </tr>
                    <?php endforeach ?>
                    <th class="text-center text-dark" style="background-color: #f4f2f2;" scope="row" colspan="4">Total</th>
                    <td><?php echo "Rp. " . number_format($transactions[0]->base_price, 0, '', ',') ?></td>
                </tbody>
            </table>
            <br>
            <p>Tracking</p>

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="" style="background-color: #f4f2f2;">
                    <tr class="text-dark">
                        <th>#</th>
                        <th>Package</th>
                        <th>Package Price</th>
                        <th>Qty</th>
                        <th>Total Price</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($packages as $key => $package) : ?>
                        <tr class="">
                            <td><?= $key + 1 ?></td>
                            <td><?= $package->name ?></td>
                            <td><?= "Rp. " . number_format($package->pack_price, 0, '', ',') ?></td>
                            <td><?= "Rp. " . number_format($package->quantity, 0, '', ',') ?></td>
                            <td><?= "Rp. " . number_format($package->total_price, 0, '', ',') ?></td>


                        </tr>
                    <?php endforeach ?>
                    <th class="text-center text-dark" style="background-color: #f4f2f2;" scope="row" colspan="4">Total</th>
                    <td><?php echo "Rp. " . number_format($transactions[0]->base_price, 0, '', ',') ?></td>
                </tbody>
            </table>

            <a href="<?php echo base_url('transaction/'.$transactions[0]->id.'/print') ?>" class="d-none d-sm-inline-block btn btn btn-info shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Print Invoice</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            searching: false,
            paging: false,
            info: false
        });
    });
</script>

<?= $this->endSection() ?>