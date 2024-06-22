<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary aside-color elevation-4">
    <!-- Brand Logo -->
    <div class="container">
        <div class="row">
            <a href="<?= base_url() ?>" class="brand-link" style="align-content: space-between;">
                
                <span class="brand-text ml-5"><b>Dashboard</b></span>
            </a>
        </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item mt-5">
                    <a href="<?php echo base_url()?>" class="nav-link">
                        <i class="fas fa-house-user fa-lg ml-1"></i>
                        <p><b>Inicio</b> </p>
                    </a>
                </li>


                <li class="nav-item mt-2">
                    <a href="<?php echo base_url('/principal/administration') ?>" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                        <p><b>Administración</b> </p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>