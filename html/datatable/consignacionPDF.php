<?php 
$titulo2 = "Reporte de consignaciones"; //Titulo que va a ir en el cuerpo del documento
require_once("dompdf/dompdf_config.inc.php");
		include("../base/titulo.php"); /* $titulo2 debe estar antes de include() */
	include('../config/db.php');
	$conn=get_db_conn();
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT CONCAT(consignacion.PrimerNombre, ' ', consignacion.PrimerApellido),Referencia, Telefono, direccion, Concepto, valor, pay from consignacion";
	//$datos=mysql_query($consulta,$conn);
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
					$salidapdf .= '<td>Nombre: '.$row[0].'</td>';
					$salidapdf .= '<td>Referencia:'.$row[1].'</td>';
					$salidapdf .= '<td>Telefono: '.$row[2].'</td>';
				$salidapdf .= '</tr>';
				$salidapdf .= '<tr>';
					$salidapdf .= '<td>Direccion: '.$row[3].'</td>';
					$salidapdf .= '<td>Concepto:'.$row[4].'</td>';
					$salidapdf .= '<td>Valor:'.$row[5].'</td>';
									
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
	$dompdf->stream("reporteConsignacion.pdf");}
	//*********
	?>