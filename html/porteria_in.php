<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>NYMSA | Porteria</title>
	<link rel="stylesheet" href="../css/foundation.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<script src="../js/vendor/modernizr.js"></script>
	<?php
	include ('../html/base/header.php');
	include('./config/db.php');
	$conn=get_db_conn();
	$sql="SELECT estilo from producto";
	$consulta=mysql_query($sql,$conn);
	$sql1="SELECT nombre from color";
	$consulta1=mysql_query($sql1,$conn);
	$sql2="SELECT talla from talla";
	$consulta2=mysql_query($sql2,$conn);
	?>
</head>
<body>
	<div class="row">
		<div class="large-12 columns">
			<div class="row">
				<div class="panel">
					<div>
						<center><a href="bitacora_cin.php"><h1>Cambios Ingresados</h1><a></center>
					</div>   
				</div>
			</div>  
		</div>
		<div class="row">
			<div class="large-6 columns">
				<div class="row">
					<div>
						<form method="post" action="insercion.php">
							<div class="large-6 columns">
								<a>Factura: </a><input title="Ingrese una Factura Valida" type="number" name="Facturas" min="1" value="1" placeholder="Busqueda de Facturas" required/>
								<a>Producto: </a><select name="Producto">
								<?php while($row = mysql_fetch_assoc($consulta)){
									?><option><?php echo $row['estilo'];
								}?>
							</option>
						</select>
					</div>
					<div class="large-6 columns">
						<a>Color: </a><select name="color">
						<?php while($row = mysql_fetch_assoc($consulta1)){
							?><option><?php echo $row['nombre'];
						}?>
					</option>
				</select><a>Talla: </a><select name="talla">
				<?php while($row = mysql_fetch_assoc($consulta2)){
					?><option><?php echo $row['talla'];
				}?>
			</option>
		</select></div>
	</div>
</div>
</div>		
</div>

		<!--<div class="row">
			<div class="large-6 columns">
				<div class="row">
					<div>
						<div class="large-6 columns">
							<form method="post">
							<input title="Ingrese una Factura Valida" type="number" name="Busqueda de Facturas" placeholder="Busqueda de Facturas" required/>
							</div>
							<input class="small button" type="submit" value="B&uacute;squeda">
						</form></div>
					</div>
				</div>
				<div class="large-6 columns">
					<div class="row">
						<div class="large-6 columns">
							<form method="post">
								<input title="Ingrese un Producto Valido" type="number" name="Busqueda de Productos" placeholder="Lectura de Productos" required/>
							</div>
							<input class="small button" type="submit" value="B&uacute;squeda">
						</form>
					</div>
				</div>
			</div>
		-->
		<div class="row">
			<div class="large-6 columns">
				<div class="panel"><a href="#"><img src="../static/icons/productoregistrado.png"/></a>
				</div><input class="button expand" type="submit" value="Aceptar">
			</div>
			<div class="large-6 columns">
				<div class="panel"><a href="#"><img src="../static/icons/productoleido.png"/></a>
				</div><a href="porteria.php" class="button expand" class="button expand">Cancelar</a>  
			</form>
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