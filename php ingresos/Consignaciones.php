<?php
include('../html/config/db.php');
$conn=get_db_conn();
if(isset($_POST['button']))
{
	$PrimerNom=$_POST['PrimerNom'];
	$SegNom=$_POST['SecNom'];
	$PrimerAp=$_POST['PrimerAp'];
	$SegAp=$_POST['SegAp'];
	$Refer=$_POST['Referencia'];
	$Tele=$_POST['TelCliente'];
	$Direccion=$_POST['Direccion'];
	$Concepto=$_POST['Concepto'];
	$Valor=$_POST['Valor'];
	$Pay=$_POST['Pay'];
	if(isset($PrimerNom) && !empty($PrimerNom) && isset($PrimerAp) && !empty($PrimerAp) && isset($Refer) && !empty($Refer) && isset($Tele) && !empty($Tele) && isset($Direccion) && !empty($Direccion) && isset($Concepto) && !empty($Concepto) && isset($Valor) && !empty($Valor) && isset($Pay) && !empty($Pay))
	{
		$sql="INSERT INTO Consignacion (PrimerNombre,SegundoNombre,PrimerApellido,SegundoApellido,Referencia,Telefono,direccion,Concepto,valor,pay) values('$PrimerNom','$SegNom','$PrimerAp','$SegAp','$Refer','$Tele','$Direccion','$Concepto','$Valor','$Pay')";
		$consulta=mysql_query($sql,$conn);
		if($consulta)
		{
			?>
			<script>alert('Se han guardado los datos');
                   window.location.href="../html/IngresoConsignaciones.php";</script>
			<?php
		}
		else
		{
			?><script>alert('Error, No se han podido guardar los datos');
			window.location.href="../html/IngresoConsignaciones.php";</script> <?php
		}
	}
}	?>