<?php
	/* Connect To Database*/
	require_once ("conection/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("conection/conexion2.php");//Contiene funcion que conecta a la base de datos
?>
<?php 
include ('menu_p.php');
$idofic = $_REQUEST['idofic'];
 $_SESSION['idofic'] =$idofic ;
 $sql_caja=mysqli_query($con," select * from caja where idcaja=(select max(c.idcaja) from caja c,oficina_usuario ou where c.idoficina_u=ou.idoficina_u and ou.idoficina=$idofic)");
	$rw_caja=mysqli_fetch_array($sql_caja);
	$detalle_c = $rw_caja['detalle_c'];
 ?>
	
   <div id="page-wrapper">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
		    	<?php
		    		if ($detalle_c=="abierto") {

		    			?>
	<button type='button' class="btn btn-warning" data-toggle="" data-target=""><span class="glyphicon glyphicon-plus" ></span> Caja abierta</button>
		    			<?php
		    		
		    		}else{
		    			?>

		<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevaCaja"><span class="glyphicon glyphicon-plus" ></span> Abrir Caja</button>
		    					<?php
		    		}

		    	 ?>
			
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Cajas</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_cajas.php");
			include("modal/editar_cajas.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Fecha inicial o Fecha final</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Fecha Inicial o Fecha final" onkeyup='load(1);'>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			
		
	
			
			
			
  </div>
</div>
		 
	</div>
		<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/cajas.js"></script>
  <?php
include ('pie_p.php');
 ?>
 

<script>
$( "#guardar_caja" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nueva_caja.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_cajas").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_cajas").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_caja" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_caja.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax2").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax2").html(datos);
			$('#actualizar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

	function obtener_datos(id){
		
			var codigo_caja = $("#codigo_caja"+id).val();
			var fecha_inicial = $("#fecha_inicial"+id).val();
			var observacion_caja = $("#observacion_caja"+id).val();
			var saldo_inicial = $("#saldo_inicial"+id).val();
			var saldo_final = $("#saldo_final"+id).val();
			$("#mod_fechai").val(fecha_inicial);
					$("#mod_precioi").val(saldo_inicial);
						$("#mod_preciof").val(saldo_final);
			$("#mod_id").val(codigo_caja);
	
			$("#mod_observacion").val(observacion_caja);
		
		
		}
</script>