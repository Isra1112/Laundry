<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveCollapseTransaction') ?>
active
<?= $this->endSection() ?>
<?= $this->section('isActiveNewTransaction') ?>
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
            <h6 class="font-weight-bold text-dark col-md">Create Transaction : </h6>

        </div>

        <!-- <button type="button" class="btn btn-info">Tambah</button> -->
    </div>

    <div class="card-body border-left-primary">
        <div class="alert alert-danger " id="alertpackage" style="display: none">
            You Must Pick at Least <strong> 1 Package!</strong>
            <button type="button" class="close" data-hide="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="post" action="<?= base_url('transaction/store') ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="custName">Name</label>
                    <input readonly type="text" class="form-control" id="custName" name="custName" placeholder="Ahmad dani" value="<?= $profile[0]->fullname ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputNoKTP4">Telephone</label>
                    <input readonly type="int" class="form-control" id="price" name="price" placeholder="10000" value="<?= $profile[0]->telephone ?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="label">Label</label>
                    <input readonly type="text" class="form-control group-text" id="label" name="label" placeholder="Rumah" value="<?= $addresses[0]->name ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="address">Address</label>
                    <textarea readonly class="form-control" id="address" name="address" placeholder="Full Address"><?php echo $addresses[0]->address ?></textarea>
                </div>
                <div class="form-group col-md-2">
                    <label for="delivery">Delivery</label>
                    <select required id="delivery" name="delivery" class="form-control" onchange="package(1)">
                        <!-- <option selected disabled>Is Delvery?</option> -->
                        <option selected value="0">To Outlet</option>
                        <option value="1">Delivery</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="qty1">Range</label>
                    <div class="input-group">
                        <input type="number" class="form-control" id="range" name="range" aria-label="Amount (to the nearest dollar)" value="<?php echo $distance ?>" readonly>
                        <div class="input-group-append">
                            <span class="input-group-text">KM</span>
                        </div>
                    </div>
                </div>

                <div class="form-group col-md-2">
                    <label for="inputState">Delivery Price</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">Rp. </span>
                        </div>
                        <input type="number" class="form-control" name="deliv-price" id="deliv-price" aria-label="Amount (to the nearest dollar)" value=<?php echo $deliveryPrice  ?> readonly>

                    </div>
                </div>

            </div>
            <div id="packageContainer">
                <input type="hidden" id="countpackage" name="countpackage" value="1">
                <input type="hidden" id="selectedpackage" name="selectedpackage" value="2">
                <div class="form-row" id="row1">
                    <div class="form-group col-md-8">
                        <label for="package1">Package</label>
                        <select id="package1" class="form-control" name="package1" onchange="package(1)">
                            <!-- <option selected disabled>Select Package</option> -->
                            <?php foreach ($packages as $key => $package) : ?>
                                <option value="<?php echo $package->id ?>"><?php echo $package->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="qty1">Qty</label>
                        <div class="input-group">
                            <input required type="number" name="qty1" class="form-control" id="qty1" aria-label="Amount (to the nearest dollar)" value="1" onchange="package(1)">
                            <div class="input-group-append">
                                <span class="input-group-text">Kg</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputState">Sub-total</label>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text">Rp. </span>
                            </div>
                            <input type="number" class="form-control" id="subtotal1" name="subtotal1" aria-label="Amount (to the nearest dollar)" value=8000 readonly>

                        </div>
                    </div>
                    <div class="form-group col-md-1 text-center " style="padding-top: 35px;">
                        <a onclick="removeFormField('row1')" class="btn btn-primary btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>

                </div>
            </div>


            <div class="form-row justify-content-md-center border-bottom border-grey">
                <div class="form-group">
                    <a onclick="addFormField()" class="btn btn-primary btn-circle btn-sm">
                        <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <span class="border-bottom border-success"></span>
            <div class="form-row mt-2">
                <div class="form-group col-md-3">
                    <label for="inputState">Total Price</label>
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input id="totalPrice" name="totalPrice" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" value=8000 readonly>

                    </div>
                </div>
            </div>
            <button type="submit" id="simpan" class="btn btn-success" onclick="">Simpan</button>
        </form>
    </div>
</div>

<script>
    let index = 1;

    function addFormField() {
        var id = document.getElementById("selectedpackage").value;
        $("#packageContainer").append(
            "<div class='form-row' id='row" + id + "'>" +
            "<div class='form-group col-md-8'>" +
            "<label for='package" + id + "'>Package</label>" +
            "<select id='package" + id + "' name='package" + id + "' class='form-control' onchange='package(" + id + ")'>" +
            "<option selected disabled>Select Package</option>" +
            "<?php foreach ($packages as $key => $package) : ?>" +
            "<option value='<?php echo $package->id ?>'><?php echo $package->name ?></option>" +
            "<?php endforeach ?>" +
            "</select>" +
            "</div>" +
            "<div class='form-group col-md-1'>" +
            "<label for='qty" + id + "'>Qty</label>" +
            "<div class='input-group'>" +
            "<input type='number' name='qty" + id + "' class='form-control' id='qty" + id + "' aria-label='Amount (to the nearest dollar)' value='1' onchange='package(" + id + ")'>" +
            " <div class='input-group-append'>" +
            "<span class='input-group-text'>Kg</span>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "<div class='form-group col-md-2'>" +
            "<label for='inputState" + id + "'>Sub-total</label>" +
            "<div class='input-group'>" +
            "<div class='input-group-append'>" +
            "<span class='input-group-text'>Rp. </span>" +
            "</div>" +
            "<input type='number' class='form-control' id='subtotal" + id + "' name='subtotal" + id + "' aria-label='Amount (to the nearest dollar)' value='0' readonly>" +
            "</div>" +
            "</div>" +
            "<div class='form-group col-md-1 text-center ' style='padding-top: 35px;'>" +
            "<a onclick=\"removeFormField(\'" + 'row' + id + "\');\" class='btn btn-primary btn-sm'>" +
            "<i class='fas fa-trash-alt'></i>" +
            "</a>" +
            "</div>" +
            "</div>"
        );

        id = id - 1 + 2;
        document.getElementById("selectedpackage").value = id;
        document.getElementById("countpackage").value = parseInt(document.getElementById("countpackage").value) + 1;
        console.log(document.getElementById("countpackage").value);
    }

    function removeFormField(id) {

        if (parseInt(document.getElementById("countpackage").value) > 1) {
            $('#' + id).remove();
            document.getElementById("countpackage").value = parseInt(document.getElementById("countpackage").value) - 1;
            calculateTotalPrice()
        } else {
            $("#alertpackage").show();
        }
    }
    $(function() {
        $("[data-hide]").on("click", function() {
            $(this).closest("." + $(this).attr("data-hide")).hide();
        });
    });

    let pack = <?php echo json_encode($packages) ?>

    function package(id) {
        d = document.getElementById(`package${id}`).value;
        let selectedPack = pack[d - 1];
        document.getElementById(`subtotal${id}`).value = selectedPack.price * document.getElementById(`qty${id}`).value;
        calculateTotalPrice()
    }

    function calculateTotalPrice() {
        let total = 0;
        for (let index = 1; index < document.getElementById("selectedpackage").value; index++) {
            if (document.getElementById(`package${index}`) != null) {
                total += parseInt(document.getElementById(`subtotal${index}`).value)
            }
        }
        document.getElementById("delivery").value == 1 ? total += parseInt(document.getElementById("deliv-price").value) : "";
        document.getElementById("totalPrice").value = total
    }
</script>


<!-- /.container-fluid -->

<?= $this->endSection() ?>