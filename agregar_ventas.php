<?php
include('is_logged.php');
$session_id= session_id();
if (isset($_POST['id'])){$id=$_POST['id'];}
if (isset($_POST['cantidad'])){$cantidad=$_POST['cantidad'];}
if (isset($_POST['precio_venta'])){$precio_venta=$_POST['precio_venta'];}

	/* Connect To Database*/
	require_once ("../conection/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("../conection/conexion2.php");//Contiene funcion que conecta a la base de datos
	//Archivo de funciones PHP
	include("../funciones.php");
if (!empty($id) and !empty($cantidad) and !empty($precio_venta))
{
$insert_tmp=mysqli_query($con, "INSERT INTO tmp (iddetalle_p,cantidad_tmp,precio_tmp,session_id) VALUES ('$id','$cantidad','$precio_venta','$session_id')");

	$sql_stock2=mysqli_query($con,"select * from detalle_p  where  iddetalle_p='$id'");
	$rw_stock2=mysqli_fetch_array($sql_stock2);
	$stockp2 = $rw_stock2['stock'];
	$stock2 = $stockp2 - $cantidad;
	$insert_detail1=mysqli_query($con, "UPDATE detalle_p SET stock='".$stock2."' WHERE iddetalle_p='".$id."'");

}
if (isset($_GET['id']))//codigo elimina un elemento del array
{
$id_tmp=intval($_GET['id']);	



$sql_stock=mysqli_query($con,"select * from tmp t,detalle_p dp where t.iddetalle_p=dp.iddetalle_p and id_tmp='$id_tmp'");
	$rw_stock=mysqli_fetch_array($sql_stock);
	$iddetalle_p2 = $rw_stock['iddetalle_p'];
	$stockp = $rw_stock['stock'];
	$cantidad1 = $rw_stock['cantidad_tmp'];
	$stock = $stockp + $cantidad1;
	$insert_detail2=mysqli_query($con, "UPDATE detalle_p SET stock='".$stock."' WHERE iddetalle_p='".$iddetalle_p2."'");

	$delete=mysqli_query($con, "DELETE FROM tmp WHERE id_tmp='".$id_tmp."'");
}

?>
<table class="table">
<tr>
	<th class='text-center'>CODIGO</th>
	<th class='text-center'>CANT.</th>
	<th class='text-center'>UNID.</th>
	<th>DESCRIPCION</th>
	<th class='text-right'>PRECIO UNIT.</th>
	<th class='text-right'>PRECIO TOTAL</th>
	<th></th>
</tr>
<?php
	$sumador_total=0;
	$sql=mysqli_query($con, "	SELECT * FROM `tmp` t,detalle_p dp,unidad u,oficina_producto op,producto p where t.session_id='".$session_id."' and t.iddetalle_p=dp.iddetalle_p and dp.idunidad=u.idunidad and dp.idoficina_p=op.idoficina_p and op.idproducto=p.idproducto");


	while ($row=mysqli_fetch_array($sql))
	{
	$id_tmp=$row["id_tmp"];
	$codigo_producto=$row['cod_p'];
	$cantidad=$row['cantidad_tmp'];
	$unidad=$row['descripcion_u'];
	$nombre_producto=$row['descripcion_p'];
	$precio_venta=$row['precio_tmp'];
	$precio_venta_f=number_format($precio_venta,2);//Formateo variables
	$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
	$precio_total=$precio_venta_r*$cantidad;
	$precio_total_f=number_format($precio_total,2);//Precio total formateado
	$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
	$sumador_total+=$precio_total_r;//Sumador
	
		?>
		<tr>
			<td class='text-center'><?php echo $codigo_producto;?></td>
			<td class='text-center'><?php echo $cantidad;?></td>
			<td class='text-center'><?php echo $unidad;?></td>
			<td><?php echo $nombre_producto;?></td>
			<td class='text-right'><?php echo $precio_venta_f;?></td>
			<td class='text-right'><?php echo $precio_total_f;?></td>
			<td class='text-center'><a href="#" onclick="eliminar('<?php echo $id_tmp ?>')"><i class="glyphicon glyphicon-trash"></i></a></td>
		</tr>		
		<?php
	}
	$impuesto=0;
	$subtotal=number_format($sumador_total,2,'.','');
	$total_iva=($subtotal * $impuesto )/100;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;

?>
<tr>
	<td></td>
	<td class='text-right' colspan=4>SUBTOTAL <?php "S/.";?></td>
	<td class='text-right'><?php echo number_format($subtotal,2);?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class='text-right' colspan=4>IVA (<?php echo $impuesto;?>)% <?php echo "S/.";?></td>
	<td class='text-right'><?php echo number_format($total_iva,2);?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td class='text-right' colspan=4>TOTAL <?php echo "S/.";?></td>
	<td class='text-right'><?php echo number_format($total_factura,2);?></td>
	<td></td>
</tr>
</table>
