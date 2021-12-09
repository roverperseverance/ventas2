<?php
	/* Connect To Database*/
	require_once ("conection/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("conection/conexion2.php");//Contiene funcion que conecta a la base de datos
	

?>

<?php 
include ('menu_p.php');
$idventa = $_REQUEST['idventa'];
 $_SESSION['idventa'] =$idventa ;
 $idofic = $_SESSION['idofic'];
	$_SESSION['idofic']=$idofic ;
 ?>
	
   <div id="page-wrapper">
	<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoEstado"><span class="glyphicon glyphicon-plus" ></span> Nuevo</button>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar</h4>
		</div>
		<div class="panel-body">
		
			
			
			<?php
			include("modal/registro_estado_v.php");
			include("modal/editar_estado_v.php");
			?>
			<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Fecha a pagar o Fecha pagada</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Fecha a pagar o Fecha Pagada" onkeyup='load(1);'>
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
	<script type="text/javascript" src="js/estados_v.js"></script>
  <?php
include ('pie_p.php');
 ?>
 

<script>
$( "#guardar_estado" ).submit(function( event ) {
  $('#guardar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/nuevo_estado_v.php",
			data: parametros,
			 beforeSend: function(objeto){
				$("#resultados_ajax_estados").html("Mensaje: Cargando...");
			  },
			success: function(datos){
			$("#resultados_ajax_estados").html(datos);
			$('#guardar_datos').attr("disabled", false);
			load(1);
		  }
	});
  event.preventDefault();
})

$( "#editar_estado" ).submit(function( event ) {
  $('#actualizar_datos').attr("disabled", true);
  
 var parametros = $(this).serialize();
	 $.ajax({
			type: "POST",
			url: "ajax/editar_estado_v.php",
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
  setInterval("actualizar()",100);
})

	function obtener_datos(id){
		
			var codigo_estados = $("#codigo_estados"+id).val();
			var fecha_inicial = $("#fecha_inicial"+id).val();
			var detalle_estado = $("#detalle_estado"+id).val();

			$("#mod_fechai").val(fecha_inicial);
			$("#mod_id").val(codigo_estados);
			$("#mod_detalle").val(detalle_estado);
		
		
		}
</script>
<script type="text/javascript">
  function actualizar(){location.reload();}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  
</script>