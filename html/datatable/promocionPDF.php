<?php 
$titulo2 = "Reporte de Promociones"; //Titulo que va a ir en el cuerpo del documento
		include("../base/titulo.php"); /* $titulo2 debe estar antes de include() */
	include('../config/db.php');
	require_once("dompdf/dompdf_config.inc.php");

	$conn=get_db_conn();
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT Fecha_inicio, Disponible, Descuento, Producto, Condicion from promocion";
	$result = mysql_query($consulta, $conn);
			//se despliega el resultado
			$salidapdf = '<br/><table border="1">';
			$contadorpdf = 1;
			while ($row = mysql_fetch_row($result)){
				$salidapdf .= '<tr>';					
					$salidapdf .= '<td>Registro No.'. $contadorpdf.'<br /></td>';
					$salidapdf .= '<td><br/></td>';
					$salidapdf .= '<td><br/></td>';	
				$salidapdf .= '</tr>';
				$salidapdf .= '<tr>';
					$salidapdf .= '<td>Fecha inicio: '.$row[0].'</td>';
					$salidapdf .= '<td>Disponible:'.$row[1].'</td>';
					$salidapdf .= '<td>Descuento: '.$row[2].'</td>';
				$salidapdf .= '</tr>';
				$salidapdf .= '<tr>';
					$salidapdf .= '<td>Producto: '.$row[3].'</td>';
					$salidapdf .= '<td>Condicion:'.$row[4].'</td>';
									$salidapdf .= '<td><br/><br/></td>';
				$salidapdf .= '</tr>';					
				$salidapdf .= '<tr>';					
					$salidapdf .= '<td><br/><br/></td>';
					$salidapdf .= '<td><br/><br/></td>';
					$salidapdf .= '<td><br/><br/></td>';	
				$salidapdf .= '</tr>';
				$contadorpdf++;
			}
			$salidapdf .= '</table>';
			$salidapdf .= '<br/><br/>';
			//$salidapdf .= 'Salida: '.$consulta;
		
	if (true){//$pdf == 'pdf'){
	$salidapdf = utf8_decode($salidapdf);
	$dompdf=new DOMPDF();
	$dompdf->load_html($salidapdf);
	ini_set("memory_limit","32M");
	$dompdf->render();
	$dompdf->stream("reportePromocion.pdf");}
	//*********
	?>