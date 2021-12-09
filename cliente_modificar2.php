<?php 
include ('menu_p.php');
$idcli = $_REQUEST['txtidcliente'];
$nombres = $_REQUEST['txtnombres'];
$razonsocial = $_REQUEST['txtrazonsocial'];
$ruc = $_REQUEST['txtruc'];
$dni = $_REQUEST['txtdni'];
$direccion = $_REQUEST['txtdireccion'];
$telefono = $_REQUEST['txttelefono'];
$correo = $_REQUEST['txtcorreo'];
$observacion = $_REQUEST['txtobservacion'];
 ?>
  <div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Alerta
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">                        
         <?php 							
            $sSQL="Update cliente Set nombres_c='$nombres',razon_social_c='$razonsocial',ruc_c='$ruc',dni_c='$dni',direccion_c='$direccion',telefono_c='$telefono',correo_c='$correo',observacion_c='$observacion' where idcliente=$idcli";
            if (execute($sSQL) or die (mysqli_error())) {
                ?>
                      <div class="alert alert-info">
                El registro se actualizo correctamente.<a href="cliente_mostrar.php" class="alert-link">Ver</a>.
            </div>
                <?php
            }else{
                  ?>
                      <div class="alert alert-warning">
                Error!.<a href="principal_p.php" class="alert-link">Volver</a>.
                    </div>
                <?php
            }
           


   ?>
    
                        </div>
                    </div>
                
                </div>     
            </div>     
        </div>
        <!-- /#page-wrapper -->
<?php 
include ('pie_p.php');
 ?>
