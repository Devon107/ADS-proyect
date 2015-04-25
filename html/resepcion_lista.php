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
          <center><a href="ingresoresepcion.php"><h1>Listado de resepcion</h1><a></center>
        </div>   
      </div>
    </div>  
  </div>


    <?php
	
  // extracción de datos

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
  <iframe src="../html/datatable/recepcion.php" frameborder="0" width="1000" height="500"></iframe>
    <?php
      
      include ('../html/datatable/recepcion.php')
    ?>
  </div>
  <footer class="row">
    <?php
    include ('../html/base/footer.php')
    ?>
  </footer>
</body>
</html>