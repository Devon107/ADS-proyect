<?php
include('../html/config/db.php');
$conn=get_db_conn();
if(isset($_POST['button']))
{	
	$id=$_POST['id'];
	$cantidad=$_POST['disponible'];
	$precio=$_POST['precio'];
	$producto=$_POST['producto'];	
	if(isset($cantidad) && !empty($cantidad) && isset($precio) && !empty($precio) && isset($producto) && !empty($producto) )
	{
		$sql="update ofertas set disponible='$cantidad',precioventa='$precio',producto='$producto' where idoferta='$id'";
		$consulta=mysql_query($sql,$conn);
		if($consulta)
		{  
		?>
			<script>alert('Se han guardado los datos exitosamente');
                   window.location.href="../html/fondodereporte.php";</script>
			<?php
		}
		else
		{
			?><script>alert('Error, No se han podido guardar los datos');
			window.location.href="../html/fondodereporte.php";</script>
			<?php
		}
	}else
	{
		?><script>alert('Error, No se han podido guardar los datos debido a campos vacíos');
			window.location.href="../html/fondodereporte.php";</script><?php
	}
	
}
?>