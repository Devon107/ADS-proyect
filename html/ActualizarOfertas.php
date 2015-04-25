<?php $titulo = "Ofertas"; //Titulo1 es el que va a ir en el <title>
include("./base/header.php"); /* $titulo debe estar antes de include() */
$titulo2 = "Ofertas"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php"); /* $titulo2 debe estar antes de include() */
include("./base/menu.php"); 
include('./config/db.php');
$id=$_GET['ID'];
$conn=get_db_conn();
$sql="SELECT producto,precioventa,disponible from ofertas where idoferta='$id'";
$consulta=mysql_query($sql,$conn);
$row=mysql_fetch_array($consulta);
$producto=$row['producto'];
$precioventa=$row['precioventa'];
$disponible=$row['disponible'];
	?>
	<div class="row">
		<div class="large-9 push-3 columns">
	<form action="../php ingresos/ActualizarOferta.php" method="POST">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>ID</td>
				<td><input type="text" min="1" value="<?php echo $id?>" readonly name="id" requiered></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td><input type="text" name="precio" required value="<?php echo $precioventa?>" pattern="^[0-9]+(\.[0-9]{2})$" max="75"></td>
			</tr>
			<tr>
				<td>Producto</td>				
				<td><input type="text" required value="<?php echo $producto?>" name="producto" readonly></td>
			</tr>
			<tr>
				<td>Disponible</td>
				<td><input type="text" required name="disponible" value="<?php echo $disponible?>" pattern="^[0-9]{1,3}"></td>
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