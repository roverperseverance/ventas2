<?php 
include ('menu_p.php');
$idusu = $_REQUEST['txtidusuario'];
$nombres = $_REQUEST['txtnombres'];
$apellidos = $_REQUEST['txtapellidos'];
$celular = $_REQUEST['txtcelular'];
$tipo = $_REQUEST['txttipo'];
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
            $sSQL="Update usuario Set nombres_u='$nombres',apellidos_u='$apellidos',celular_u='$celular',tipo_u='$tipo' where idusuario=$idusu";
     
            if (execute($sSQL) or die (mysqli_error())) {
                ?>
                      <div class="alert alert-info">
                El registro se actualizo correctamente.<a href="usuario_mostrar.php" class="alert-link">Ver</a>.
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
