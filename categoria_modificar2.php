<?php 
include ('menu_p.php');
$idcat = $_REQUEST['txtidcategoria'];
$nombre = $_REQUEST['txtnombre'];
$descripcion = $_REQUEST['txtdescripcion'];

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
            $sSQL="Update categoria Set nombre_c='$nombre',descripcion_c='$descripcion' where idcategoria=$idcat";
     
            if (execute($sSQL) or die (mysqli_error())) {
                ?>
                      <div class="alert alert-info">
                El registro se actualizo correctamente.<a href="categoria_mostrar.php" class="alert-link">Ver</a>.
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
