<!DOCTYPE html>
<html>
<head>
	<title>Mueblería</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/fontawesome/css/all.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/css/dataTables.bootstrap4.min.css') ?>">
	<script>
		var base_url = '<?php echo base_url() ?>';
	</script>
</head>
<body style="background-color: #D3D0CB;">

	<div class="container" >
	<br><div class="col-sm-12">
      <!-- Menú -->
      <nav class="navbar navbar-expand-lg navbar-dark rounded-top" style="background-color: #393E41;">
        <a class="navbar-brand mx-auto " href="<?php echo base_url(); ?>"> <img src="<?php echo base_url(); ?>/public/img/logo.png" height="90" width="400"> </a>
        
      </nav>
    <div style="background-color: #FFFFFF;">
    	<br><h3 class="text-center">Catálogo de Muebles</h3>
	    <div class="row">
	        <div class="col-sm-11">
	            <button class="btn float-right" style="background-color: #44BBA4; color: #FFFFFF;" data-toggle="modal" data-target="#modalAgregarMueble">
	                <span class="fas fa-user-plus"></span> Agregar Mueble 
	            </button>
	        </div>
	    </div><br>
	    
	    <div class="container">
	    	<div class="row">
	        
		    	<div class="col-sm-12">
		    		<div id="tablaMueblesC"></div>
		    	</div>
		    </div>
	    </div><br>
   </div>

    <!-- Modal de Agregar -->
	<div class="modal fade" id="modalAgregarMueble" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header text-center">
	        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo mueble</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <form id="frmAgregaMueble" autocomplete="off">
	            <label>Nombre de Mueble</label>
	            <input type="text" id="nombre" name="nombre" class="form-control" required="">
	            <label>Tipo de Madera</label>
	            <input type="text" id="tipo" name="tipo" class="form-control" required="">
	            <label>Costo de Venta</label>
	            <input type="number" id="costoV" name="costoVenta" class="form-control" required="">
	            <label>Costo de Compra</label>
	            <input type="number" id="costoC" name="costoCompra" class="form-control" required="">
	            <label>Fecha</label>
	            <input type="text" id="fecha" name="fecha" class="form-control" required="" placeholder="YYYY-MM-DD">
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn" style="background-color: #44BBA4; color: #FFFFFF;" id="btnAgregarMueble">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!--Modal Actualizar-->
	<div class="modal fade" id="modalActualizarMueble" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Actualizar Mueble</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	       <form id="frmAgregaUsuariou" autocomplete="off">
	            <input type="text" id="idMuebleA" name="idMuebleA" hidden="">
	            <label>Nombre de Mueble</label>
	            <input type="text" id="nombreA" name="nombreA" class="form-control" required="">
	            <label>Tipo de Madera</label>
	            <input type="text" id="tipoA" name="tipoA" class="form-control" required="">
	            <label>Costo de Venta</label>
	            <input type="number" id="costoVentaA" name="costoVentaA" class="form-control" required="">
	            <label>Costo de Compra</label>
	            <input type="number" id="costoCompraA" name="costoCompraA" class="form-control" required="">
	            <label>Fecha</label>
	            <input type="text" id="fechaA" name="fechaA" class="form-control" required="" >
	       </form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="button" class="btn"style="background-color: #44BBA4; color: #FFFFFF;" onclick="actualizarMueble()">Actualizar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<script src="<?php echo base_url('public/js/jquery-3.4.1.min.js') ?>"></script>
	<script src="<?php echo base_url('public/js/popper.min.js');?>"></script>
	<script src="<?php echo base_url('public/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('public/js/sweetalert.min.js');?>"></script>
	<script src="<?php echo base_url('public/js/jquery.dataTables.min.js') ?>"></script>
	<script src="<?php echo base_url('public/js/dataTables.bootstrap4.min.js') ?>"></script>
	<script src="<?php echo base_url('public/js/muebles.js') ?>"></script>
</body>
</html>