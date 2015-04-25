<?php $titulo = "Ofertas"; //Titulo1 es el que va a ir en el <title>
include("./base/header.php"); /* $titulo debe estar antes de include() */
$titulo2 = "Ofertas"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php"); /* $titulo2 debe estar antes de include() */
include("./base/menu.php"); 
include('./config/db.php');
$conn=get_db_conn();
$sql="SELECT nombre from producto";
$consulta=mysql_query($sql,$conn);
	?>
	<div class="row">
		<div class="large-9 push-3 columns">
	<form action="../php ingresos/Ofertas.php" method="POST">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>Disponible</td>
				<td><input type="Number" min="1" value="1" name="disponible" requiered></td>
			</tr>
			<tr>
				<td>Precio</td>
				<td><input name="precio" required value="5.00" pattern="^[0-9]+(\.[0-9]{2})$" max="75"></td>
			</tr>
			<tr>
				<td>Producto</td>				
				<td><select name="producto">
					<?php					
					while($row = mysql_fetch_assoc($consulta)){
					?><option><?php echo $row['nombre'];
					 }?>
				</option>
				</select></td>
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