<?php 
include ('menu_p.php');
$idprod = $_REQUEST['txtidproducto'];
$codigo = $_REQUEST['txtcodigo'];
$descripcion = $_REQUEST['txtdescripcion'];
$idcategoria = $_REQUEST['txtidcategoria'];

$nombre_file = mktime().'.jpg';
$posicion = 0;
$origen = $_FILES['archivo']['tmp_name'];
$destino = "fotos/$nombre_file";
move_uploaded_file($origen,$destino);

$idmarca = $_REQUEST['txtidmarca'];
$modelo = $_REQUEST['txtmodelo'];

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
            $sSQL="Update producto Set cod_p='$codigo',descripcion_p='$descripcion',idcategoria='$idcategoria',img_p='$nombre_file',idmarca='$idmarca',modelo_p='$modelo' where idproducto=$idprod";
     
            if (execute($sSQL) or die (mysqli_error())) {
                ?>
                      <div class="alert alert-info">
                El registro se actualizo correctamente.<a href="producto_mostrar.php" class="alert-link">Ver</a>.
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
