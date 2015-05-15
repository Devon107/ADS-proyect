<?php 
	include('../config/db.php');
	$conn=get_db_conn();
	mysqli_select_db($conn, "ci");
	$ID =$_GET['ID'];
				$sq = "SELECT estado from nota_remision where id='".$ID."'";
				$re = mysql_query($sq,$conn);
				$resultado=mysql_fetch_array($re);
				$estado=$resultado["estado"];
				if ($estado=='1')
				{
					$sq="UPDATE nota_remision SET estado=0 WHERE id='$ID'";
				}else
				{
					$sq="UPDATE nota_remision SET estado=1 WHERE id='$ID'";
				}
	$consulta=mysql_query($sq,$conn);
	header('Location: ../fondodereporte.php ');
?>