<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <!-- <b>Version</b> 3.2.0 -->
    </div>
   <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- libreria de axios -->
<script src="<?php echo constant('URL') ?>assets/js/axios.min.js"></script>
<!-- jQuery -->
<script src="<?php echo constant('URL') ?>libs/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo constant('URL') ?>libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo constant('URL') ?>libs/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo constant('URL') ?>libs/dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo constant('URL') ?>libs/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo constant('URL') ?>libs/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo constant('URL') ?>libs/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo constant('URL') ?>libs/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo constant('URL') ?>libs/plugins/toastr/toastr.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        bsCustomFileInput.init();
    });
</script>
</body>

</html>