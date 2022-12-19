<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> <?= $this->renderSection('title') ?>MS Laundry</title>
    <!-- leaflet map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />


    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

    <link href="css/tooltip.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>

<body id="page-top" >

    <!-- Page Wrapper -->
    <div id="wrapper" >

        <!-- Sidebar -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" >

            <!-- Main Content -->
            <div id="content" >

                

                <!-- Begin Page Content -->
                <div class="container-fluid " >

                    <!-- Page Heading -->
                    <div class="text-center" style="margin: 10% 0% 25% 0%; ">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="#">&larr; Back to Dashboard</a>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    


    

    <script type="text/javascript">
        function confirmToDelete(el) {
            $("#delete-button").attr("href", el.dataset.href);
            $("#confirm-dialog").modal('show');
        }
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('js/sb-admin-2.min.js'); ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('js/demo/datatables-demo.js'); ?>"></script>

</body>

</html>