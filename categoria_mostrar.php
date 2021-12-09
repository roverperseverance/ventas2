  
<?php 
include ('menu_p.php');
$query = "SELECT * FROM categoria ORDER BY idcategoria DESC";
$result = execute($query);
 ?>
 <div id="page-wrapper">
          
                         <div align="right"><br>
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-primary btn-sm">Nuevo</button>

    </div><br>
          <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            CATEGORIA MOSTRAR
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                 <div class="table-responsive">
                                       <div id="employee_table">
                                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                    <tr class="info" align="center">
                                       <th>ID</th> 
                                     <th>NOMBRE</th>  
                                     <th>DESCRIPCION</th>  
                                       <th>ACCIONES</th>  
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    while($row = data($result))
                                    {
                                    ?>
                                    <tr class="odd gradeX">
                                      <td class="info"><?php echo $row["idcategoria"]; ?></td>
                                     <td><?php echo $row["nombre_c"]; ?></td>
                                     <td><?php echo $row["descripcion_c"]; ?></td>                                      
                                     <td>
      <!--
                                           <a  class="btn-xs btn-warning" href="categoria_modificar.php?idcat=<?php echo $row['idcategoria'];?>">Modificar</a>-->
                                               <form action="categoria_modificar.php" method="post">
<input type="hidden" name="idcat" value="<?php echo $row['idcategoria'];?>">             
<button type="submit" class="btn btn-xs btn-warning">Modificar</button>
  </form><!--
                                            <a  class="btn-xs btn-danger" onclick="return confirm('Seguro que desea Eliminar');"  href="categoria_eliminar.php?idcat=<?php echo $row['idcategoria'];?>">Eliminar</a>-->
                        <form action="categoria_eliminar.php" method="post">
<input type="hidden" name="idcat" value="<?php echo $row['idcategoria'];?>">             
<button type="submit" onclick="return confirm('Seguro que desea Eliminar');" class="btn btn-xs btn-danger">Eliminar</button>
  </form>

                                     </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                  </tbody>
                                   </table>
                            </div>
                                 </div>  


                                         </div>
                        <!-- /.panel-body -->
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

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Ingresar Categoria</h4>
   </div>
   <div class="modal-body">
    <form autocomplete="off" method="post" id="insert_form">
      <div class="col-lg-6">
                                  
                                       <div class="form-group">
                                              <label>Ingrese nombres</label>
                                            <input  tabindex="1" required name="txtnombres" id="name" type="text" class="form-control" placeholder="Ingrese nombres">

                                        </div>
  
                                </div>
                                 <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Descripcion</label>
                                            <input tabindex="2"  name="txtdescripcion" id="descripcion" type="text" class="form-control" placeholder="Ingrese descripcion">

                                        </div>
                   
                                 </div>
                                <!-- /.col-lg-6 (nested) -->
 
    </div>
   <div class="modal-footer">
    <input tabindex="9" type="submit" name="insert" id="insert" value="Ingresar categoria" class="btn btn-primary" />
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
   </div>
     </form>
  </div>
 </div>
</div>


<script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name').val() == "")  
  {  
   alert("Name is required");  
  }  
  else  
  {  
   $.ajax({  
    url:"categoria_insertar.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });

});  
 </script>  


  <?php
include ('pie_p.php');
 ?>
