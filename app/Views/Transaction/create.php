<?= $this->extend('layout/layout') ?>
<?= $this->section('isActiveTransaction') ?>
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
                <h6 class="font-weight-bold text-dark col-md">Create Transaction : </h6>

            </div>

            <!-- <button type="button" class="btn btn-info">Tambah</button> -->
        </div>
        <div class="card-body border-left-primary">
            <form method="post" action="<?= base_url('package/' . "package['id'] " . '/update') ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="custName">Name</label>
                        <input type="text" class="form-control" id="custName" name="custName" placeholder="Ahmad dani" value="<?= $profile[0]->fullname ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNoKTP4">Telephone</label>
                        <input type="int" class="form-control" id="price" name="price" placeholder="10000" value="<?= $profile[0]->telephone ?>">

                    </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-3">
                        <label for="inputNoKTP4">Delivery</label>
                        <select id="package1w" class="form-control" onchange="package(1)">
                            <option selected disabled>Is Delvery?</option>
                            <option value="delivery">Delivery</option>
                            <option value="no">To Outlet</option>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputNoKTP4">Label</label>
                        <input type="text" class="form-control group-text" id="price" name="price" placeholder="10000" value="<?= $address[0]->name ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="address">Address</label>
                        <textarea disabled class="form-control" id="address" name="address" placeholder="Full Address"><?php echo $address[0]->address ?></textarea>
                    </div>
                </div>
                <div id="packageContainer">
                <input type="hidden" id="selectedpackage" name="selectedpackage" value="2">
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="package1">Package</label>
                        <select id="package1" class="form-control" onchange="package(1)">
                            <option selected disabled>Select Package</option>
                            <?php foreach ($packages as $key => $package) : ?>
                                <option value="<?php echo $package->id ?>"><?php echo $package->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="qty1">Qty</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="qty1" aria-label="Amount (to the nearest dollar)" value="1" onchange="package(1)">
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
                            <input type="text" class="form-control" id="subtotal1" aria-label="Amount (to the nearest dollar)" value="0" disabled>

                        </div>
                    </div>

                </div>
                </div>
                

                <div class="form-row justify-content-md-center border-bottom border-grey">
                    <div class="form-group ">
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
                            <input id="totalPrice" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" value="124000" disabled>

                        </div>
                    </div>
                </div>
                <button type="submit" id="simpan" class="btn btn-success" onclick="" >Simpan</button>
            </form>
        </div>
    </div>
    <script>
        let index = 1;

        function addFormField() {
            var id = document.getElementById("selectedpackage").value;;
            $("#packageContainer").append(
                "<div class='form-row'>"+
                "<div id='row"+id+"' class='form-group col-md-9'>"+
                        "<label for='package"+id+"'>Package</label>"+
                        "<select id='package"+id+"' class='form-control' onchange='package("+id+")'>"+
                        "<option selected disabled>Select Package</option>"+
                        "<?php foreach ($packages as $key => $package) : ?>"+
                             "<option value='<?php echo $package->id ?>'><?php echo $package->name ?></option>"+
                            "<?php endforeach ?>"+
                        "</select>"+
                    "</div>"+
                    "<div class='form-group col-md-1'>"+
                        "<label for='qty"+id+"'>Qty</label>"+
                        "<div class='input-group'>"+
                            "<input type='text' class='form-control' id='qty"+id+"' aria-label='Amount (to the nearest dollar)' value='1' onchange='package("+id+")'>"+
                           " <div class='input-group-append'>"+
                                "<span class='input-group-text'>Kg</span>"+
                            "</div>"+
                        "</div>"+
                    "</div>"+
                    "<div class='form-group col-md-2'>"+
                        "<label for='inputState"+id+"'>Sub-total</label>"+
                        "<div class='input-group'>"+
                            "<div class='input-group-append'>"+
                                "<span class='input-group-text'>Rp. </span>"+
                            "</div>"+
                            "<input type='text' class='form-control' id='subtotal"+id+"' aria-label='Amount (to the nearest dollar)' value='0' disabled>"+

                        "</div>"+
                        "</div>"
            );

            id = id - 1 + 2;
            document.getElementById("selectedpackage").value = id;
        }

        function removeFormField(id) {
            $(id).remove();
        }

        function createNewInputFields() {
            var container = document.getElementById('packageContainer');

            const newElem = document.createElement("input");
            newElem.setAttribute("type", "text");
            container.appendChild(newElem);
        }
        let pack = <?php echo json_encode($packages) ?>

        function package(id) {
            d = document.getElementById(`package${id}`).value;
            let selectedPack = pack[d - 1];
            console.log(d)
            document.getElementById(`subtotal${id}`).value = selectedPack.price * document.getElementById(`qty${id}`).value;
            
        }

        let edit = (el) => {
            el.disabled = true
            document.getElementById('simpan').disabled = false;
            document.getElementById('cancel').disabled = false;
            document.getElementById('name').disabled = false;
            document.getElementById('price').disabled = false;
        }

        function cancel(el) {
            el.disabled = true
            document.getElementById('simpan').disabled = true;
            document.getElementById('edit').disabled = false;
            document.getElementById('name').disabled = true;
            document.getElementById('price').disabled = true;
        }
    </script>

</div>
<!-- /.container-fluid -->

<?= $this->endSection() ?>