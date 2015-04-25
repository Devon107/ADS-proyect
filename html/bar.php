<?php 
	include('config/db.php');
	$conn=get_db_conn();
	$titulo2 = "Business Inteligence"; //Titulo que va a ir en el cuerpo del documento
		include("base/titulo.php"); /* $titulo2 debe estar antes de include() */
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT Estado, AVG(Monto) AS Monto , MONTH(Fecha) AS Fecha FROM Cobro WHERE Fecha BETWEEN '2000-07-05' AND DATE_ADD('2015-11-10',INTERVAL 1 DAY) GROUP BY Estado,MONTH(Fecha)";
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
	
	$enero0=0;
	$febrero0=0;
	$marzo0=0;
	$abril0=0;
	$mayo0=0;
	$junio0=0;
	$julio0=0;
	$agosto0=0;
	$septiembre0=0;
	$octubre0=0;
	$noviembre0=0;
	$diciembre0=0;
	
	$enero1=0;
	$febrero1=0;
	$marzo1=0;
	$abril1=0;
	$mayo1=0;
	$junio1=0;
	$julio1=0;
	$agosto1=0;
	$septiembre1=0;
	$octubre1=0;
	$noviembre1=0;
	$diciembre1=0;
	
	while($row = mysql_fetch_array($resultado))
        {   
            //guardamos en rawdata todos los vectores/filas que nos devuelve la consulta
			//"<a href=\"uploads/" . $row['DocFile'] . " </a>";
			//$row['link'] ='h'; 
            $rawdata[$i] = $row;
			//$h=$row['link'] ='<a href="../IngresoCobros.php?DUI='.$row[0].'" target="_top" >'."Actualizar".'</a>'; 
            //array_push($rawdata[$i], $h); 
			$i++;
			
			if($row['Estado']==0)
			{
				if($row['Fecha']==1){
					$enero0=$row['Monto'];}
				if($row['Fecha']==2){
					$febrero0=$row['Monto'];}
				if($row['Fecha']==3){
					$marzo0=$row['Monto'];}
				if($row['Fecha']==4){
					$abril0=$row['Monto'];}
				if($row['Fecha']==5){
					$mayo0=$row['Monto'];}
				if($row['Fecha']==6){
					$junio0=$row['Monto'];}
				if($row['Fecha']==7){
					$julio0=$row['Monto'];}
				if($row['Fecha']==8){
					$agosto0=$row['Monto'];}
				if($row['Fecha']==9){
					$septiembre0=$row['Monto'];}
				if($row['Fecha']==10){
					$octubre0=$row['Monto'];}
				if($row['Fecha']==11){
					$noviembre0=$row['Monto'];}
				if($row['Fecha']==12){
					$diciembre0=$row['Monto'];}
			}
			elseif($row['Estado']==1)
			{
				if($row['Fecha']==1){
					$enero1=$row['Monto'];}
				if($row['Fecha']==2){
					$febrero1=$row['Monto'];}
				if($row['Fecha']==3){
					$marzo1=$row['Monto'];}
				if($row['Fecha']==4){
					$abril1=$row['Monto'];}
				if($row['Fecha']==5){
					$mayo1=$row['Monto'];}
				if($row['Fecha']==6){
					$junio1=$row['Monto'];}
				if($row['Fecha']==7){
					$julio1=$row['Monto'];}
				if($row['Fecha']==8){
					$agosto1=$row['Monto'];}
				if($row['Fecha']==9){
					$septiembre1=$row['Monto'];}
				if($row['Fecha']==10){
					$octubre1=$row['Monto'];}
				if($row['Fecha']==11){
					$noviembre1=$row['Monto'];}
				if($row['Fecha']==12){
					$diciembre1=$row['Monto'];	}			
			}
        }
		
?>

<!doctype html>
<html>
	<head>
		<title>Bar Chart</title>
		<script src="../Chart.js"></script>
	</head>
	<body>
		<div style="width: 50%">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


	<script>
	var  enero0 =<?php echo json_encode($enero0);?>;
	var  febrero0 =<?php echo json_encode($febrero0);?>;
	var  marzo0 =<?php echo json_encode($marzo0);?>;
	var  abril0 =<?php echo json_encode($abril0);?>;
	var  mayo0 =<?php echo json_encode($mayo0);?>;
	var  junio0 =<?php echo json_encode($junio0);?>;
	var  julio0 =<?php echo json_encode($julio0);?>;
	var  agosto0 =<?php echo json_encode($agosto0);?>;
	var  septiembre0 =<?php echo json_encode($septiembre0);?>;
	var  octubre0 =<?php echo json_encode($octubre0);?>;
	var  noviembre0 =<?php echo json_encode($noviembre0);?>;
	var  diciembre0 =<?php echo json_encode($diciembre0);?>;
	
	var  enero1 =<?php echo json_encode($enero1);?>;
	var  febrero1 =<?php echo json_encode($febrero1);?>;
	var  marzo1 =<?php echo json_encode($marzo1);?>;
	var  abril1 =<?php echo json_encode($abril1);?>;
	var  mayo1 =<?php echo json_encode($mayo1);?>;
	var  junio1 =<?php echo json_encode($junio1);?>;
	var  julio1 =<?php echo json_encode($julio1);?>;
	var  agosto1 =<?php echo json_encode($agosto1);?>;
	var  septiembre1 =<?php echo json_encode($septiembre1);?>;
	var  octubre1 =<?php echo json_encode($octubre1);?>;
	var  noviembre1 =<?php echo json_encode($noviembre1);?>;
	var  diciembre1 =<?php echo json_encode($diciembre1);?>;
	var randomScalingFactor = function(){ return Math.round(500)};
	var barChartData = {
		labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [enero0, febrero0, marzo0, abril0, mayo0,junio0,julio0,agosto0,septiembre0,octubre0,noviembre0,diciembre0]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [enero1, febrero1, marzo1, abril1, mayo1,junio1,julio1,agosto1,septiembre1,octubre1,noviembre1,diciembre1]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	</body>
</html>
