<?php $titulo = "Consignaciones"; //Titulo1 es el que va a ir en el <title>
include("./base/header.php"); /* $titulo debe estar antes de include() */
$titulo2 = "Consignaciones"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php"); /* $titulo2 debe estar antes de include() */
include("./base/menu.php"); 
	?>

	<div class="row">
		<div class="large-9 push-3 columns">
	<form action="../php ingresos/Consignaciones.php" method="POST">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>Primer Nombre</td>
				<td><input type="text" name="PrimerNom" required pattern="[a-zA-Záéíóú]+" required></td>
			</tr>
			<tr>
				<td>Segundo nombre</td>
				<td><input type="text" name="SecNom" pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Primer Apellido</td>
				<td><input type="text" name="PrimerAp" required pattern="[a-zA-Záéíóú]+" required></td>
			</tr>
			<tr>
				<td>Segundo Apellido</td>
				<td><input type="text" name="SegAp" pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Referencia</td>
				<td><input type="text" name="Referencia" id="Referencia"  required placeholder="Ej.Saúl Antonio González Montenegro" pattern="^([A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}\s){1,3}([A-Za-zñÑáéíóúÁÉÍÓÚ]{3,}){1}$"></td>
			</tr>
			<tr>
				<td>Telélefono</td>
				<td><input type="text" name="TelCliente" id="TelCliente" onkeyup="mascara(this,'-',sep,true)" required placeholder="2222-2222" maxlength="9"></td>
			</tr>
			<tr>
				<td>Dirección</td>
				<td><input type="text" name="Direccion" id="Direccion" required placeholder="Ej. Res. Las plamas, av. Los colindres casa FF-8"></td>
			</tr>
			<tr>
				<td>Concepto</td>
				<td><input type="text" name="Concepto" id="Concepto" required placeholder="Ej.Prestamo"></td>
			</tr>
			<tr>
				<td>Valor</td>
				<td><input type="text" name="Valor" id="Valor" required placeholder="Ej 12.00" pattern="[0-9]{1,}.[0-9]{2}"></td>
			</tr>
			<tr>
				<td>Forma de Pago</td>
				<td>
				<select name="Pay" id="Pay" required>
					<option value="Efectivo">Efectivo</option>
					<option value="Tarjeta">Tarjeta</option>
				</select>
				</td>
			</tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="Fecha" id="Fecha" required></td>
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