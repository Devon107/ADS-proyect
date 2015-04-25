<?php
include('conexion.php');
$sql="SELECT usuario from empleado where usuario='".$_SESSION["usuario"]."'";
$res=mysqli_query($conn,$sql);
$array=mysqli_fetch_array($res);
$usuario=$array['usuario'];
?>