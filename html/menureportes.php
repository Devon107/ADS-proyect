<?php $titulo = "Reportes"; //Titulo1 es el que va a ir en el <title>
include("./base/header.php"); /* $titulo debe estar antes de include() */
$titulo2 = "Ofertas"; //Titulo que va a ir en el cuerpo del documento
include("./base/titulo.php"); /* $titulo2 debe estar antes de include() */
include("./base/menu.php");
include('./config/db.php');
$id=$_GET['ID'];
$conn=get_db_conn();
$sql="SELECT producto,precioventa,disponible from ofertas where idoferta='$id'";
$consulta=mysql_query($sql,$conn);
$row=mysql_fetch_array($consulta);
$producto=$row['producto'];
$precioventa=$row['precioventa'];
$disponible=$row['disponible'];
/*
*/

/*
*/
	?>
	<div class="container">
			<div id="demo"></div>
	</div>
	
	<?php
	include('../html/base/footer.php');
	?>
</body>
</html>