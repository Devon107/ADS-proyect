<?php 
	include('../config/db.php');
	$conn=get_db_conn();
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT porteria_ce.factura_in, porteria_ce.producto_in, color.nombre, talla.talla, porteria_ce.fecha FROM porteria_ce INNER JOIN color ON porteria_ce.id_color = color.idcolor INNER JOIN talla ON talla.idtalla = porteria_ce.id_talla";
	$datos=mysql_query($consulta,$conn);

	$resultado = mysql_query($consulta);

	if (!$resultado) {
		echo "No se pudo ejecutar con exito la consulta ($consulta) en la BD: " . mysql_error();
		exit;
	}

	if (mysql_num_rows($resultado) == 0) {
		echo "No se han encontrado filas, nada a imprimir, asi que voy a detenerme.";
		exit;
	}
	$arrayLength = count($resultado);
	$i=0;
	  while($row = mysql_fetch_array($resultado))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
			//"<a href=\"uploads/" . $row['DocFile'] . " </a>";
			//$row['link'] ='h'; 
            $rawdata[$i] = $row;
			$h=  $row['link'] ='<a href="../bitacora_cin.php?DUI='.$row[0]; 
            $g=  $row['link2'] ='<a href="../bitacora_cin.php?DUI='.$row[0]; 
            array_push($rawdata[$i], $h); 
			array_push($rawdata[$i], $g); 
			
			
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
//id_cambio, factura_in, producto_in, id_color, id_talla

		"columns": [
			{ "title": "No. Factura", "class": "center"  },
			{ "title": "No. producto" },
			{ "title": "Color", "class": "center" },
			{ "title": "Talla", "class": "center" },
			{ "title": "Fecha", "class": "center" },
		]
	} );	
} );


	</script>
</head>

<body>
	<div class="container">

			<div id="demo"></div>

	</div>


</body>
</html>