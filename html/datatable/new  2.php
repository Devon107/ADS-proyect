<?php
@$orderby = $_POST['orderby'];
@$inclusivo = $_POST['inclusivo'];
@$inputgerente = $_POST['gerente'];
@$inputzona = $_POST['zona'];
@$inputdepartamento = $_POST['departamento'];
@$inputcliente = $_POST['cliente'];
@$pdf = $_POST['pdf'];

include("genBusquedaVenta.php");
require_once("dompdf/dompdf_config.inc.php");
$titulo = "Reporte de Ventas"; //Titulo1 es el que va a ir en el <title>
include("../base/headerreportes2.php"); /* $titulo debe estar antes de include() */
//$titulo2 = "Reporte de ventas"; //Titulo que va a ir en el cuerpo del documento
//include("../base/titulo.php");
include('../config/db.php');
$conn=get_db_conn();	
//Consulta original sin condicion, sin normalizar seria: "SELECT gerente, zona, departamento, cliente, dia, metas from ventas"
$consulta1 = "SELECT g.gerente AS row_gerente, z.zona AS row_zona, d.departamento AS row_departamento, 
c.cliente AS row_cliente, v.dia AS row_dia, v.metas AS row_metas FROM ventas AS v 
JOIN gerentes AS g ON g.idgerente = v.idgerente 
JOIN zonas AS z ON z.idzona = v.idzona 
JOIN departamentos AS d ON d.iddepartamento = v.iddepartamento 
JOIN clientes AS c ON c.idcliente = v.idcliente";
$consulta = $consulta1; //nueva consulta que sera usada en lugar de consulta original
$con2 = generabusqueda($inclusivo, $orderby, $inputgerente, $inputzona, $inputdepartamento, $inputcliente); //generacion de condicion de consulta "Where blabla... orderby... "
$consulta .= $con2; //Concatenacion de condicion a la consulta que sera usada
//echo $consulta . "<br/>"; //<<Linea de codigo pal' debugging :v
$querypdf = $consulta;

$contadorpdf = 1;
$consultapdf=mysql_query($querypdf,$conn);
		if($consultapdf){
			$result = mysql_query($querypdf, $conn);
			//se despliega el resultado
			$salidapdf = '<table border="1">';
			while ($row = mysql_fetch_row($result)){
				$salidapdf .= '<tr>';					
					$salidapdf .= '<td>Registro No.'. $contadorpdf.'<br /></td>';
					$salidapdf .= '<td><br /></td>';
					$salidapdf .= '<td><br /></td>';	
				$salidapdf .= '</tr>';
				$salidapdf .= '<tr>';
					$salidapdf .= '<td>Gerente: '.$row[0].'</td>';
					$salidapdf .= '<td>Zona:'.$row[1].'</td>';
					$salidapdf .= '<td>Departamento: '.$row[2].'</td>';
				$salidapdf .= '</tr>';
				$salidapdf .= '<tr>';
					$salidapdf .= '<td>D&iacute;a: '.$row[4].'</td>';
					$salidapdf .= '<td>Zona: '.$row[5].'</td>';	
					$salidapdf .= '<td>Cliente: '.$row[3].'</td>';	
				$salidapdf .= '</tr>';
				$contadorpdf++;
			}
			$salidapdf .= '</table>';
		}
		
////////
$datos=mysql_query($consulta,$conn);		
$resultado = mysql_query($consulta);
if (!$resultado){
	echo "No se pudo ejecutar con exito la consulta ($consulta) en la BD: " . mysql_error(); exit;}
if (mysql_num_rows($resultado) == 0){$null=true;}else{$null=false;}
$arrayLength = count($resultado);
$consulta1 = "SELECT idventa from ventas";
$resultado1 = mysql_query($consulta1);
if (!$resultado1){echo "No se pudo ejecutar con exito la consulta ($consulta) en la BD: " . mysql_error(); exit;}
if (mysql_num_rows($resultado1) == 0){echo "No se han encontrado registros."; exit;}
$arrayLength = count($resultado1);
$j=0;
while($row1 = mysql_fetch_array($resultado1)){
	$id[$j]=$row1[0];
	$j++;}
