<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveReport') ?>
active
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800">Report</h1>

    <!-- DataTales Example -->
    <div class="card shadow border-left-primary mb-4">
        <div class="card-header  py-6">
            <h6 class="m-0 font-weight-bold text-primary">Transaction Report</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('report/print') ?>">
                <div class="form-row">
                    <div class="col">
                        <label>
                            <input name="date" type="radio" value="all"><strong> All Data</strong>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <label>
                            <input name="date" type="radio" value="month"><strong> This Month</strong>
                        </label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-1">
                        <input name="date" type="radio" value="date"><strong> Date </strong>
                    </div>
                    <div class="col-3">
                    <strong> from </strong>
                        <input name="from" type="date" value="Dari Tanggal" class="colorpicker-default form-control" size="12" id="datepicker-multiple1">
                    </div>
                    <div class="col-3">
                    <strong> to </strong>
                        <input name="to" type="date" value="sampai Tanggal" class="colorpicker-default form-control" size="12" id="datepicker-multiple2">
                    </div>
                </div>
                <button type="submit" id="simpan" class="btn btn-primary" onclick="">Show</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection() ?>