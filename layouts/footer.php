</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="libs/vendor/jquery/jquery.min.js"></script>
<script src="libs/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="libs/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="libs/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="libs/vendor/chart.js/Chart.min.js"></script>
<script src="libs/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="libs/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="libs/js/demo/chart-area-demo.js"></script>
<script src="libs/js/demo/chart-pie-demo.js"></script>
<script src="libs/js/demo/datatables-demo.js"></script>
<script type="text/javascript" src="libs/js/functions.js"></script>

<script>
  $(document).ready(function() {
    $('#table-highest-selling-products').DataTable();
    $('#table-recent-sales').DataTable();
    $('#group-table').DataTable();
    $('#user-table').DataTable();
    $('#category-table').DataTable();
    $('#product-table').DataTable();
    $('#media-table').DataTable();
    $('#sales-table').DataTable();
    $('#sale-table').DataTable();
    $('#monthly-sales-table').DataTable();
    $('#daily-sales-table').DataTable();
  });
</script>

</body>

</html>

<?php if (isset($db)) {
  $db->db_disconnect();
} ?>