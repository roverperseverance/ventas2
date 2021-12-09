<?php 
include ('menu_p.php');
$idusu = $_REQUEST['txtidusuario'];
$idoficina = $_REQUEST['txtidoficina'];


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
			if ($idoficina != "seleccione") {
								
			$query_usu="insert into oficina_usuario (idoficina,idusuario) values ('$idoficina','$idusu')";
	


			     if (execute($query_usu) or die (mysqli_error())) {
                ?>
                      <div class="alert alert-info">
                El registro se ingreso correctamente.<a href="usuario_mostrar.php" class="alert-link">Ver</a>.
            </div>
                <?php
            }else{
                  ?>
                      <div class="alert alert-warning">
                Error!.<a href="principal_p.php" class="alert-link">Volver</a>.
                    </div>
                <?php
            }
				
			}
			else
			{
		?>
			<div class="alert alert-danger">
				ERROR! Sleccione.<a href="usuario_mostrar.php" class="alert-link">Volver</a>.
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
