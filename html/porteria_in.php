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
	$idFactura = -1;
	if (isset($_GET['factura']))
	{
		$factura = $_GET['factura'];
	}


	$qr = "select f.idfactura,f.idestilo,p.nombre as estilo ,c.nombre as color,t.talla, concat(Primer_Nombre, ' ', Segundo_Nombre,' ', Primer_Apellido,' 
		', Segundo_Apellido) as nombre from factura as f     inner join producto as p on p.estilo=f.idestilo
		 inner join color as c on c.idcolor = f.idcolor inner join talla as t on t.idtalla = f.idtalla inner join cliente as cli on
		 cli.idCliente = f.idcliente inner join persona as per on per.idPersona = cli.idPersona where f.idfactura=" . $factura;
	$consulta=mysql_query($qr,$conn);
	$rs = mysql_fetch_assoc($consulta);
/*
	$sql1="SELECT nombre from color";
	$consulta1=mysql_query($sql1,$conn);
	$sql2="SELECT talla from talla";
	$consulta2=mysql_query($sql2,$conn);
	$sql3="SELECT idfactura from factura";
	$consulta3=mysql_query($sql3,$conn);

	$sql="SELECT idestilo from factura where factura = '$consulta3'";
	$consulta=mysql_query($sql,$conn);*/
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

								<a>Factura:</a><input  type="number" name="Facturas" value="<?php echo $rs['idfactura']; ?>" placeholder="Busqueda de Facturas" required readonly />
							    <a>Estilo:</a><input   type="text" name="estilo" value="<?php echo $rs['estilo']; ?>"  required readonly />
								<input type="hidden" name="Producto" value="<?php echo $rs['idestilo']; ?>" />

					</div>
					<div class="large-6 columns">
						 <a>Color:</a><input   type="text" name="color" value="<?php echo $rs['color']; ?>"  required readonly />
						 <a>Talla:</a><input   type="number" name="talla" value="<?php echo $rs['talla']; ?>"  required readonly />

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
				<div class="panel">
					<a href="producto_leido.php?idfactura=<?php echo $rs['idfactura']; ?>"><img src="../static/icons/productoleido.png"/></a>
				</div>

				<a href="porteria.php" class="button expand" class="button expand">Cancelar</a>  
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