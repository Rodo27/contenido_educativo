<!-- jQuery -->
<script src="<?= base_url('public/') ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('public/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/datatables.min.js"></script> -->


<!-- Bootstrap 4 -->
<script src="<?= base_url('public/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('public/') ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<!--<script src="plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<script src="<?= base_url('public/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('public/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('public/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('public/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?= base_url('public/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="<?= base_url('public/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('public/') ?>dist/js/adminlte.js"></script>
<!-- sweet alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.37/sweetalert2.min.js" ></script>
<script src="<?= base_url('public/') ?>plugins/toastr/toastr.min.js"></script>


<!-- Add TinyMCE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.2.0/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    var base_url = "<?=base_url() ?>"
</script>
<?php

    if(!empty($scripts)){
        foreach($scripts as $script){
            echo "<script  src ='".base_url().$script."' >
                </script>";
        }
    }
?>
