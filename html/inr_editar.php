
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Notas de Remision</title>	
    <link rel="stylesheet" href="http://localhost/ads2/css/foundation.css" type="text/css" />
    <script src="js/vendor/modernizr.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>

<?php
include("conexion.php");
$num=0;
$nom = "";
$dui = "";
$fec = "";

if(isset($_POST["buttonbb"]))
{
    $num=0;
    $nom = "";
    $dui = "";
    $fec = "";
   
}

if(isset($_POST["buttonb"]))
{
    $num = $_POST['numero'];
    
    
    $sql = "SELECT * FROM nota_remision where id=".$num;

    $result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)<>"0")
{
while($row=mysqli_fetch_array($result))
{
    $nom = $row[1];
    $dui = $row[2];
    $fec = $row[4];
    break;
}
    $sql = "SELECT * FROM nota_remision_detalle where idnr=".$num;
    $result=mysqli_query($conn,$sql);

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
      <td>Numero de nota de remision:</td>
      <td >
          <input type="text" value="" name="numero" id="numero" required autofocus pattern="[0-9]+" />
      </td>
    </tr>
    <tr>
        <td >
            <input type="submit" onclick="this.form.action='inr_editar.php'" class='button' name="buttonb" id="buttonb" value="Editar"  />
        </td>
        <td >
            <input type="submit" onclick="this.form.action='IngresoNotasRemision.php'" class='button' name="buttonc" id="buttonc" value="Cancelar"  />
        </td>
    </tr>
  </table>
            <br><br><br><br><br><br><br><br><br>
  <table width="720" border="1" align="left" style="border-collapse:collapse">
  <tr>
      <td width="242">Numero NR:</td>
      <td width="253"  colspan="2"><label for="dui"></label>
      <input disable="true" placeholder="Pedro Joven" value="<?php echo $num; ?>" type="text" name="tnr" id="tnr"  required  /></td>
	 
    </tr>
  <tr>
      <td width="242">Nombre:</td>
      <td width="253"  colspan="2"><label for="dui"></label>
      <input placeholder="Pedro Joven" value="<?php echo $nom; ?>" type="text" name="nombre" id="nombre"  required  /></td>
	
    </tr>
  <tr>
      <td width="242">DUI:</td>
      <td width="253" colspan="2"><label for="dui"></label>
      <input placeholder="45612345-2" value="<?php echo $dui; ?>" type="text" name="dui" id="dui"  required /></td>
	
    </tr>	
	  <tr>
      <td width="242">Fecha:</td>
      <td  colspan="2"><label for="fecha"></label>
      <input type="date" name="fecha" value="<?php echo $fec; ?>" id="fecha"  required>
      </tr> 
    <tr>
    
  </table>
  
  <br><br><br><br><br><br><br><br><br>          
            
  <?php
  echo "<table width='720' border='1' align='left' style='border-collapse:collapse'> <tr> <td>Cantidad</td> <td>ID Producto</td> <td>Total</td> </tr> ";
  while($row=mysqli_fetch_array($result))
    {
    $v1 = $row[1];
    $v2 = $row[2];
    $v3 = $row[3];
    echo "<tr> <td width='240'><input name='v1[]' value='$v1' type='text' required /></td> <td width='240'><input name='v2[]' value='$v2' type='text' required /></td> <td width='240'><input name='v3[]' value='$v3' type='text' required /></td> </tr>";
    }
    echo"</table>";
  }
    $conn->close();
    ?>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <input type="submit" onclick="this.form.action='man_nota_remision.php'" class='button' name="beditar" id="beditar" value="Confirmar"  />
  <?php
  }
  
    //--------------------------------------------------------------------------------------------------------
  else
{
    
    

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
      <td>Numero de nota de remision:</td>
      <td >
          <input type="text" value="" name="numero" id="numero" required autofocus pattern="[0-9]+" />
      </td>
    </tr>
    <tr>
        <td >
            <input type="submit" onclick="this.form.action='inr_editar.php'" class='button' name="buttonb" id="buttonb" value="Editar"  />
        </td>
        <td >
            <input type="submit" onclick="this.form.action='IngresoNotasRemision.php'" class='button' name="buttonc" id="buttonc" value="Cancelar"  />
        </td>
    </tr>
  </table>      
            
  <?php
  
  }
  ?>
            
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