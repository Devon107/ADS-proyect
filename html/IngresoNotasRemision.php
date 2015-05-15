
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Notas de Remision</title>	
    <link rel="stylesheet" href="../css/foundation.css" type="text/css" />
    <script src="js/vendor/modernizr.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>

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
session_start();
$_SESSION['idnr']=$numid;
?>
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
		<h1><a href="home.php">NYMSA</a></h1> 
		</li> <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone --> 
		<li class="toggle-topbar menu-icon">
		<a href="#"><span>Menu</span></a></li>
		</ul> 
		<section class="top-bar-section"> <!-- Right Nav Section --> <ul class="right">
		<li class="active"><a href="#"><?php echo "usuario" ?></a></li>
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
        <form method="post"> <!-- line -->
  <table width="720" border="1" align="left" style="border-collapse:collapse">
      <tr>
      <td width="242">Numero de nota de remision:</td>
      <td colspan="2"><label for="numero"></label>
          <!--<input disabled="true" placeholder="" type="text" value="<?php echo "$numid" ?>" name="numero" id="numero" required autofocus pattern="[0-9]+" />-->
          <?php echo "$numid" ?>
      </td>
	  
    </tr>
  <tr>
      <td width="242">Nombre:</td>
      <td width="253"  colspan="2"><label for="dui"></label>
      <input placeholder="Pedro Joven" value="" type="text" name="nombre" id="nombre"  required  /></td>
	  
    </tr>
  <tr>
      <td width="242">DUI:</td>
      <td width="253" colspan="2"><label for="dui"></label>
      <input placeholder="45612345-2" value="" type="text" name="dui" id="dui"  required /></td>
	  
    </tr>	
	  <tr>
      <td width="242">Fecha:</td>
      <td  colspan="2"><label for="fecha"></label>
      <input type="date" name="fecha" value="" id="fecha"  required>
      </tr> 
    <tr>
    <tr>
        <td colspan="3"><div align="center">
        <input type="submit" onclick="this.form.action='man_nota_remision.php'" class='button' name="binsertar1" id="binsertar1" value="Insertar"  />
      </div></td>
      
    </tr>
    <tr>
      <td><div align="center">
        <input type="submit" onclick="this.form.action='inr_buscar.php'" class='button' name="buttonbb" id="buttonbb" value="Buscar"  />
      </div></td>
      <td><div align="center">
        <input type="submit" onclick="this.form.action='inr_editar.php'" class='button' name="buttoned" id="buttoned" value="Editar" />
      </div></td>
      <td><div align="center">
        <input type="submit" onclick="this.form.action='inr_eliminar.php'"  class='button' name="buttonbb" id="buttonbb" value="Eliminar" />
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
