<?php

include("conexion.php");
$numid;

if(isset($_POST["binsertar1"]))
{
    $nom = $_POST["nombre"];
    $dui = $_POST["dui"];
    $fec = $_POST["fecha"];	
    
    $sql = "INSERT INTO nota_remision (nombre, dui, fecha)
    VALUES ('".$nom."', '".$dui."', '".$fec."')";

    if (mysqli_query($conn, $sql) === TRUE) 
    {
        echo "Nuevo registro alamacenado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header('Location: inr_detalle.php');
}

if(isset($_POST["binsertar2"]))
{
    echo "HOla";
    $can = $_POST["cantidad"];
    $idpro = $_POST["idproducto"];
    $tot = $_POST["total"];
    session_start();
    if(isset($_SESSION['idnr']))
    {
        $idnota=$_SESSION['idnr'];
    }
    else
        $idnota=0;
    
    $sql = "INSERT INTO nota_remision_detalle (cantidad, id_producto, total, idnr)
    VALUES (".$can.", ".$idpro.", ".$tot.", ".$idnota.")";

    echo $sql;
    if (mysqli_query($conn, $sql) === TRUE) 
    {
        echo "Nuevo registro alamacenado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header('Location: inr_detalle.php');
}

if(isset($_POST["bcancelar1"]))
{
    session_start();
    unset($_SESSION['idnr']);
    header('Location: IngresoNotasRemision.php');
}

if(isset($_POST["buttonc"]))
{
    session_start();
    unset($_SESSION['idnr']);
    header('Location: IngresoNotasRemision.php');
}

if(isset($_POST["eliminar"]))
{
    session_start();
    if(isset($_SESSION['idnr']))
    {
        $idnota=$_SESSION['idnr'];
    }
    else
        $idnota=0;
    
    $sql = "DELETE FROM nota_remision WHERE id=".$idnota;
    $sql2 = "DELETE FROM nota_remision_detalle WHERE idnr=".$idnota;

    echo $sql;
    echo $sql2;
    if (mysqli_query($conn, $sql) === TRUE) 
    {
        echo "Nuevo registro eliminado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    if (mysqli_query($conn, $sql2) === TRUE) 
    {
        echo "Nuevo registro eliminado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header('Location: ingresonotasremision.php');
}

if(isset($_POST["beditar"]))
{
    $num = $_POST['numero'];
    $nom = $_POST["nombre"];
    $dui = $_POST["dui"];
    $fec = $_POST["fecha"];	
    
    $sql = "UPDATE nota_remision SET nombre='".$nom."', dui='".$dui."', fecha='".$fec."' WHERE id=".$num;

    if (mysqli_query($conn, $sql) === TRUE) 
    {
        echo "Registro actualizado satisfactoriamente.";
    } else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    header('Location: ingresonotasremision.php');
}

//olddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
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