<?php

include("conexion.php");
$numid;

// Obtener id
$sql="SELECT id FROM nota_remision ORDER BY id DESC LIMIT 1;";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)<>"0")
{
while($row=mysqli_fetch_array($result))
{
    $numid=$row[0];
    $numid=(int)$numid;
    $numid=$numid+1;
    break;
}
}


if(isset($_POST["button"]))
{
    //$num = $_POST['numero'];
    $art = $_POST["articulo"];
    $nom = $_POST["nombre"];
    $dui = $_POST["dui"];
    $can = $_POST["cantidad"];
    $pre = $_POST["precio"];
    $fec = $_POST["fecha"];	
    
    //$sql = "INSERT INTO nota_remision (numero, articulo, nombre, dui, cantidad, precio, fecha)
    //VALUES (".$num.", '".$art."', '".$nom."', '".$dui."', ".$can.", ".$pre.", '".$fec."')";
    
    $sql = "INSERT INTO nota_remision (articulo, nombre, dui, cantidad, precio, fecha)
    VALUES ('".$art."', '".$nom."', '".$dui."', ".$can.", ".$pre.", '".$fec."')";

    if (mysqli_query($conn, $sql) === TRUE) 
    {
        echo "Nuevo registro alamacenado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

if(isset($_POST["buttonb"]))
{
    $num = $_POST['numero'];
    $art = $_POST["articulo"];
    $nom = $_POST["nombre"];
    $dui = $_POST["dui"];
    $can = $_POST["cantidad"];
    $pre = $_POST["precio"];
    $fec = $_POST["fecha"];	
    
    //$sql = "INSERT INTO nota_remision (numero, articulo, nombre, dui, cantidad, precio, fecha)
    //VALUES (".$num.", '".$art."', '".$nom."', '".$dui."', ".$can.", ".$pre.", '".$fec."')";
    
    $sql = "SELECT * FROM nota_remision where id=".$num;

    $result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)<>"0")
{
while($row=mysqli_fetch_array($result))
{
    $numid = $row[0];
    $art = $row[2];
    $nom = $row[3];
    $dui = $row[4];
    $can = $row[5];
    $pre = $row[6];
    $fec = $row[7];
    break;
}
}
    $conn->close();
}

if(isset($_POST["buttoned"]))
{
    $num = $_POST['numero'];
    $art = $_POST["articulo"];
    $nom = $_POST["nombre"];
    $dui = $_POST["dui"];
    $can = $_POST["cantidad"];
    $pre = $_POST["precio"];
    $fec = $_POST["fecha"];	
    
    //$sql = "INSERT INTO nota_remision (numero, articulo, nombre, dui, cantidad, precio, fecha)
    //VALUES (".$num.", '".$art."', '".$nom."', '".$dui."', ".$can.", ".$pre.", '".$fec."')";
    
    $sql = "UPDATE nota_remision SET articulo='".$art."', nombre='".$nom."', dui='".$dui."', cantidad=".$can.", precio=".$pre.", fecha='".$fec."' WHERE id=".$num;

    if (mysqli_query($conn, $sql) === TRUE) 
    {
        echo "Registro actualizado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>