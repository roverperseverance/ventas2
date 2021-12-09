<?php 
include ('menu_p.php');

 ?>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


 <?php 
$result=execute("SELECT * FROM oficina o,oficina_usuario ou,usuario u where o.idoficina=ou.idoficina and ou.idusuario=u.idusuario and u.idusuario='$idu'");
if ($row=data($result))
{

 
  do {
 
    
?>
     <div class="col-lg-3 col-md-6">
          <?php 
                    if ($row['estado_o']==1) {
                      ?>
                            <div class="panel panel-primary">
                        <?php
                              }else{
                     ?>
                           <div class="panel panel-warning">
                             <?php
                    }
                    ?>
                  
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                   <i class="fa fa-institution fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $row["razon_social_o"]; ?></div>
                                    <div><?php echo $row["direccion_o"]; ?></div>
                                      <div><?php echo $row["telefono_o"]; ?></div>
                                </div>
                            </div>
                        </div>
                     <!--
                        <a href="principal_mostrar.php?idofic=<?php // echo $row['idoficina'];?>">
                            <div class="panel-footer">
                                <span class="pull-left"><?php // echo $row["ciudad_o"]; ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    -->
                    <?php 
                    if ($row['estado_o']==1) {
                      ?>
                           <form action="principal_mostrar.php" method="post">
                        <?php
                              }else{
                     ?>
                         <form action="#.php" method="post">
                             <?php
                    }
                    ?>
                         <input type="hidden" name="idofic" value="<?php echo $row['idoficina'];?>">
                     <a href="#">
                            <div class="panel-footer">
                                 <button type="submit" class="btn btn-xs btn-white form-control">
                                <span class="pull-left"><?php echo $row["ciudad_o"]; ?></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                                 </button>
                            </div>
                        </a>
                  
                        </form>
                 
                
                 
                        
                    </div>
                </div>
   
    <?php



  }while ($row=data($result));

}
else
{
  
  ?>
  <div class="alert alert-info">
                No se encontro ningun registro
            </div>
            <?php
}

?>


               
              
              
           
            </div>
            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php 
include ('pie_p.php');

 ?>