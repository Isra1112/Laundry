<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveDashboard') ?>
active
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>


<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
 
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Earnings (This MONTH)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp. <?php echo is_null($this_month[0]->all_transaction) ?  0 : number_format($this_month[0]->all_transaction, 0, '', ',') ;  ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (This Year)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($all[0]->all_transaction, 0, '', ','); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Transaction Done
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $precentage ?>%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $precentage ?>%" aria-valuenow="<?php echo $precentage ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Unpaid Transaction</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $unpaid ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow border-left-secondary mb-4">

    <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
    <div class="card-header  py-3">
        <h6 class="m-0 font-weight-bold text-gray-1000">Latest Transaction</h6>
        <!-- <button type="button" class="btn btn-info">Tambah</button> -->

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                <thead style="background-color: #f4f2f2;">
                    <tr class="text-dark">
                        <th>#</th>
                        <th>Invoice</th>
                        <th>Name</th>
                        <th>Package</th>
                        <th>Total Price</th>
                        <th>Date</th>
                        <th>Paid</th>
                        <th>Status</th>
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
                            <td><?= $transaction->created_at ?></td>
                            <td class="<?= ($transaction->total_price <= $transaction->paid) ? '' : 'text-danger font-weight-bold' ; ?>" ><?= ($transaction->total_price <= $transaction->paid) ? "Rp. " . number_format($transaction->paid, 0, '', ',') : "Rp. " . number_format($transaction->paid, 0, '', ','); ?></td>
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
                                        default:
                                          echo "unknow";
                                      } ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>