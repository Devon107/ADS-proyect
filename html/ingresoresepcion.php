	
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>NYMSA | Recepción</title>
	<link rel="stylesheet" href="../css/foundation.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<script src="../js/vendor/modernizr.js"></script>
	<?php
	include ('../html/base/header.php');
	include('./config/db.php');
	$conn=get_db_conn();
	$sql="SELECT nombre from proveedor";
	$consulta=mysql_query($sql,$conn);
	?>
</head>
<body>
	<div class="large-12 columns">
		<div class="row">
			<div class="panel">
				<div>
					<center><a href="resepcion_lista.php"><h1>Recepción</h1><a></center>
				</div>   
			</div>
		</div>  
	</div>

	<div class="row">
			<div class="large-6 columns">
			<form method="post" action="mantenimientorecepcion.php">
				 <a href="">Proveedor:</a>
				 </a><select name="Producto">
								<?php while($row = mysql_fetch_assoc($consulta)){
									?><option><?php echo $row['nombre'];
								}?>
							</option>
						</select>
					<a href="">Cantidad de Pares:</a>
					<input type="text" name="cantidad">
					<a href="">Observación:</a>
					<input type="text" name="formadepago" required >
					<input type="submit" class="button expand" name="button" id="button" value="Insertar"/>
					<input type="clear"class="button expand" name="button" id="button2" value="Cancelar"/>
					</form>
			</div>
			<div class="large-6 columns">
				<a href="#"><img src="../static/icons/Cuadro.png"/></a>
			</form>
		</div>


	 <!--<div class="row">
		<form method="post" action="mantenimientopersona.php">
			<div class="large-6 columns">
				<div class="panel">
				    <a href="bitacora_out.php"><a>Proveedor:</a>
					<a><input type="text" name="proveedor" required pattern="[a-zA-Záéíóú]+"></a>
					<a href="bitacora_out.php"><a>Cantidad de Pares:</a>
					<input type="text" name="cantidad">
					<a href="bitacora_out.php"><a>Observación:</a>
					<input type="text" name="forma de pago" required >
					<input type="submit" class="button expand" name="button" id="button" value="Insertar"/>
					<input type="clear"class="button expand" name="button" id="button2" value="Cancelar"/>
				</form>
				</div>
				<div class="large-6 columns">
			</div>	
		</div> -->
		<footer class="row">
			<?php
			include ('../html/base/footer.php')
			?>
		</footer>
	</body>
	</html>
