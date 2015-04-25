<?php 

    include("conexion.php");

	if(isset($_POST["button"]))
	{
		$btn = $_POST["button"];
		$ID= $_POST["ID"];		
		$DUI = $_POST["DUI"];
		$fecha = $_POST["fecha"];
		$monto = $_POST["monto"];
		$telefono = $_POST["telefono"];

		
		if(isset( $_POST["estado"]) && !empty($_POST["estado"])) 
			{
					$estado = True;
			}
			else
			{
					$estado = False;
			}  
		if($btn == "Insertar")
			{
				$sq = "SELECT idPersona FROM persona where dui='".$DUI."'";
				$re = mysqli_query($conn, $sq);
				$resultado=mysqli_fetch_array($re);
				$idpersona=$resultado["idPersona"];
	
				//inicio if buscar
			
					if($idpersona==$idpersona)
					{//if de verificación
						$sql = " UPDATE Cobro SET idCobro='$ID',idPersona='$idpersona', Monto='$monto', Telefono='$telefono', Fecha='$fecha', Estado='$estado' WHERE idCobro='".$ID."'";

						$res = mysqli_query($conn, $sql);
							if($res)
							{
								echo "<script>alert('Insertado correctamente');</script>";
								}
							else{
								echo "<script>alert('Error al insertar');</script>";
								}
							echo "<script>window.location='../html/fondodereporte.php'</script>";
					}//if de verificación
				
				else{
					echo "<script>window.location='../html/fondodereporte.php'</script>";
					}
			
			}//fin de if buscar
	}
?>