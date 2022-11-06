<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon">
            <i class="fab fa-cotton-bureau"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><sup>MS</sup>Laundry </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $this->renderSection('isActiveDashboard') ?>" >
        <a class="nav-link" href="<?php echo base_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        People
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= $this->renderSection('isActiveCustomer') ?>" >
        <a class="nav-link" href="<?php echo base_url(); ?>/customer">
            <i class="fas fa-users"></i>
            <span>Customer</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item <?= $this->renderSection('isActiveUser') ?>" >
        <a class="nav-link" href="<?php echo base_url(); ?>/user">
            <i class="fas fa-user-tie"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Order
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= $this->renderSection('isActiveTransaksi') ?>" >
        <a class="nav-link collapsed" href="<?php echo base_url(); ?>/transaction">
            <i class="fas fa-exchange-alt"></i>
            <span>Transaction</span>
        </a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $this->renderSection('isActivePackage') ?>" >
        <a class="nav-link" href="<?php echo base_url(); ?>/package">
            <i class="fas fa-box"></i>
            <span>Package</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= $this->renderSection('isActiveOutlet') ?>" >
        <a class="nav-link" href="<?php echo base_url(); ?>/report">
            <i class="fas fa-file-alt"></i>
            <span>Report</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->