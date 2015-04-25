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
		echo $marzo0;
		echo $marzo1;
		$hola=38;
		echo $enero0;
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
	
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
	var  hola =<?php echo json_encode($hola);?>;
	var  enero00 =<?php echo json_encode($enero0);?>;
	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [hola,randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(151,187,205,0.5)",
				strokeColor : "rgba(151,187,205,0.8)",
				highlightFill : "rgba(151,187,205,0.75)",
				highlightStroke : "rgba(151,187,205,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
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
