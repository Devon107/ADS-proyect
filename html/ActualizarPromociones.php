<?php $titulo = "Promociones"; //Titulo1 es el que va a ir en el <title>
include("./base/header.php"); /* $titulo debe estar antes de include() */
$titulo2 = "Promociones"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php"); /* $titulo2 debe estar antes de include() */
include("./base/menu.php"); 
include('./config/db.php');
$conn=get_db_conn();
$sql="select nombre from producto";
$consulta=mysql_query($sql);
$id=$_GET['ID'];
$datos="select Fecha_inicio,Disponible,Descuento,Producto,Condicion from promocion where ID_Promo='$id'";
$consul=mysql_query($datos);
if(!$consulta)
{
		echo "No se pudo ejecutar con exito la consulta ($consulta) en la BD: " . mysql_error();
		
	}
	if (mysql_num_rows($consul) == 0) {
		echo "No se han encontrado registros.";
	}

$row1=mysql_fetch_array($consul);
	?>
	<div class="row">
		<div class="large-9 push-3 columns">
	<form action="../php ingresos/EditPromociones.php" method="POST">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>ID</td>
				<td><input type="text" name="id" required value="<?php echo $id ?>" readonly></td>
			</tr>
			<tr>
				<td>Fecha Inicio</td>
				<td><input type="date" name="Fecha" value="<?php echo $row1['Fecha_inicio']?>" requiered></td>
			</tr>
			<tr>
				<td>Dias Disponibles</td>
				<td><input type="Number" min="1" value="<?php echo $row1['Disponible']?>" name="Dias" requiered></td>
			</tr>
			<tr>
				<td>Descuento</td>
				<td><input type="number" name="Descuento" value="<?php echo $row1['Descuento']?>" required value="5" min="5" max="75"></td>
			</tr>
			<tr>
				<td>Producto</td>
				<td><select name="Producto">
					<option><?php echo $row1['Producto']?></option>
					<?php while($row = mysql_fetch_assoc($consulta)){
												?><option><?php echo $row['nombre'];
					 }?>
				</option>
				</select></td>
			</tr>
			<tr>
				<td>Condición de Compra</td>
				<td><input type="text" name="Condicion" value="<?php echo $row1['Condicion']?>"></td>
			</tr>
			<tr>
		      <td><div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Insertar"/>
		      </div></td>
		      <td><div align="center">
		        <input type="Reset" name="button" id="button2" value="Limpiar" class='button'/>
		      </div></td>
    		</tr>
		</table>
	</form>
	</div>
</div>
	<?php
	include('../html/base/footer.php');
	?>
</body>
</html>