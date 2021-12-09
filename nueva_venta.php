<?php
	require_once ("../pages/conection/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../pages/conection/conexion2.php");//Contiene funcion que conecta a la base de datos
?>
<?php 
include ('menu_p1.php');
$idofic = $_REQUEST['idofic'];
$_SESSION['idofic'] =$idofic;
	$tipou=$_SESSION['tipo_u'] ;
	$_SESSION['tipo_u']=$tipou;
 ?>
<div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Nueva Venta</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");//nose
			include("modal/registro_cliente.php");
	
		
		?>
			<form class="form-horizontal" role="form" id="datos_venta">
				<div class="form-group row">
				  <label for="nombres_c" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombres_c" placeholder="Selecciona un Cliente" required>
					  <input id="idcliente" type='hidden'>	
				  </div>
				  <label for="telefono_c" class="col-md-1 control-label">Teléfono</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="telefono_c" placeholder="Teléfono" readonly>
							</div>
					<label for="correo_c" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="correo_c" placeholder="Email" readonly>
							</div>
				 </div>
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Usuario</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="idvendedor">
									<?php
										$sql_vendedor=mysqli_query($con,"select * from usuario u,oficina_usuario ou where u.idusuario=ou.idusuario and ou.idoficina=$idofic and u.idusuario=$idu order by u.nombres_u");
										while ($rw=mysqli_fetch_array($sql_vendedor)){
											$id_vendedor=$rw["idusuario"];
											$nombre_vendedor=$rw["nombres_u"]." ".$rw["apellidos_u"];
											if ($id_vendedor==$_SESSION['idusuario']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $id_vendedor?>" <?php echo $selected;?>><?php echo $nombre_vendedor?></option>
											<?php
										}
									?>
								</select>
							</div>
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo date("d/m/Y");?>" readonly>
							</div>
							  <label class="col-md-1 control-label">ID</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" name="idofic" id="idofic" required value="<?php echo $idofic?>" readonly >			
				  </div>
					
						</div>
				<div class="form-group row">
						<label for="email" class="col-md-1 control-label">Tipo documento</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="idtipo_d">
									<?php
										$sql_tipodoc=mysqli_query($con,"select * from tipo_doc");
										while ($rw2=mysqli_fetch_array($sql_tipodoc)){
											$idtipo_d=$rw2["idtipo_d"];
											$descripcion_d=$rw2["descripcion_d"];
											if ($idtipo_d==$_SESSION['idtipo_d']){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $idtipo_d?>" <?php echo $selected;?>><?php echo $descripcion_d?></option>
											<?php
										}
									?>
								</select>
							</div>
					  <label for="n_operacion" class="col-md-1 control-label">N operacion</label>
							<div class="col-md-2">
								<input required type="text" class="form-control input-sm" id="n_operacion_v" placeholder="N operacion" >
							</div>
					<label for="correo_p" class="col-md-1 control-label">Observacion</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="observaciones_v" placeholder="Observaciones" >
							</div>
				
				</div>
				
				<div class="col-md-12">
					<div class="pull-right">
						<!--
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo producto
						</button>
					-->
					<button type="button" class="btn btn-default" onclick="actualizar()">
						  <span class="glyphicon glyphicon-refresh"></span> Actualizar Pagina
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo cliente
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
					
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
					
					</div>	
				</div>
			</form>	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
		</div>
	</div>			
         <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</div>

		<!-- <script src="simplevoice/js/bootstrap.min.js" ></script>-->
<!-- <script src="../vendor/jquery/jquery.min.js"></script> -->

	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>-->
 <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/nueva_venta.js"></script>
<!--
	<link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <script src="jqueryui/jquery-ui.js"></script>
-->
   <!-- 	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
<link rel="stylesheet" href="jqueryui/jquery-ui.css">
    <script src="jqueryui/jquery-ui.js"></script>

	<script>
		$(function() {
						$("#nombres_c").autocomplete({
							source: "./ajax/autocomplete/cliente.php",
							minLength: 2,
							select: function(event, ui) {
								event.preventDefault();
								$('#idcliente').val(ui.item.idcliente);
								$('#nombres_c').val(ui.item.nombres_c);
								$('#telefono_c').val(ui.item.telefono_c);
								$('#correo_c').val(ui.item.correo_c);
							 }
						});	
					});
					
	$("#nombres_c" ).on( "keydown", function( event ) {
						if (event.keyCode== $.ui.keyCode.LEFT || event.keyCode== $.ui.keyCode.RIGHT || event.keyCode== $.ui.keyCode.UP || event.keyCode== $.ui.keyCode.DOWN || event.keyCode== $.ui.keyCode.DELETE || event.keyCode== $.ui.keyCode.BACKSPACE )
						{
							$("#idcliente").val("");
							$("#telefono_c").val("");
							$("#correo_c").val("");
											
						}
						if (event.keyCode==$.ui.keyCode.DELETE){
							$("#nombres_c").val("");
							$("#idcliente").val("");
							$("#telefono_c" ).val("");
							$("#correo_c" ).val("");
						}
			});	
	</script>
	 <script type="text/javascript">
  function actualizar(){location.reload();}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  
</script>
<?php 
include ('pie_p1.php');
 ?>
