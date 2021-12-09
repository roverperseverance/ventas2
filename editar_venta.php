<?php 
include ('menu_p1.php');
 ?>
<?php
/*
if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../index.php");
		exit;
        }
	*/
	/* Connect To Database*/
	require_once ("conection/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("conection/conexion2.php");//Contiene funcion que conecta a la base de datos
		$idofic = $_SESSION['idofic'];
		$_SESSION['idofic']= $idofic;
	if (isset($_POST['idventa']))
	{
		$idventa=intval($_POST['idventa']);
		$campos="*";
		$sql_venta=mysqli_query($con,"select $campos from venta v, cliente c,oficina_usuario ou,usuario u where v.idcliente=c.idcliente and v.idoficina_u=ou.idoficina_u and ou.idusuario=u.idusuario and v.idventa='".$idventa."'");
		$count=mysqli_num_rows($sql_venta);
		if ($count==1)
		{
				$rw_venta=mysqli_fetch_array($sql_venta);
				$id_cliente=$rw_venta['idcliente'];
				$nombre_cliente=$rw_venta['nombres_c'];
				$telefono_c=$rw_venta['telefono_c'];
				$email_c=$rw_venta['correo_c'];
				$id_usuario_db=$rw_venta['idusuario'];
				$idtipo_d2=$rw_venta['idtipo_d'];
				$n_operacion_v=$rw_venta['n_operacion_v'];
				$observaciones_v=$rw_venta['observaciones_v'];
				$idoficu=$rw_venta['idoficina_u'];
				$fecha_venta=date("d/m/Y", strtotime($rw_venta['fecha_v']));
	
				$estado_venta=$rw_venta['estado_v'];
				$numero_venta=$rw_compra['n_operacion_v'];
				$_SESSION['idventa']=$idventa;
			
		}	
		else
		{
			header("location: ventas.php");
			exit;	
		}
	} 
	else 
	{
		header("location: ventas.php");
		exit;
	}
?>

<div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h4><i class='glyphicon glyphicon-edit'></i> Editar Venta</h4>
		</div>
		<div class="panel-body">
		<?php 
			include("modal/buscar_productos.php");
			include("modal/registro_cliente.php");
			
		?>
			<form class="form-horizontal" role="form" id="datos_venta">
				<div class="form-group row">
				  <label for="nombre_cliente" class="col-md-1 control-label">Cliente</label>
				  <div class="col-md-3">
					  <input type="text" class="form-control input-sm" id="nombres_c" placeholder="Selecciona un cliente" required value="<?php echo $nombre_cliente;?>">
					  <input id="idcliente" name="idcliente" type='hidden' value="<?php echo $id_cliente;?>">	
				  </div>
				  <label for="tel1" class="col-md-1 control-label">Teléfono</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="telefono_c" placeholder="Teléfono" value="<?php echo $telefono_c;?>" readonly>
							</div>
					<label for="mail" class="col-md-1 control-label">Email</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="correo_c" placeholder="Email" readonly value="<?php echo $email_c;?>">
							</div>
				 </div>
						<div class="form-group row">
							<label for="empresa" class="col-md-1 control-label">Usuario</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="idusuario" name="idusuario">
									<?php
										$sql_usuario=mysqli_query($con,"select * from usuario u,oficina_usuario ou where u.idusuario=ou.idusuario and ou.idoficina =$idofic and u.idusuario=$idu");
										while ($rw=mysqli_fetch_array($sql_usuario)){
											$idusuario=$rw["idusuario"];
											$nombre_usuario=$rw["nombres_u"]." ".$rw["apellidos_u"];
											if ($idusuario==$id_usuario_db){
												$selected="selected";
											} else {
												$selected="";
											}
											?>
											<option value="<?php echo $idusuario?>" <?php echo $selected;?>><?php echo $nombre_usuario?></option>
											<?php
										}
									?>
								</select>
							</div>
							<label for="tel2" class="col-md-1 control-label">Fecha</label>
							<div class="col-md-2">
								<input type="text" class="form-control input-sm" id="fecha" value="<?php echo $fecha_venta;?>" readonly>
							</div>
								  <label class="col-md-1 control-label">ID</label>
				  <div class="col-md-2">
					  <input type="text" class="form-control input-sm" name="idofic" id="idofic" required value="<?php echo $idofic?>" readonly >			
				  </div>
					
						
							
						</div>
				<div class="form-group row">
						<label for="email" class="col-md-1 control-label">Tipo documento</label>
							<div class="col-md-3">
								<select class="form-control input-sm" id="idtipo_d" name="idtipo_d">
									<?php
										$sql_tipodoc=mysqli_query($con,"select * from tipo_doc");
										while ($rw2=mysqli_fetch_array($sql_tipodoc)){
											$idtipo_d=$rw2["idtipo_d"];
											$descripcion_d=$rw2["descripcion_d"];
											if ($idtipo_d==$idtipo_d2){
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
					  <label for="telefono_p" class="col-md-1 control-label">N operacion</label>
							<div class="col-md-2">
								<input required type="text" class="form-control input-sm" id="n_operacion_v" name="n_operacion_v" placeholder="N operacion" value="<?php echo $n_operacion_v;?>">
							</div>
					<label for="correo_p" class="col-md-1 control-label">Observacion</label>
							<div class="col-md-3">
								<input type="text" class="form-control input-sm" id="observaciones_v" name="observaciones_v" placeholder="Observaciones" value="<?php echo $observaciones_v;?>" >
							</div>
				
				</div>
				
				<div class="col-md-12">
					<div class="pull-right">
						<button type="submit" class="btn btn-default">
						  <span class="glyphicon glyphicon-refresh"></span> Actualizar datos
						</button>
						<!--
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoProducto">
						 <span class="glyphicon glyphicon-plus"></span> Nuevo producto
						</button>
					-->
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#nuevoCliente">
						 <span class="glyphicon glyphicon-user"></span> Nuevo Cliente
						</button>
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
						 <span class="glyphicon glyphicon-search"></span> Agregar productos
						</button>
						<button type="button" class="btn btn-default" onclick="imprimir_factura('<?php echo $idventa;?>')">
						  <span class="glyphicon glyphicon-print"></span> Imprimir
						</button>
						<button type="button" class="btn btn-default" onclick="actualizar()">
						  <span class="glyphicon glyphicon-refresh"></span> Actualizar Pagina
						</button>
					</div>	
				</div>
			</form>	
			<div class="clearfix"></div>
				<div class="editar_venta" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->	
			
		<div id="resultados" class='col-md-12' style="margin-top:10px"></div><!-- Carga los datos ajax -->			
			
		</div>
	</div>		
		 

          </div>
                <!-- /.col-lg-12 -->
            </div>
</div>
	<hr>
	 <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/editar_venta.js"></script>
	<!--
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
-->
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
							$("#nombres_s").val("");
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