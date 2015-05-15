<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>NYMSA | Porteria</title>
	<link rel="stylesheet" href="../css/foundation.css" />
	<script src="../js/vendor/modernizr.js"></script>
	<?php
	include ('../html/base/header.php')
	?>
</head>
<body>
	<div class="row">
		<div class="panel">
			<center><h1>Porter&iacute;a</h1></center>
		</div>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<form method="get" action="Porteria_in.php">
			<div class="row"> 
				<div class="large-4 small-6 columns" style='left: 20%; /*(100%-60%)/2*/top: 30px;'><a href="cambios.php" >
				<a>Factura:</a> <input  type="number" name="factura" placeholder="Busqueda de Facturas" required />
				<input class="small button" type="submit" value="Aceptar"  href="Porteria_in.php?factura=<?php?>" >
				<input class="small button" type="submit" value="Cancelar">
				
			</form>
				</div>
			</div>	
		</div>	
	</div>
	<footer class="row">
		<?php
		include ('../html/base/footer.php')
		?>
	</footer>
</body>
</html>