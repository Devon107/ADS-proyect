<?php 
	require("adodb5/adodb.inc.php");
	//$prueba =$_GET['DUI'];
	//echo $prueba ;
	$obj_db_mysql = NewADOConnection('mysqli');
	$conectar_mysql = @$obj_db_mysql->Connect("localhost", "root", "", "ci");	  
	//persona
	$consulta_general_persona = 'SELECT dui FROM persona INNER JOIN  Cliente ON Persona.idPersona = Cliente.idPersona';
    $rows_consulta_general_persona = $obj_db_mysql->Execute($consulta_general_persona);
    if (empty($rows_consulta_general_persona)) {
        $result = "No se encontraron resultados !!";
    }

	  
	  ?>
<?php
$titulo = "Cobros";
include('./base/header.php');
$titulo2 = "Cobros"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php");
include('./base/menu.php');
?>
  <div class="row">    
   <div class="large-9 push-3 columns">
	<form method="post" action="mantingcobro.php">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
    <tr>
      <td width="242">DUI:</td>
      <td><label for="DUI"></label>
        <select name="DUI">
             <?php foreach ($rows_consulta_general_persona as $row) {           
                   echo '<option color="red" value="'.$row['dui'].'">'.$row['dui'].'</option>';         
             }?>           
        </select> 
    </tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="fecha" required></td>
			</tr>
			<tr>
				<td>Monto</td>
				<td><input type="text" name="monto" required pattern="[0-9]{1,}.[0-9]{2}" ></td>
			</tr>

			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telefono" onkeyup="mascara(this,'-',sep,true)" pattern="[0-9]{4}-[0-9]{4}" maxlength="9"></td>
			</tr>
			<tr>
				<td>Pendiente:</td>
				<td>
					<input type="checkbox" name="estado" id="estado" value="True"> Activo<br>
			   </td>
			</tr> 
			</tr> 
			<tr>
		      <td><div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Insertar"/>
		      </div></td>
		      <td><div align="center">
		        <input type="Reset" name="button" id="button2" value="Reset" class='button'/>
		      </div></td>
    		</tr>
		</table>
	</form>
	</div>
<?php
include('./base/footer.php');
