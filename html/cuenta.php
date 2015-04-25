<?php 

    
	session_start();
	
if (isset($_SESSION["usuario"]))
{
	include('Usuario.php');


?>
<!DOCTYPE html>
<html class="no-js" lang="en">
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Registro Persona</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="../js/validarguion.js"></script>

  </head>
  <script src="../js/jquery.js" language="javascript"></script>
  
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
		<li class="active"><a href="#"><?php echo $usuario ?></a></li>
		<li class="has-dropdown"> 
		<a href="#"><img class="icono" src="../static/icons/settings-icon2.png"/></a> 
		<ul class="dropdown"> 
		<li class="active"><a href="logout.php">Cerrar Seción</a></li>
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
        <center><h1>Cambio de contrase&ntildea</h1></center>
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
	<form method="post" action="nuevacontrasena.php">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
			<tr>
				<td>Contrase&ntildea actual</td>
				<td><input type="password" name="passold" id="passold" required></td>
			</tr>
			<tr>
				<td>Nueva contrase&ntildea</td>
				<td><input type="password" name="passnew" id="passnew" required></td>
			</tr>
			<tr>
				<td>Confirmar contrase&ntildea</td>
				<td><input type="password" name="passnew1" onkeyup="verificarClave();" id="passnew1" required></td>
			</tr>
			<tr>
		      <td><div align="center">
		        <input type="submit" class='button' disabled="disabled" name="button" id="button" value="Guardar"/>
		      </div></td>
		      <td><div align="center">
		        <input type="reset" name="button" id="button2" value="Reset" class='button'/>
		      </div></td>
    		</tr>
		</table>
		<div id='div' style='color:#FF0000;background:#99F;Display:none'><p><strong>Las  Claves no coinciden</strong></p></div>
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
   <script type="text/javascript">
   		function verificarClave(){
        div1 = document.getElementById('div');
   			var pass = $('#passnew').val();
   			var pass1 = $('#passnew1').val();
   			if(pass1!=pass){
          div1.style.display = 'block';
          $('#div').show(slow);
   				$('#button').attr("disabled","disabled");

   			}else{
          div1.style.display = 'none';
   				$('#button').removeAttr("disabled");
          $('#div').hide("slow");
   			}
   		};
   </script>
    <a name="Bot">
</body>
</html>
<?php
}
else{
	header('Location: index.php');
}
?>