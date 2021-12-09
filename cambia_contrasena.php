<?php 
include ('menu_p.php');
$query="select * from usuario where idusuario='$idu'";
        $query=execute($query);
        $data=data($query);


 ?>
 <div id="page-wrapper">
         <form action="cambia_contrasena2.php" method="POST" accept-charset="utf-8">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
       


<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">CAMBIAR CONTRASEÑA</h3>
  </div>
  <div class="panel-body">
     <div class="row">
          <div class="col-md-4">
            <div class="form-group">
                <label for="first-name">DNI</label>
                <input readonly required type="text"  min="1" class="form-control"  id="first-name" name="txtdni" value="<?php print (nl2br($data['dni_u']));?>" >
     
            </div>
            <div  class="form-group">
                <label for="last-name">Contraseña Actual</label>
                <input required type="password"   class="form-control" placeholder="Ingrese password actual"  name="txtcontra">
            </div>

          </div>
            <div class="col-md-4">
          <div  class="form-group">
                <label for="last-name">Contraseña Nueva</label>
                <input required type="password"   class="form-control" placeholder="Ingrese password nueva"  name="txtcontra1">
            </div>
          

          </div>
              <div class="col-lg-4">
                                         
                                    <div  class="form-group">
                <label for="last-name">Repita contraseña Nueva</label>
                <input required type="password"  class="form-control" placeholder="Repita Password Nueva" id="last-name" name="txtcontra2">
            </div> 
                                    <input style="visibility:hidden" readonly required type="text"      name="txtidusuario" value="<?php print (nl2br($data['idusuario']));?>" >         
                               
                                          
                                       
                                </div>


     </div>
      <div class="panel-footer">
                            <button  tabindex="8" type="submit" class="btn btn-primary">Modificar</button>
                                      
                        </div>
                      </div>
     </div>

        
              </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    </form>
       
</div>
  <?php
include ('pie_p.php');
 ?>