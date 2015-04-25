<?php 

    include("conexion.php");

	if(isset($_POST["button"]))
	{
		$btn = $_POST["button"];	
		$nombre = $_POST["Producto"];
		$fecha = $_POST["cantidad"];
		$monto = $_POST["formadepago"]; 

				//$sq = "SELECT idProveedor FROM proveedor where nombre='$nombre'";
				//$re = mysqli_query($conn, $sq);
				//$resultado=mysqli_fetch_array($re);
				//$idpersona=$resultado["idProveedor"];
				$sql = " INSERT INTO recepcion (idproveedor, observacion,pares) VALUES ('$nombre', '$monto','$fecha');";
				$res = mysqli_query($conn, $sql);
				if($res)
				{
				echo "<script>alert('Insertado correctamente');window.location='ingresoresepcion.php';</script>";
							}
							else{
								echo "<script>alert('Error al insertar');</script>";
								
							   echo "<script>window.location='ingresoresepcion.php'</script>";}
			
			
	}
?>