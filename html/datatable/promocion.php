<?php 
$titulo2 = "Reporte de Promociones"; //Titulo que va a ir en el cuerpo del documento
		include("../base/titulo.php"); /* $titulo2 debe estar antes de include() */
	include('../config/db.php');
	$conn=get_db_conn();
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT Fecha_inicio, Disponible, Descuento, Producto, Condicion from promocion";
	$datos=mysql_query($consulta,$conn);
	$resultado = mysql_query($consulta);
	if (!$resultado) {
		echo "No se pudo ejecutar con exito la consulta ($consulta) en la BD: " . mysql_error();
		exit;
	}
	if (mysql_num_rows($resultado) == 0) {
		echo "No se han encontrado registros.";
		exit;
	}
	$arrayLength = count($resultado);
	$consulta1 = "SELECT ID_Promo from promocion";
	$resultado1 = mysql_query($consulta1);
	if (!$resultado1) {
		echo "No se pudo ejecutar con exito la consulta ($consulta) en la BD: " . mysql_error();
		exit;
	}
	if (mysql_num_rows($resultado1) == 0) {
		echo "No se han encontrado registros.";
		exit;
	}
	$arrayLength = count($resultado1);
	$j=0;
	while($row1 = mysql_fetch_array($resultado1))
	{
		$id[$j]=$row1[0];
		$j++;
	}
	$i=0;
	  while($row = mysql_fetch_array($resultado))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
			//"<a href=\"uploads/" . $row['DocFile'] . " </a>";
			//$row['link'] ='h'; 
            $rawdata[$i] = $row;
			$h=$row['link'] ='<a href="../ActualizarPromociones.php?ID='.$id[$i].'" target="_top" >'."Actualizar".'</a>';
            array_push($rawdata[$i], $h);			
			$i++;
        }
	//print_r($rawdata);	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" >
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>DataTables example - Javascript sourced data</title>
	<link rel="stylesheet" type="text/css" href="../../media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../resources/demo.css">
	<style type="text/css" class="init">
	</style>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../../media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/syntax/shCore.js"></script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js"></script>
	<script type="text/javascript" language="javascript" class="init">
var dataSet =<?php echo json_encode($rawdata);?>;
$(document).ready(function() {
	$('#demo').html( '<table cellpadding="0" cellspacing="0" border="0" class="display" id="example"></table>' );
	$('#example').dataTable( {
		"data": dataSet,

		"columns": [
			{ "title": "Fecha Inicio" },
			{ "title": "Disponible"  },
			{ "title": "Descuento" },
			{ "title": "Producto" },
			{ "title": "Condicion" },
			{ "title": "Editar", "class": "center" }
		]
	} );	
} );
	</script>
</head>
<body>
<form action="promocionPDF.php" method="POST">
<table><tr><td><div align="center"><input type="submit" class='button' name="button" id="button" value="Generar PDF"/></td></tr></table></form>
	<div class="container"><div id="demo"></div></div>
	<div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Insertar nueva promocion"  onclick="top.location.href='../IngresoPromociones.php' "  />
	</div>
</body>
</html>