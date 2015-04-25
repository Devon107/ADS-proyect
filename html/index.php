<?php
session_start();
if (!isset($_SESSION["usuario"]))
{
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>NYMSA | Inicio</title>
	<link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
<body>
	<div class="row" align='center'>
      
        <h1>Iniciar sesión</h1>
      
    </div>
	<div class="row" align='center'>
			<div class='panel' align='center' style='width:500px;'>
	<form action="ingresologin.php" method="POST">
	
		<div style='width:250px;'>
			</br><td><input type="text"  placeholder="Nombre de usuario" name="usuario" autofocus required/></td>
		</div>
		<div style='width:250px;'>
			<td><input type="password" placeholder="Clave de acceso" name="clave" required/></td></br>
		</div>
		<div>
			<td><center><input type='submit' class='button' value='Insertar' name='button'></center></td>
		</div>
	</form>
	</div>
</div>
</body>
</html>
<?php
}
else
{
	header('location:home.php');
}
?>