<?php
include('../config/db.php');
	$conn=get_db_conn();
$mysqli = new mysqli("localhost", "root", "", "ci"); // host, usuario, contraserña, base de datos

if($mysqli->connect_errno){
	echo "No se pudo conectar a Mysql: ".$mysqli->connect_errno;
}

$Facturas = $_POST['Facturas'];  // nombre es lo que se establece en la propiedad "name" del input del formulario
$Productos = $_POST['Producto'];  // nombre es lo que se establece en la propiedad "name" del input del formulario
$Color = $_POST['color'];  // nombre es lo que se establece en la propiedad "name" del input del formulario
$Talla = $_POST['talla'];  // nombre es lo que se establece en la propiedad "name" del input del formulario
$Fecha = date("Y-m-d");  

				$sq = "SELECT idcolor FROM color where nombre='".$Color."'";
				$re = mysql_query($sq,$conn);
				$resultado=mysql_fetch_array($re);
				$color=$resultado["idcolor"];
				
				$sq = "SELECT idtalla FROM talla where talla='".$Talla."'";
				$re = mysql_query($sq,$conn);
				$resultado=mysql_fetch_array($re);
				$talla=$resultado["idtalla"];
				
$query = "INSERT INTO porteria_ce(factura_in,producto_in,id_color,id_talla,fecha) VALUES ('{$Facturas}','{$Productos}','{$color}','{$talla}','{$Fecha}')";
?> <script>alert("");</script> <?php
$mysqli->query($query);

header("Location: porteria_in.php"); // redirecciona

?>