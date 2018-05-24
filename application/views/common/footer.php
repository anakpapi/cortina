<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- jQuery -->
    <script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
    <!-- validator -->
    <script src="<?php echo base_url('vendors/validator/validator.js');?>"></script>
	<!-- Datatables -->
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Fontawesome -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('assets/js/custom.min.js');?>"></script>

    
	<script>
	$(document).ready( function () {
	    $('#myTable').DataTable();
	} );
	</script>

  </body>
</html>