  
<?php 
include ('menu_p.php');
$idofic = $_REQUEST['idofic'];
 $_SESSION['idofic'] =$idofic ;
//	include("conection/db.php");
//	include("conection/conexion2.php");
 $sql_caja=execute(" select * from caja where idcaja=(select max(c.idcaja) from caja c,oficina_usuario ou where c.idoficina_u=ou.idoficina_u and ou.idoficina=$idofic)");
	$rw_caja=data($sql_caja);
	$detalle_c = $rw_caja['detalle_c'];
 $_SESSION['detalle_c'] =$detalle_c ;
 ?>
<div id="page-wrapper">
          
            
      
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
		    	<?php
		    		if ($detalle_c=="abierto") {

		    			?><!--
		    					<a  href="nueva_venta.php?idofic=<?php echo $idofic;?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> Nueva Venta</a>-->

		    					<form action="nueva_venta.php" method="post">
<input type="hidden" name="idofic" value="<?php echo $idofic;?>">             
<button type="submit" class="btn  btn-info"><span class="glyphicon glyphicon-plus" ></span>Nueva Venta</button>
  </form>

		    			<?php
		    		
		    		}else{
		    			?>
		    				<a  href="" class="btn btn-danger"><span class="glyphicon glyphicon-plus" ></span> Caja cerrada</a>
		    				<?php
		    		}

		    	 ?>
	
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Buscar Ventas</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_cotizacion">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Cliente o # de venta</label>
						
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Razon social Cliente o # de venta" onkeyup='load(1);'>
							</div>

		
							
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Buscar</button>
								<span id="loader"></span>
							</div>
								<div class="col-md-2">
													 
<form action="#" method="get" accept-charset="utf-8"> 
  Buscar : <span class="glyphicon glyphicon-search"></span> 
  <input size="10" class="form-control" type="text" id="filtrar5" />
  <div  id="resultado"></div>
 </form>

							</div>
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
         
            <!-- /.row -->
        
            <!-- /.row -->
          
            <!-- /.row -->
</div>


 
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/venta.js"></script>
<script type="text/javascript">
  

  function pagado(idventa)
{
  var id=idventa;
  $.ajax({
        type:"GET",
    url:"ajax/editar_estado_activo_venta.php?id="+id,

    })

setInterval("actualizar()",500);
}

function nopagado(idventa)
{
  var id=idventa;
  $.ajax({
    type:"GET",
    url:"ajax/editar_estado_inactivo_venta.php?id="+id,
    })

  setInterval("actualizar()",500);
}


</script>
<script type="text/javascript">
  function actualizar(){location.reload();}
//Función para actualizar cada 4 segundos(4000 milisegundos)
  
</script>

 <script>
 $(document).ready(function(){
      (function ($) {
        $("#filtrar5").keyup(function(){
                                      
             var rex = new RegExp($(this).val(), 'i');
             $('.buscar tr').hide();
             $('.buscar tr').filter(function(){
              return rex.test($(this).text());
             }).show();
         })
    }(jQuery));
    });

    </script>

 <?php
include ('pie_p.php');
 ?>


 