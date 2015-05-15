<?php 
	include('../config/db.php');
	
	$conn=get_db_conn();
	$titulo2 = "Reporte de cobros"; //Titulo que va a ir en el cuerpo del documento
		include("../base/titulo.php"); /* $titulo2 debe estar antes de include() */
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT CONCAT(persona.Primer_Nombre, ' ', persona.Primer_Apellido),DUI,Monto,Fecha,Telefono,IF(Cobro.estado=1,'Pendiente','Cancelado') as est FROM persona INNER JOIN Cobro ON Persona.idPersona= cobro.idPersona";
	
	$datos=mysql_query($consulta,$conn);

	$resultado = mysql_query($consulta);
	
	$consulta2="SELECT idCobro FROM Cobro";
	$datos2=mysql_query($consulta2,$conn);
	$resultado2 = mysql_query($consulta2);	
	$e=0;

	  while($row2 = mysql_fetch_array($resultado2))
        {   
            $rawdata2[$e] = $row2[0];
			$e++;
        }	
	
	
	
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
			
			$h=$row['link'] ='<a href="../ActualizarCobros.php?ID='.$rawdata2[$i].'" target="_top" >'."Actualizar".'</a>'; 
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
		"data": dataSet /*,
		"columnDefs": [
            {
                "render": function ( data, type, row ) {
                    return '<a href=#>'+"Eliminar"+'</a>';
                },
                "targets": 7
            }
        ]*/,


		"columns": [
			{ "title": "Nombre" },
			{ "title": "DUI", "class": "center"  },
			{ "title": "Monto" },
			{ "title": "Fecha", "class": "center" },
			{ "title": "Telefono", "class": "center" },
			{ "title": "Estado", "class": "center" },
			{ "title": "Actualizar", "class": "center" }/*,
			{ "title": "Eliminar"}*/
		]
	} );	
} );


	</script>
</head>

<body>
<form action="cobroPDF.php" method="POST">
	<table><tr><td><div align="center"><input type="submit" class='button' name="button" id="button" value="Generar PDF"/></td></tr></table></form>
	<div class="container">
			<div id="demo"></div>
	</div>
	<div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Insertar nuevo cobro"  onclick="top.location.href='../IngresoCobros.php' "  />
	</div>

</body>
</html>