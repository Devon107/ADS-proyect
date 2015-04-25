<?php
include('../html/config/db.php');
$conn=get_db_conn();
if(isset($_POST['button']))
{
	$Fecha=$_POST['Fecha'];
	$Dias=$_POST['Dias'];
	$Descuento=$_POST['Descuento'];
	$Producto=$_POST['Producto'];
	$Condicion=$_POST['Condicion'];
	$id=$_POST['id'];
	if(isset($Fecha) && !empty($Fecha) && isset($Dias) && !empty($Dias) && isset($Descuento) && !empty($Descuento) && isset($Producto) && !empty($Producto) && isset($Condicion) && !empty($Condicion))
	{
		$sql="update promocion set Fecha_inicio='$Fecha',Disponible='$Dias',Descuento='$Descuento',Producto='$Producto',Condicion='$Condicion' where ID_Promo='$id'";
		$consulta=mysql_query($sql,$conn);
		if($consulta)
		{
			?>
			<script>alert('Se han guardado los datos');
                   window.location.href="../html/fondodereporte.php";</script>
			<?php
		}
		else
		{
			?><script>alert('Error, No se han podido guardar los datos');
			window.location.href="../html/fondodereporte.php";</script><?php
		}
	}else
	{
		?><script>alert('Error, No se han podido guardar los datos');
			window.location.href="../html/fondodereporte.php";</script><?php
	}
	
}
?>