<?php 
include("conexion.php");
session_start();
if(isset($_POST['button']))
	{
		$btn=$_POST['button'];
		$old=$_POST['passold'];
		$new=$_POST['passnew'];
		$new1=$_POST['passnew1'];
		$old1=md5($old);
		$usuario=$_SESSION['usuario'];
		

		if(isset($btn) && !empty($btn))
		{
			if($btn== 'Guardar')
			{
				$sql="SELECT clave from empleado where usuario='".$usuario."'";
					$res=mysqli_query($conn,$sql);
					$clave=mysqli_fetch_array($res);
					if($old1!=$clave['clave'])
					{
						echo"<script>alert('La contrase\u00F1a no existe');
						window.location.href='cuenta.php';
						</script>";
					}
					else if($new==$new1)
					{
					$nuevaclave=md5($new1);
					$sql="UPDATE empleado set clave='$nuevaclave' where usuario='".$usuario."'";
					$res=mysqli_query($conn,$sql);
						echo"<script>alert('Contrase\u00F1a guardada');
						window.location.href='home.php';
						</script>";
					}
					else
					{
						echo "<script>
						window.location.href='cuenta.php';
						</script>";
					}
			}
		}
	}
?>