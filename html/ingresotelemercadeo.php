
<!DOCTYPE html>
<html class="no-js" lang="en">
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Telemercado</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="../js/validarguion.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>
  <?php include ('../html/base/header.php'); ?>
  </head>
<body>

  <a name="Top">
   <div class="row">
    <div class="large-12 columns">
      <div class="panel">
        <center><h1>Telemercadeo</h1></center>
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
	<form method="post" action="mantenimientopersona.php">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>Numero de Cobro Pendiente Pendiente( 0 = Nuevo)</td>
				<td><input type="text" name="fecha" required pattern="[0-9]+"></td>
			</tr>
			<tr>
				<td>Gerente</td>
				<td><input type="text" name="concepto" required pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Zona</td>
				<td><input type="text" name="valor" pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Departamento</td>
				<td><input type="text" name="forma de pago" required pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Municipio</td>
				<td><input type="text" name="nombre del pagador" pattern="[a-zA-Záéíóú]+"></td>
			</tr>
			<tr>
				<td>Cliente</td>
				<td><input type="text" name="referencia" required ></td>
			</tr>
			<tr>
		      <td><div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Administrar"/>
		      </div></td>
		      <td><div align="center">
		        <input type="Eliminar" name="button" id="button2" value="Reset" class='button'/>
		      </div></td>
    		</tr>
		</table>
	</form>
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
