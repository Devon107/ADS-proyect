<?php 
	include('../config/db.php');
	$conn=get_db_conn();
	mysqli_select_db($conn, "ci");
	$ID =$_GET['ID'];
				$sq = "SELECT estado from consignacion where IDConsignaciones='".$ID."'";
				$re = mysql_query($sq,$conn);
				$resultado=mysql_fetch_array($re);
				$estado=$resultado["estado"];
				if ($estado=='1')
				{
					$sq="UPDATE consignacion SET estado=0 WHERE IDConsignaciones='$ID'";
				}else
				{
					$sq="UPDATE consignacion SET estado=1 WHERE IDConsignaciones='$ID'";
				}
	$consulta=mysql_query($sq,$conn);
	header('Location: ../fondodereporte.php ');
?>