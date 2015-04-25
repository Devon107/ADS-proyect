<?php $titulo = "Promociones"; //Titulo1 es el que va a ir en el <title>
include("./base/header.php"); /* $titulo debe estar antes de include() */
$titulo2 = "Promociones"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php"); /* $titulo2 debe estar antes de include() */
include("./base/menu.php"); 
include('./config/db.php');
$conn=get_db_conn();
$sql="SELECT nombre from producto";
$consulta=mysql_query($sql,$conn);
	?>
	<div class="row">
		<div class="large-9 push-3 columns">
	<form action="../php ingresos/Promociones.php" method="POST">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>Fecha Inicio</td>
				<td><input type="date" name="Fecha" requiered></td>
			</tr>
			<tr>
				<td>Dias Disponibles</td>
				<td><input type="Number" min="1" value="1" name="Dias" requiered></td>
			</tr>
			<tr>
				<td>Descuento</td>
				<td><input type="number" name="Descuento" required value="5" min="5" max="75"></td>
			</tr>
			<tr>
				<td>Producto</td>
				<td><select name="Producto">
					<?php while($row = mysql_fetch_assoc($consulta)){
												?><option><?php echo $row['nombre'];
					 }?>
				</option>
				</select></td>
			</tr>
			<tr>
				<td>Condición de Compra</td>
				<td><input type="text" name="Condicion"></td>
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