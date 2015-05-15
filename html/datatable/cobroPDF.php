<?php 
	include('../config/db.php');
	require_once("dompdf/dompdf_config.inc.php");
	$conn=get_db_conn();
	$titulo2 = "Reporte de cobros"; //Titulo que va a ir en el cuerpo del documento
		include("../base/titulo.php"); /* $titulo2 debe estar antes de include() */
	//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
	$consulta="SELECT CONCAT(persona.Primer_Nombre, ' ', persona.Primer_Apellido),DUI,Monto,Fecha,Telefono,IF(Cobro.estado=1,'Pendiente','Cancelado') as est FROM persona INNER JOIN Cobro ON Persona.idPersona= cobro.idPersona";
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
					$salidapdf .= '<td>DUI:'.$row[1].'</td>';
					$salidapdf .= '<td>Monto: '.$row[2].'</td>';
				$salidapdf .= '</tr>';
				$salidapdf .= '<tr>';
					$salidapdf .= '<td>Fecha: '.$row[3].'</td>';
					$salidapdf .= '<td>Telefono: '.$row[4].'</td>';	
					$salidapdf .= '<td>Estado: '.$row[5].'</td>';					
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
	$dompdf->stream("reporteCobro.pdf");}
	//*********
	?>