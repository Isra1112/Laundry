<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveTransaksi') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>


<!-- Page Heading -->
<h1 class="h3 mb-3 text-gray-800">Transaction</h1>

<!-- DataTales Example -->
<div class="card border-left-secondary shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-gray-1000">All Transaction</h6>
    </a>
    <!-- <div class="card-header  py-6">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        <a class="btn btn-primary btn-icon-split" href="http://localhost:8080/transaction/create" role="button">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Add</span>
        </a>
    </div> -->
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="" style="background-color: #f4f2f2;">
                        <tr class="text-dark">
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Package</th>
                            <th>Total Price</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($transactions as $key => $transaction) : ?>
                            <tr class="">
                                <td><?= $key + 1 ?></td>
                                <td><?= $transaction->invoice ?></td>
                                <td><?= $transaction->name ?></td>
                                <td><?= $transaction->package_selected ?></td>
                                <td><?= "Rp. " . number_format($transaction->total_price, 0, '', ',') ?></td>
                                <td class="<?= ($transaction->total_price <= $transaction->paid) ? '' : 'text-danger font-weight-bold'; ?>"><?= ($transaction->total_price <= $transaction->paid) ? "Rp. " . number_format($transaction->paid, 0, '', ',') : "Rp. " . number_format($transaction->paid, 0, '', ','); ?></td>
                                <td>
                                    <?php
                                    switch ($transaction->status) {
                                        case "ready":
                                            echo '<div class="badge badge-dark text-wrap" style="width: 3.5rem;">
                                            Ready
                                            </div>';
                                            break;
                                        case "process":
                                            echo '<div class="badge badge-warning text-wrap" style="width: 3.5rem;">
                                            Process
                                            </div>';
                                            break;
                                        case "done":
                                            echo '<div class="badge badge-success text-wrap" style="width: 3.5rem;">
                                            Done
                                            </div>';
                                            break;
                                        case "picking up":
                                            echo '<div class="badge badge-primary text-wrap" style="width: 3.5rem;">
                                        Picking Up
                                                </div>';
                                            break;
                                        case "on delivery":
                                            echo '<div class="badge badge-info text-wrap" style="width: 3.5rem;">
                                                    On Delivery
                                                    </div>';
                                            break;
                                        case "new":
                                            echo '<div class="badge badge-danger text-wrap" style="width: 3.5rem;">
                                                        New
                                                        </div>';
                                            break;
                                        default:
                                            echo $transaction->status;
                                    } ?>
                                </td>
                                <td><?= $transaction->created_at ?></td>

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?= base_url('transaction/' . $transaction->id . '/preview') ?>" data-href="<?= base_url('transactions/' . $transaction->id . '/preview') ?>" class="btn btn-sm btn-primary">Detail</a>
                                        <?php if ($transaction->status == 'process') {
                                            echo '<a method href="' . base_url('tracking/5/' . $transaction->id . '/status') . '" data-href="' . base_url('tracking/5/' . $transaction->id . '/status') . '" class="btn btn-sm btn-success">Process Done</a>';
                                        } ?>
                                        <!-- <a href="#" data-href="<?= base_url('transactions/' . $transaction->user_id . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger">Delete</a> -->
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card border-left-secondary shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample3" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample3">
        <h6 class="m-0 font-weight-bold text-gray-1000">Ready To Pick Up</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTables1" width="100%" cellspacing="0">
                    <thead style="background-color: #f4f2f2;">
                        <tr class="text-dark">
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($toPickup) : ?>
                            <?php foreach ($toPickup as $key => $transaction) : ?>
                                <tr class="">
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $transaction->invoice ?></td>
                                    <td><?= $transaction->name ?></td>
                                    <td><?= $transaction->address ?></td>
                                    <td><?= "Rp. " . number_format($transaction->total_price, 0, '', ',') ?></td>
                                    <td class="<?= ($transaction->total_price <= $transaction->paid) ? '' : 'text-danger font-weight-bold'; ?>"><?= ($transaction->total_price <= $transaction->paid) ? "Rp. " . number_format($transaction->paid, 0, '', ',') : "Rp. " . number_format($transaction->paid, 0, '', ','); ?></td>
                                    <td>
                                        <?php
                                        switch ($transaction->status) {
                                            case "ready":
                                                echo '<div class="badge badge-dark text-wrap" style="width: 3.5rem;">
                                            Ready
                                            </div>';
                                                break;
                                            case "process":
                                                echo '<div class="badge badge-warning text-wrap" style="width: 3.5rem;">
                                            Process
                                            </div>';
                                                break;
                                            case "done":
                                                echo '<div class="badge badge-success text-wrap" style="width: 3.5rem;">
                                            Done
                                            </div>';
                                                break;
                                            case "picking up":
                                                echo '<div class="badge badge-primary text-wrap" style="width: 3.5rem;">
                                        Picking Up
                                                </div>';
                                                break;
                                            case "on delivery":
                                                echo '<div class="badge badge-info text-wrap" style="width: 3.5rem;">
                                                    On Delivery
                                                    </div>';
                                                break;
                                            case "new":
                                                echo '<div class="badge badge-danger text-wrap" style="width: 3.5rem;">
                                                        New
                                                        </div>';
                                                break;
                                            default:
                                                echo $transaction->status;
                                        } ?>
                                    </td>
                                    <td><?= $transaction->created_at ?></td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('transaction/' . $transaction->id . '/preview') ?>" data-href="<?= base_url('transactions/' . $transaction->id . '/preview') ?>" class="btn btn-sm btn-primary">Detail</a>
                                            <?php if (in_groups('staff')) : ?>
                                                <a method href="<?= base_url('tracking/1/' . $transaction->id . '/status') ?>" data-href="<?= base_url('tracking/1/' . $transaction->id . '/status') ?> ?>" class="btn btn-sm btn-success">Pick Up</a>
                                            <?php endif ?>
                                            <!-- <a href="#" data-href="<?= base_url('transactions/' . $transaction->user_id . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger">Delete</a> -->
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr class="odd text-center">
                                <td valign="top" colspan="9" class="dataTables_empty">Data No available</td>
                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card border-left-secondary shadow mb-4">
    <!-- Card Header - Accordion -->
    <a href="#collapseCardExample2" class="d-block card-header py-3 " data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
        <h6 class="m-0 font-weight-bold text-gray-1000">Ready To Be Delivered</h6>
    </a>
    <!-- Card Content - Collapse -->
    <div class="collapse show" id="collapseCardExample2">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTables1" width="100%" cellspacing="0">
                    <thead style="background-color: #f4f2f2;">
                        <tr class="text-dark">
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Paid</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($toDelivery) : ?>
                            <?php foreach ($toDelivery as $key => $transaction) : ?>
                                <tr class="">
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $transaction->invoice ?></td>
                                    <td><?= $transaction->name ?></td>
                                    <td><?= $transaction->address ?></td>
                                    <td><?= "Rp. " . number_format($transaction->total_price, 0, '', ',') ?></td>
                                    <td class="<?= ($transaction->total_price <= $transaction->paid) ? '' : 'text-danger font-weight-bold'; ?>"><?= ($transaction->total_price <= $transaction->paid) ? "Rp. " . number_format($transaction->paid, 0, '', ',') : "Rp. " . number_format($transaction->paid, 0, '', ','); ?></td>
                                    <td>
                                        <?php
                                        switch ($transaction->status) {
                                            case "ready":
                                                echo '<div class="badge badge-dark text-wrap" style="width: 3.5rem;">
                                            Ready
                                            </div>';
                                                break;
                                            case "process":
                                                echo '<div class="badge badge-warning text-wrap" style="width: 3.5rem;">
                                            Process
                                            </div>';
                                                break;
                                            case "done":
                                                echo '<div class="badge badge-success text-wrap" style="width: 3.5rem;">
                                            Done
                                            </div>';
                                                break;
                                            case "picking up":
                                                echo '<div class="badge badge-primary text-wrap" style="width: 3.5rem;">
                                        Picking Up
                                                </div>';
                                                break;
                                            case "on delivery":
                                                echo '<div class="badge badge-info text-wrap" style="width: 3.5rem;">
                                                    On Delivery
                                                    </div>';
                                                break;
                                            case "new":
                                                echo '<div class="badge badge-danger text-wrap" style="width: 3.5rem;">
                                                        New
                                                        </div>';
                                                break;
                                            default:
                                                echo $transaction->status;
                                        } ?>
                                    </td>
                                    <td><?= $transaction->created_at ?></td>

                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="<?= base_url('transaction/' . $transaction->id . '/preview') ?>" data-href="<?= base_url('transactions/' . $transaction->id . '/preview') ?>" class="btn btn-sm btn-primary">Detail</a>
                                            <?php if (in_groups('staff')) : ?>
                                                <a method href="<?= base_url('tracking/3/' . $transaction->id . '/status') ?>" data-href="<?= base_url('tracking/3/' . $transaction->id . '/status') ?> ?>" class="btn btn-sm btn-success">Deliver</a>
                                            <?php endif ?>
                                            <!-- <a href="#" data-href="<?= base_url('transactions/' . $transaction->user_id . '/delete') ?>" onclick="confirmToDelete(this)" class="btn btn-sm btn-danger">Delete</a> -->
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr class="odd text-center">
                                <td valign="top" colspan="9" class="dataTables_empty">Data No available</td>
                            </tr>
                        <?php endif ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            order: [
                [0, 'asc']
            ],
        });
    });
</script>
<?= $this->endSection() ?>