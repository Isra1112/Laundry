<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveTransaksi') ?>
active
<?= $this->endSection() ?>
<?= $this->section('isActiveHistory') ?>
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
<h1 class="h3 mb-3 text-gray-800">Transaction</h1>

<!-- DataTales Example -->


<div class="card shadow mb-4 ">
    <div class="card-header py-3 border-left-primary">
        <div class="row float">
            <h6 class="font-weight-bold text-dark col-md">Detail Transaction : </h6>
            <?php if (in_groups([ 'staff'])) : ?>
                <!-- <?php if ($transactions[0]->status != 'done') : ?>
                    <button type="button" id="edit" class="btn btn-dark btn-sm mr-1" onclick="edit(this)">Edit</button>
                    <button type="button" data-href="<?= base_url('package/' . "package['id']" . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm mr-1">Delete</button>
                    <h6 class="font-weight-bold text-dark mr-2 mt-2">Action : </h6>
                    <?php endif ?> -->
                <?php if ($transactions[0]->status == 'new' and $transactions[0]->delivery != 0 and in_groups('staff')) {
                    echo '<a method href="' . base_url('tracking/1/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/1/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Pick up</a>';
                } ?>
                <?php if ($transactions[0]->status == 'ready' and $transactions[0]->delivery != 0 and in_groups('staff')) {
                    echo '<a method href="' . base_url('tracking/3/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/3/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Delivery</a>';
                } ?>
                <?php if ($transactions[0]->status == 'process' and $transactions[0]->delivery != 0) {
                    echo '<a method href="' . base_url('tracking/5/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/5/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Process Done</a>';
                } ?>
                <?php if ($transactions[0]->status == 'picking up' and $transactions[0]->delivery != 0) {
                    echo '<a method href="' . base_url('tracking/2/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/2/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Picked Up</a>';
                } ?>
                <?php if ($transactions[0]->status == 'on delivery' and $transactions[0]->delivery != 0) {
                    echo '<a method href="' . base_url('tracking/4/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/4/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Delivered</a>';
                } ?>
                <?php if ($transactions[0]->status == 'new' and $transactions[0]->delivery == 0) {
                    echo '<a method href="' . base_url('tracking/6/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/6/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Process</a>';
                } ?>
                <?php if ($transactions[0]->status == 'process' and $transactions[0]->delivery == 0) {
                    echo '<a method href="' . base_url('tracking/7/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/7/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Process Done</a>';
                } ?>
                <?php if ($transactions[0]->status == 'ready' and $transactions[0]->delivery == 0) {
                    echo '<a method href="' . base_url('tracking/8/' . $transactions[0]->id . '/status') . '" data-href="' . base_url('tracking/8/' . $transactions[0]->id . '/status') . '" class="btn btn-sm btn-danger mr-1">Done</a>';
                } ?>
                <!-- <?php if ($transactions[0]->status != 'done') : ?>
                    <button type="button" id="edit" class="btn btn-dark btn-sm mr-1" onclick="edit(this)">Edit</button>
                    <button type="button" data-href="<?= base_url('package/' . "package['id']" . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-danger btn-sm mr-1">Delete</button>
                <?php endif ?> -->
            <?php endif ?>
        </div>

    </div>
    <div class="card-body border-left-primary">

        <table class="table table-striped ">
            <tbody>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Invoice</td>
                    <td><?php echo $transactions[0]->invoice ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Email</td>
                    <td><?php echo $transactions[0]->email ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Fullname</td>
                    <td><?php echo $transactions[0]->fullname ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Telephone</td>
                    <td><?php echo $transactions[0]->telephone ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Address Label</td>
                    <td><?php echo $transactions[0]->name ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Full Address</td>
                    <td><?php echo $transactions[0]->address ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Address Note</td>
                    <td><?php echo $transactions[0]->note ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Delivery Price</td>
                    <td><?php echo $transactions[0]->delivery ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Total Price</td>
                    <td><?php echo $transactions[0]->total_price ?></td>
                </tr>
                <tr>
                    <td class="bg-primary text-gray-100 font-weight-bold" width="20%">Paid</td>
                    <td><?php echo $transactions[0]->paid ?></td>
                </tr>
            </tbody>
        </table>
        <br>

        <h6 class=" mb-3 text-gray-800">Package Selected :</h6>

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
                        <td><?= $package->quantity ?></td>
                        <td><?= "Rp. " . number_format($package->total_price, 0, '', ',') ?></td>


                    </tr>
                <?php endforeach ?>
                <!-- <th class="text-center text-dark" style="background-color: #f4f2f2;" scope="row" colspan="4">Total</th>
                    <td><?php echo "Rp. " . number_format($transactions[0]->base_price, 0, '', ',') ?></td> -->
            </tbody>
        </table>
        <br>

        <h6 class=" mb-3 text-gray-800">Tracking :</h6>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="" style="background-color: #f4f2f2;">
                <tr class="text-dark">
                    <th>#</th>
                    <th>Staff Name</th>
                    <th>description</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($trackings) {
                    foreach ($trackings as $key => $tracking) {
                        $key += 1;
                        echo "<tr class=''>
                            <td>$key </td>
                            <td>$tracking->fullname </td>
                            <td>$tracking->description </td>
                        </tr>";
                    }
                } else {
                    echo '<tr class="odd text-center">
                        <td valign="top" colspan="5" class="dataTables_empty">Tracking Data No available</td>
                    </tr>';
                } ?>


            </tbody>
        </table>

        <?php if (in_groups(['admin', 'staff'])) : ?>
            <br>

            <?php if ($transactions[0]->paid !== $transactions[0]->total_price) : ?>

                <h6 class=" mb-3 text-gray-800">Payment :</h6>

                <form method="post" action="<?= base_url('transaction/' . $transactions[0]->id . '/edit') ?>">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="paid">Paid</label>
                            <input readonly type="text" class="form-control" id="paid" name="paid" placeholder="10000" value="<?= $transactions[0]->paid ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputNoKTP4">Pay</label>
                            <input type="int" class="form-control" id="pay" name="pay" placeholder="10000" required>
                        </div>
                        <div class="form-group col-md-2">
                            <button type="submit" id="simpan" class="btn btn-success ml-4" style="margin-top: 2rem;" onclick="">Simpan</button>
                        </div>
                    </div>

                </form>
                <br>
            <?php endif ?>
        <?php endif ?>
        <?php if(in_groups(['staff','admin'])) : ?>
        <hr>
        <a href="<?php echo base_url('transaction/' . $transactions[0]->id . '/print') ?>" class="d-none d-sm-inline-block btn btn btn-info shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Print Invoice</a>
            <?php endif ?>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            searching: false,
            paging: false,
            info: false
        });
    });


    function package(id) {
        console.log(id);
        document.getElementById(`subtotal${id}`).value = document.getElementById(`packprice_${id}`).value * document.getElementById(`qty${id}`).value;

    }
</script>

<?= $this->endSection() ?>