$i=0;
  while($row = mysql_fetch_array($resultado)){
		$rawdata[$i] = $row;
		$h=$row['link'] ='<a href="../ActualizarPromociones.php?DUI='.$id[$i].'" target="_top" >'."Actualizar".'</a>'; 
		$g=$row['link2'] ='<a href="../ActualizarPromociones.php?DUI='.$id[$i].'" target="_top" >'."Eliminar".'</a>';
           array_push($rawdata[$i], $h);
           array_push($rawdata[$i], $g);				
		$i++;}
?>
<html><head>
    <meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Reporte de Ventas</title><link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/foundation.css"/><link rel="stylesheet" href="../css/Tablas_reportes.css">
    <script src="js/vendor/modernizr.js"></script><script src="../js/shortcut.js" type="text/javascript"></script>
  
	<link rel="shortcut icon" type="image/ico" >
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>DataTables example - Javascript sourced data</title>
	<link rel="stylesheet" type="text/css" href="../../media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="../resources/syntax/shCore.css">
	<link rel="stylesheet" type="text/css" href="../resources/demo.css">
	
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
				{ "title": "Gerente" },
				{ "title": "Zona"  },
				{ "title": "Departamento" },
				{ "title": "Cliente" },
				{ "title": "Dia" },
				{ "title": "Meta" }
				]
		} );	
	} );
	</script></head>
<body>
<?php //Area del formulario de busqueda
	/*
	if (empty($inputgerente)  == false OR empty($inputzona)  == false OR empty($inputdepartamento)  == false OR empty($inputcliente)  == false){
	@$id=$_POST['id'];
	if ($id == null)
	{$id = 1;}
	echo "ALGO " . $id;
	*/
	include("selectventa.php");
	
	?>
	
	<div class="container">
	<div style="float: left; width: 50%"><form action="venta.php" method="POST">
	<table><tr> <td><strong>Generaci&oacute;n nuevo reporte</strong></td><td></td> </tr>
	<tr><td>Gerente:</td><td>
	<?php $salida = selectores("gerentes", "gerente", $conn, NULL);	echo $salida; ?>
	<!-- <input type="text" name="gerente" ></td> --></tr>
	<tr><td>Zona:</td><td>
	<?php $salida = selectores("zonas", "zona", $conn, NULL); echo $salida; ?>
	<!--<input type="text" name="zona" ></td></tr>-->	
	<tr><td>Departamento:</td><td>
	<?php $salida = selectores("departamentos", "departamento", $conn, NULL); echo $salida; ?>
	<!--<input type="text" name="departamento" ></td></tr>-->
	<tr><td>Cliente:</td><td>
	<?php $salida = selectores("clientes", "cliente", $conn, NULL); echo $salida; ?>
	<!-- <input type="text" name="cliente" ></td></tr> -->
	<tr><td>
	<input type="checkbox" name="pdf" value="pdf" /> Generar PDF</td>
	</td><td><div align="center"><input type="submit" class='button' name="button" id="button" value="Filtrar"/></div></td></tr>
	</table></div>
	<div style="float: right; width: 50%"><table><td><strong>Tipo de filtrado:</strong></td><td><input type="radio" name="inclusivo" value="0" /> Exclusivo <br /><input type="radio" name="inclusivo" value="1" checked /> Inclusivo</td></table>
	<!--<table><td><strong>ORDENAR POR:</strong></td>
	<td><input type="radio" name="orderby" value="1" />Gerente <br /> 
	<input type="radio" name="orderby" value="2" />Zona <br /> 
	<input type="radio" name="orderby" value="3" />Departamento <br /> 
	<input type="radio" name="orderby" value="4" />Cliente </td>	</table>--></form><!-- O --><table><tr><td><h4>Todo par&aacute;metro que se deje en blanco no ser&aacute; tomado en cuenta al momento de filtrar los datos.</h4></td></tr></table> </div><?php	if($null == true){echo "<br \><br \><br \><br \><br \><br \><br \><br \><h1>No se han encontrado registros de ventas. <br \>Se recomienda hacer una nueva búsqueda.</h1>";}else {	?><div id="demo"></div><?php } ?></div>
	<br /><br /><br /><br />
	<?php echo $salidapdf; ?>
	</body> 
</body></html>