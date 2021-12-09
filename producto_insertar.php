<?php
include ('conection/dbmodal.php');
if(!empty($_POST))
{
 $output = '';
 $codigo = mysqli_real_escape_string($connect, $_POST["txtcodigo"]);  
    $descripcion = mysqli_real_escape_string($connect, $_POST["txtdescripcion"]);  
    $idcategoria = mysqli_real_escape_string($connect, $_POST["txtidcategoria"]);  
     $idmarca = mysqli_real_escape_string($connect, $_POST["txtidmarca"]);  
    $modelo = mysqli_real_escape_string($connect, $_POST["txtmodelo"]);
    $query = "INSERT INTO producto (cod_p,descripcion_p,idcategoria,idmarca,modelo_p)  
     VALUES('$codigo','$descripcion','$idcategoria','$idmarca','$modelo')";
    if(mysqli_query($connect, $query))
    {
     $output.= '<label class="text-success">Registro Insertado Correctamente</label>';
     $select_query = "SELECT * FROM producto p,categoria c,marca m where p.idcategoria=c.idcategoria and p.idmarca=m.idmarca ORDER BY idproducto DESC";
     $result = mysqli_query($connect, $select_query);
     $output.='
         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                                    <tr class="info" align="center">
                                       <th>ID</th> 
                                     <th>CODIGO</th>  
                                     <th>DESCRIPCION</th>  
                                       <th>CATEGORIA</th>  
                                     <th>MARCA</th>
                                      <th>MODELO</th>
                                              <th>IMG</th> 
                                         <th>ACCIONES</th>
                                    </tr>
                                  </thead> <tbody>';
     while($row = mysqli_fetch_array($result))
     {
      $output .= 
           '<tr class="odd gradeX">
                                <td>'.$row["idproducto"].'</td>
                                     <td>'.$row["cod_p"].'</td>
                                     <td>'.$row["descripcion_p"].'</td>
                                       <td>'.$row["idcategoria"].'</td>
                                               <td>'.$row["idmarca"].'</td>
                                                   <td>'.$row["modelo_p"].'</td>
                                                             <td width="70%"><img  width="80" height="80" src="fotos/'.$row["img_p"].'"/></td> 
                                     <td><input type="button" name="view" value="Detalle" id="'. $row["idproducto"].'" class="btn btn-info btn-xs view_data" />
                                    
                                      <a  class="btn-xs btn-warning" href="producto_modificar.php?idprod='. $row["idproducto"].'" >Modificar</a>
                                          <a  class="btn-xs btn-danger" onclick="return confirm("Seguro que desea Eliminar");"  href="producto_eliminar.php?idprod='. $row['idproducto'].'">Eliminar</a>

                                     </td>
                                    </tr>';
     }
     $output.= '</tbody></table>';
    }
    echo $output;
}
?>