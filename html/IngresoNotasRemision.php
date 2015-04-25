
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Notas de Remision</title>	
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>
  <?php
    $numid="";
    $art="";
    $nom="";
    $dui="";
    $can="";
    $pre="";
    $fec="";
    include("man_nota_remision.php");
    include ('../html/base/header.php'); 
  ?>
  </head>
  <body>

  

 
  
 <a name="Top">
   <div class="row">
    <div class="large-12 columns">
      <div class="panel">
        <center><h1>Notas de Remisión</h1></center>
      </div>
    </div>
  </div>
  
  <div class="row">
    <div class="large-3 columns">
      <h1><img src="../img/logo.png"/></h1>
    </div>
    <div class="large-9 columns">
      <ul class="inline-list right">
        <li><a href="#">Home</a></li>
        <li><a href="#Top">Desplazar hacia arriba</a></li>
		<li><a href="#primernombre">Desplazar el centro</a></li>
        <li><a href="#Bot">Desplazar hacia abajo</a></li>

      </ul>
    </div>
  </div>
  
   
  
  
  <div class="row">    
    
     
     
    <div class="large-9 push-3 columns">
      <form action="IngresoNotasRemision.php" method="post"> <!-- line -->
  <table width="720" border="1" align="left" style="border-collapse:collapse">
      <tr>
      <td width="242">Numero de nota de remision:</td>
      <td><label for="numero"></label>
          <input placeholder="" type="text" value="<?php echo $numid; ?>" name="numero" id="numero" required autofocus pattern="[0-9]+" /></td>
	  
    </tr>
    <tr>
      <td width="242">Articulo:</td>
      <td><label for="articulo"></label>
      <input placeholder="A52" type="text" value="<?php echo $art; ?>" name="articulo" id="articulo" required autofocus pattern="[A-Z]{1}[0-9]+" /></td>
	  
    </tr>
  <tr>
      <td width="242">Nombre:</td>
      <td width="253"><label for="dui"></label>
      <input placeholder="Pedro Joven" value="<?php echo $nom; ?>" type="text" name="nombre" id="nombre"  required  /></td>
	  
    </tr>
  <tr>
      <td width="242">DUI:</td>
      <td width="253"><label for="dui"></label>
      <input placeholder="45612345-2" value="<?php echo $dui; ?>" type="text" name="dui" id="dui"  required /></td>
	  
    </tr>
    <tr>
      <td width="242">Cantidad:</td>
      <td ><label for="cantidad"></label>
      <input type="text" placeholder="12" value="<?php echo $can; ?>" name="cantidad" id="cantidad"  required>
      </tr>	
	  <tr>
      <td width="242">Precio:</td>
      <td ><label for="precio"></label>
      <input type="text" placeholder="40.50" value="<?php echo $pre; ?>" name="precio" id="precio"  required>
      </tr> 	
	  <tr>
      <td width="242">Fecha:</td>
      <td ><label for="fecha"></label>
      <input type="date" name="fecha" value="<?php echo $fec; ?>" id="fecha"  required>
      </tr> 
    <tr>
    <tr>
      <td><div align="center">
        <input type="submit" class='button' name="button" id="button" value="Insertar"  />
      </div></td>
      <td><div align="center">
        <input type="reset" class='button' name="buttone" id="buttone" value="Eliminar" />
      </div></td>
    </tr>
    <tr>
      <td><div align="center">
        <input type="submit" class='button' name="buttonb" id="buttonb" value="Buscar"  />
      </div></td>
      <td><div align="center">
        <input type="reset" class='button' name="buttoned" id="buttoned" value="Editar" />
      </div></td>
    </tr>
  </table>
  </form> <!-- line -->
    </div>
    
    
     
     
    <div class="large-3 pull-9 columns">
        
      <ul class="side-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#Top">Desplazar hacia arriba</a></li>
		<li><a href="#primernombre">Desplazar el centro</a></li>
        <li><a href="#Bot">Desplazar hacia abajo</a></li>
      </ul>
      
      <p><img src="../img/addnymsa2.jpg"/></p>
        
    </div>
    
  </div>
    
  
   
  
  <footer class="row">
    <div class="large-12 columns">
      <hr/>
      <div class="row">
        <div class="large-6 columns">
          <p>© Copyright Negocios y Mas S.A. de C.V.</p>
        </div>
        <div class="large-6 columns">
          <ul class="inline-list right">
        <li><a href="#">Home</a></li>
        <li><a href="#Top">Desplazar hacia arriba</a></li>
		<li><a href="#primernombre">Desplazar hacia el centro</a></li>

          </ul>
        </div>
      </div>
    </div> 
  </footer>
   
    <a name="Bot">
    
  </body>
</html>