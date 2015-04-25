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
			<div class="row"> 
				<div class="large-4 small-6 columns"><a href="cambios.php"><img class="icono3"src="../static/icons/actualizar.png"/>
					<a><h6 class="panel" align ="center">Cambios</h6></a>
				</div> 
				<div class="large-4 small-6 columns"><a href="reclamos.php"><img src="../static/icons/eliminar.png"/>
					<a><h6 class="panel" align ="center">Reclamos</h6></a>
				</div>    
				<div class="large-4 small-6 columns"><a href="ingresoresepcion.php"><img class="icono3" src="../static/icons/insertar.png"/>
					<a><h6 class="panel" align ="center">Recepción</h6></a> 
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