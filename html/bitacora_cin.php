<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NYMSA | Cambios</title>
  <link rel="stylesheet" href="../css/foundation.css" />
  <script src="../js/vendor/modernizr.js"></script>
  <?php
  include ('../html/base/header.php')
  ?>
</head>
<body>
  <div class="row">
    <div class="large-12 columns">
      <div class="row">
        <div class="panel">
         <div>
          <center><a href="porteria_in.php"><h1>Listado de cambios Ingresados</h1><a></center>
        </div>   
      </div>
    </div>  
  </div>


    <?php
	
  // extracción de datos

  $mysqli = new mysqli("localhost", "root", "", "ci"); // host, usuario, contraserña, base de datos

  if($mysqli->connect_errno){
    echo "No se pudo conectar a Mysql: ".$mysqli->connect_errno;
  }

  $query = "SELECT porteria_ce.factura_in, porteria_ce.producto_in, color.nombre, talla.talla, porteria_ce.fecha FROM porteria_ce INNER JOIN color ON porteria_ce.id_color = color.idcolor INNER JOIN talla ON talla.idtalla = porteria_ce.id_talla";

  $resultado = $mysqli->query($query);
/*
  while ($fila = $resultado->fetch_assoc()) {
    echo $fila['factura_in']." ";
    echo $fila['producto_in']." ";
    echo $fila['id_color']." ";
    echo $fila['id_talla']." ";
    echo $fila['fecha']."<br />";
  } */
  ?>
  <div>
  <iframe src="../html/datatable/porteria.php" frameborder="0" width="1000" height="500"></iframe>
  </div>
  <footer class="row">
    <?php
    include ('../html/base/footer.php')
    ?>
  </footer>
</body>
</html>