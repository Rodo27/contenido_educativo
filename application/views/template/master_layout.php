<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('template/head'); ?>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <?php $this->load->view('template/navbar'); ?>
            <?php $this->load->view('template/siderbar', array('siderBar' => $sideBar, 'admin' => $admin_section)); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-color: white;">
                <?php $this->load->view($view); ?>
            </div>

            <?php $this->load->view('template/footer'); ?>

        </div>

        <?php $this->load->view('template/scripts', array('scripts' => $scripts)); ?>

    </body>
</html>


