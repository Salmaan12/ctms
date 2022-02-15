
      
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>


</div>

<script src="frontend/plugins/jquery/jquery.min.js"></script>

<script src="frontend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="frontend/dist/js/adminlte.js"></script>

<script src="frontend/plugins/chart.js/Chart.min.js"></script>

<script src="frontend/dist/js/demo.js"></script>

<script src="frontend/dist/js/pages/dashboard3.js"></script>


<script src="frontend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="frontend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="frontend/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="frontend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="frontend/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="frontend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="frontend/plugins/jszip/jszip.min.js"></script>
<script src="frontend/plugins/pdfmake/pdfmake.min.js"></script>
<script src="frontend/plugins/pdfmake/vfs_fonts.js"></script>
<script src="frontend/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="frontend/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="frontend/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
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
  });
</script>
</body>
</html>
