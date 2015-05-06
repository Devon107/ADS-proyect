<?php 
	require("adodb5/adodb.inc.php");
    include("conexion.php");
	$ID =$_GET['ID'];
	$obj_db_mysql = NewADOConnection('mysqli');
	$conectar_mysql = @$obj_db_mysql->Connect("localhost", "root", "", "ci");	  
	//persona
	$consulta_general_persona = 'SELECT dui FROM persona INNER JOIN  Cliente ON Persona.idPersona = Cliente.idPersona';
    $rows_consulta_general_persona = $obj_db_mysql->Execute($consulta_general_persona);
    if (empty($rows_consulta_general_persona)) {
        $result = "No se encontraron resultados !!";
    }
	$DUI = "SELECT dui FROM persona INNER JOIN cobro ON cobro.idPersona=Persona.idPersona where cobro.idcobro= '$ID'";
	$re = mysqli_query($conn, $DUI);
	$resultado=mysqli_fetch_array($re);
	$DUI=$resultado["dui"];	
	
	$todo = "SELECT * FROM cobro INNER JOIN persona ON cobro.idPersona=Persona.idPersona where Persona.dui= '$DUI' and cobro.idcobro= '$ID'";
	$re = mysqli_query($conn, $todo);
	$resultado=mysqli_fetch_array($re);
	$fecha=$resultado["Fecha"];	
	$monto=$resultado["Monto"];	
	$telefono=$resultado["Telefono"];	
	$estado=$resultado["Estado"];	
	//echo $estado;
	if($estado=='1')
		$estado="checked";
	else
		$estado="";

	
	include('./base/header.php');
	include('./base/menu.php');
	  ?>

  <div class="row">    
   <div class="large-9 push-3 columns">
	<form method="post" action="mantactcobro.php">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
	<tr>
		<td>ID</td>
		<td><input type="text" name="ID" value="<?php echo $ID?>" required readonly></td>
	</tr>
	<tr>
		<td>DUI</td>
 		<td><input type="text" name="DUI" value="<?php echo $DUI?>" required ></td>          
        </select> 
    </tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="fecha" value="<?php echo $fecha?>" required></td>
			</tr>
			<tr>
				<td>Monto</td>
				<td><input type="text" name="monto" value="<?php echo $monto?>" required pattern="[0-9]{1,}.[0-9]{2}" ></td>
			</tr>

			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telefono" value="<?php echo $telefono?>" onkeyup="mascara(this,'-',sep,true)" pattern="[0-9]{4}-[0-9]{4}" maxlength="9"></td>
			</tr>
			<tr>
				<td>Pendiente:</td>
				<td>
					<input type="checkbox" name="estado" id="estado" <?php echo $estado?>> Activo<br>
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
include('./base/footer.php');?>
