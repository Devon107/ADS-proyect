<?php 
include('conexion.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../css/Tablas_reportes.css">
</head>
<body>
	<table border="1">
		<tr>
		<th>Estilo</th><th>IDproveedor</th><th>CodigoOrigen</th><th>Linea</th><th>Descripción</th><th>IDCatalogo</th><th>Npag</th><th>IDMarca</th><th>Propiedad</th><th>Garantia</th><th>Observación</th>
		</tr>
		<?php
		@mysql_connect("localhost","root","");
		@mysql_select_db("ci") or die ("BD no existente");
		include('class.EasyPagination.php');
		@$page	= $_GET["page"];
		if ($page==NULL): $page	= 1;		endif;
		$pagination = new EasyPagination($page,2,"eng");
		$sql="SELECT * FROM producto";
		$sqlSearch=$sql;
		$pagination->setSQLSearch($sqlSearch);
		$sqlNumRows = "SELECT COUNT(estilo) AS numTotal FROM producto";
		$pagination->setSQLNumRows($sqlNumRows);
		$SQLresult = $pagination->getResultData($page);	
		echo "Showing: <strong>".$pagination->getListCurrentRecords()."</strong><br>";
		echo "Result: <strong><font color='#FF0000'>".$pagination->getTotalRecords()."</font> occurrence(s) in <font color='#FF0000'>".$pagination->getPagesFound()."</font> page(s)</strong><br>";
        echo "<br>"; 
		// Gets the links for browsing
echo $pagination->getNavigation()."<br><br>";

// Gets the links of the current page, according to the current page
// Always from 1 to 10, 11 to 20, 21 to 30, and so forth
echo $pagination->getCurrentPages();
echo "<br>";

// Gets groups of links, from 10 to 10, oscillating as follows: (X)1,(X+1)1,(X+2)1
echo $pagination->getNavigationGroupLinks();
		
		if (mysql_num_rows($SQLresult)>=1):
			echo "<br>Records: <br><br>";
			while (list($estilo,$id,$origen,$linea,$description,$IDcat,$npag,$Idmar,$prop,$garan,$Obser) = mysql_fetch_row($SQLresult)):?>
			
			<tr>
				<td><?php echo $estilo;?></td>
				<td><?php echo $id;?></td>
				<td><?php echo $origen;?></td>
				<td><?php echo $linea;?></td>
				<td><?php echo $description;?></td>
				<td><?php echo $IDcat;?></td>
				<td><?php echo $npag;?></td>
				<td><?php echo $Idmar;?></td>
				<td><?php echo $prop;?></td>
				<td><?php echo $garan;?></td>
				<td><?php echo $Obser;?></td>
			</tr>	
	<?php endWhile;?>
<?php endIf;?>
		</table>
		
		
	
</body>
</html>