
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Notas de Remision</title>	
    <link rel="stylesheet" href="../css/foundation.css" type="text/css" media="screen"/>
    <script src="js/vendor/modernizr.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>
  <script src="../js/ie-row.js" type="text/javascript"></script>
  <script src="../js/jquery-2.1.4.js" type="text/javascript"></script>
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
<!-- FORMULARIO -->
        <form method="post"> <!-- line -->
           
            <INPUT type="button" value="Add Row" onclick="addRow('dataTable');" />
<INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable');" />

<TABLE id="dataTable" width="700px" border="1">
<TR>
<TD><INPUT disabled="true" type="checkbox" NAME="chk"/></TD>
<TD> Cantidad </TD>
<TD> ID Producto </TD>
<TD> Total </TD>
</TR>
<TR>
<TD><INPUT disabled="true" type="checkbox" NAME="chk"/></TD>
<TD> <input value="" type="text" name="cantidad" id="cantidad"  required  /> </TD>
<TD> <input value="" type="text" name="idproducto" id="idproducto"  required  /> </TD>
<TD> <input value="" type="text" name="total" id="total"  required  /> </TD>
</TR>
</TABLE>

        <input type="submit" onclick="this.form.action='man_nota_remision.php'" class='button' name="binsertar2" id="binsertar2" value="Insertar"  />
        <input type="submit" onclick="this.form.action='man_nota_remision.php'" class='button' name="bcancelar1" id="bcancelar1" value="Cancelar"  />

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
