<?php
  $titulo='Telemercadeo';
  include ('../html/base/header.php');
        $titulo2='Telemercadeo';
        include('./base/titulo.php');
        include('./base/menu.php');
        
   ?>
  <div class="row">    
   <div class="large-9 push-3 columns">
	<form method="post" action="mantenimientopersona.php">
		<table width="720" border="1" align="left">
			<tr>
				<td>Numero de Cobro Pendiente Pendiente( 0 = Nuevo)</td>
				<td><input type="text" name="fecha" required pattern="[0-9]+"></td>
			</tr>
			<tr>
				<td>Gerente</td>
				<td><input type="text" name="concepto" required pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Zona</td>
				<td><input type="text" name="valor" pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Departamento</td>
				<td><input type="text" name="forma de pago" required pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Municipio</td>
				<td><input type="text" name="nombre del pagador" pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td><input type="text" name="referencia" required ></td>
			</tr>
			<tr>
		      <td><div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Administrar"/>
		      </div></td>
		      <td><div align="center">
		        <input type="Eliminar" name="button" id="button2" value="Reset" class='button'/>
		      </div></td>
    		</tr>
		</table>
	</form>
	</div>
    <?php
        include('./base/footer.php')
    ?>
