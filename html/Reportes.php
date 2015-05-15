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
			<center><h1>Reportes</h1></center>
		</div>
	</div>

	<div class="row">
		<div class="large-12 columns">
			<div class="row"> 
				<div class="large-4 small-6 columns"><a href="bitacora_cin.php"><img class="icono3"src="../static/icons/pages_black.png"/>
					<a><h6 class="panel" align ="center">Entrada de Cambios</h6></a>
				</div> 
				<div class="large-4 small-6 columns"><a href="bitacora_out.php"><img class="icono3" src="../static/icons/pages_brown.png"/>
					<a><h6 class="panel" align ="center">Salida de Cambios</h6></a> 
				</div>    
				<div class="large-4 small-6 columns"><a href="resepcion_lista.php"><img class="icono3" src="../static/icons/pages_green.png"/>
					<a><h6 class="panel" align ="center">Porductos Ingresados</h6></a> 
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