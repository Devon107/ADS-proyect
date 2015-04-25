<?php
session_start();
if (isset($_SESSION["usuario"]))
{
  include('Usuario.php');
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Home</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>
  </head>
  <body>
  
<div class="row">
  <div class="large-12 columns">
 
     
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
           
          <li class="name">
            <h1>
              <a href="#">
                NYMSA
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
        </ul>
        <section class="top-bar-section">		
		<nav class="top-bar" data-topbar role="navigation"> 
		<ul class="title-area"> 
		<li class="name">
		<h1><a href="#">NYMSA</a></h1> 
		</li> <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone --> 
		<li class="toggle-topbar menu-icon">
		<a href="#"><span>Menu</span></a></li>
		</ul> 
		<section class="top-bar-section"> <!-- Right Nav Section --> <ul class="right">
		<li class="active"><a href="#"><?php echo $usuario ?></a></li>
		<li class="has-dropdown"> 
		<a href="#"><img class="icono" src="../static/icons/settings-icon2.png"/></a> 
		<ul class="dropdown"> 
		<li><a href="cuenta.php">Cuenta</a></li> 
		<li class="active"><a href="logout.php">Cerrar Sesión</a></li>
		</ul> 
		</li> </ul> <!-- Left Nav Section --> <ul class="left"> 
		</ul> 
		</section>
		</nav>
		
        </section>
      </nav>
    </div>
  </div>
 
  <div class="row">
    <div class="large-12 columns">
 
     

    <div class="row">
      <div class="small-12 show-for-small"><br>
        <img src="http://placehold.it/1000x600&text=For Small Screens"/>
      </div>
    </div>
 
    </div>
  </div><br>
 
  <div class="row">
    <div class="large-12 columns">
      <div class="row"> 
        <div class="large-4 small-6 columns"><a href="ingresotelemercadeo.php"><img src="../static/icons/guard.png"/>
          <h6 class="panel" align ="center">Telemercadeo</h6></a></div> 
        <div class="large-4 small-6 columns"><a href="porteria.php"><img src="../static/icons/general.png"/>
          <h6 class="panel" align ="center">Porteria</h6></a></div>    
       <div class="large-4 small-6 columns"><a href="fondodereporte.php"><img src="../static/icons/keynote_on.png"/>
          <h6 class="panel" align ="center">Ejecutivo</h6></a></div> 
      </div>
      <div>
      	<div class="large-4 small-6 columns"><a href="negocio.php"><img class="icono2" src="../static/icons/Brief-case-icon.png"/>
          <h6 class="panel" align ="center">Negocios</h6></a></div>
       <div class="large-4 small-6 columns"><a href="IngresoNotasRemision.php"><img src="../static/icons/pages_brown.png"/>
          <h6 class="panel" align ="center">Notas de Remision</h6></a></div>
        <div class="large-4 small-6 columns"><a href="IngresoConsignaciones.php"><img src="../static/icons/data_management.png"/>
          <h6 class="panel" align ="center">Consignaciones</h6></a></div>
      </div>
    </div>
  </div>
   <footer class="row">
    <div class="large-12 columns">
      <hr>
      <div class="row">
        <div class="large-6 columns" align="center">
          <p >© NYMSA DERECHOS RESERVADOS</p>
        </div>
      </div>
    </div>
  </footer>
    
  </body>
</html>
<?php
}
else{
	header('Location: index.php');
}
?>