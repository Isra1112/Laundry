<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(''); ?>/dashboard">
        <div class="sidebar-brand-icon">
            <i class="fab fa-cotton-bureau"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>MS</sup>Laundry </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <?php if (in_groups(['admin', 'staff'])) : ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $this->renderSection('isActiveDashboard') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif ?>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- <?php if (in_groups(['admin'])) : ?>
        
        <li class="nav-item <?= $this->renderSection('isActiveCustomer') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/customer">
                <i class="fas fa-users"></i>
                <span>Customer</span>
            </a>
        </li>
    <?php endif ?> -->

    <?php if (in_groups(['admin'])) : ?>
        <div class="sidebar-heading">
            People
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= $this->renderSection('isActiveUser') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/user">
                <i class="fas fa-user-tie"></i>
                <span>User</span>
            </a>
        </li>
    <?php endif ?>

    <?php if (in_groups('user')) : ?>
        <div class="sidebar-heading">
            Setting
        </div>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= $this->renderSection('isActiveProfile') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/profile">
                <i class="fas fa-user-md"></i>
                <span>Profile</span>
            </a>
        </li>
    <?php endif ?>

    <?php if (in_groups('user')) : ?>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?= $this->renderSection('isActiveAddress') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/address">
                <i class="far fa-address-card"></i>
                <span>Address</span>
            </a>
        </li>
    <?php endif ?>



    <?php if (in_groups(['user', 'admin'])) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif ?>

    <!-- Heading -->
    <div class="sidebar-heading">
        Order
    </div>

    <?php if (in_groups(['user'])) : ?>
        <li class="nav-item <?= $this->renderSection('isActiveCollapseTransaction') ?>">
            <a class="nav-link " href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-exchange-alt"></i>
                <span>Transaction</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">List:</h6>
                    <?php if (in_groups(['admin', 'staff'])) : ?>
                        <a class="collapse-item <?= $this->renderSection('isActiveTransaksi') ?>" href="<?php echo base_url(); ?>/transaction">Transaction List</a>
                    <?php endif ?>
                    <?php if (in_groups('user')) : ?>
                        <a class="collapse-item <?= $this->renderSection('isActiveNewTransaction') ?>" href="<?php echo base_url('transaction/create') ?>">New Transaction</a>
                        <a class="collapse-item <?= $this->renderSection('isActiveHistory') ?>" href="<?php echo base_url('transaction/history') ?>">History</a>
                    <?php endif ?>
                </div>
            </div>
        </li>
    <?php endif ?>

    <?php if (in_groups(['admin', 'staff'])) : ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= $this->renderSection('isActiveTransaksi') ?>">
            <a class="nav-link collapsed" href="<?php echo base_url(); ?>/transaction">
                <i class="fas fa-exchange-alt"></i>
                <span>Transaction</span>
            </a>
        </li>
    <?php endif ?>
    <?php if (in_groups(['staff'])) : ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= $this->renderSection('isActiveToPickUp') ?>">
            <a class="nav-link collapsed" href="<?php echo base_url(); ?>/transaction/topickup">
                <i class="fas fa-truck"></i>
                <span>To Pick Up</span>
            </a>
        </li>
    <?php endif ?>
    <?php if (in_groups(['staff'])) : ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?= $this->renderSection('isActiveToDeliver') ?>">
            <a class="nav-link collapsed" href="<?php echo base_url(); ?>/transaction/todelivery">
                <i class="fas fa-truck-loading"></i>
                <span>To Delivery</span>
            </a>
        </li>
    <?php endif ?>


    <?php if (in_groups(['admin'])) : ?>
        <!-- Nav Item - Charts -->
        <li class="nav-item <?= $this->renderSection('isActivePackage') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/package">
                <i class="fas fa-box"></i>
                <span>Package</span></a>
        </li>
    <?php endif ?>

    <?php if (in_groups(['admin', 'staff'])) : ?>
        <!-- Nav Item - Tables -->
        <li class="nav-item <?= $this->renderSection('isActiveReport') ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>/report">
                <i class="fas fa-file-alt"></i>
                <span>Report</span></a>
        </li>
    <?php endif ?>

    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->
    <?php if (in_groups(['admin', 'user'])) : ?>
        <div class="sidebar-heading">
            Place
        </div>
        <li class="nav-item <?= $this->renderSection('isActiveOutlet') ?>">
            <a class="nav-link collapsed" href="<?php echo base_url(); ?>/outlet">
                <i class="fas fa-map"></i>
                <span>Outlet</span>
            </a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
    <?php endif ?>

    <!-- Divider -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->