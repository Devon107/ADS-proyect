<?php 
	require("adodb5/adodb.inc.php");
    include("conexion.php");
	$ID =$_GET['ID'];
	$obj_db_mysql = NewADOConnection('mysqli');
	$conectar_mysql = @$obj_db_mysql->Connect("localhost", "root", "", "ci");	  
	//persona
	$consulta_general_persona = 'SELECT dui FROM persona INNER JOIN  Cliente ON Persona.idPersona = Cliente.idPersona';
    $rows_consulta_general_persona = $obj_db_mysql->Execute($consulta_general_persona);
    if (empty($rows_consulta_general_persona)) {
        $result = "No se encontraron resultados !!";
    }
	$DUI = "SELECT dui FROM persona INNER JOIN cobro ON cobro.idPersona=Persona.idPersona where cobro.idcobro= '$ID'";
	$re = mysqli_query($conn, $DUI);
	$resultado=mysqli_fetch_array($re);
	$DUI=$resultado["dui"];	
	
	$todo = "SELECT * FROM cobro INNER JOIN persona ON cobro.idPersona=Persona.idPersona where Persona.dui= '$DUI' and cobro.idcobro= '$ID'";
	$re = mysqli_query($conn, $todo);
	$resultado=mysqli_fetch_array($re);
	$fecha=$resultado["Fecha"];	
	$monto=$resultado["Monto"];	
	$telefono=$resultado["Telefono"];	
	$estado=$resultado["Estado"];	
	echo $estado;
	if($estado=='1')
		$estado="checked";
	else
		$estado="";
	  ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
 <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NYMSA | Actualizar Cobro</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="../js/validarguion.js"></script>
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
        <center><h1>Cobros</h1></center>
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
	<form method="post" action="mantactcobro.php">
		<table width="720" border="1" align="left" style="border-collaspse:collapse;">
	<tr>
		<td>ID</td>
		<td><input type="text" name="ID" value="<?php echo $ID?>" required readonly></td>
	</tr>
	<tr>
		<td>DUI</td>
 		<td><input type="text" name="DUI" value="<?php echo $DUI?>" required ></td>          
        </select> 
    </tr>
			<tr>
				<td>Fecha</td>
				<td><input type="date" name="fecha" value="<?php echo $fecha?>" required></td>
			</tr>
			<tr>
				<td>Monto</td>
				<td><input type="text" name="monto" value="<?php echo $monto?>" required pattern="[0-9]{1,}.[0-9]{2}" ></td>
			</tr>

			<tr>
				<td>Telefono</td>
				<td><input type="text" name="telefono" value="<?php echo $telefono?>" onkeyup="mascara(this,'-',sep,true)" pattern="[0-9]{4}-[0-9]{4}" maxlength="9"></td>
			</tr>
			<tr>
				<td>Pendiente:</td>
				<td>
					<input type="checkbox" name="estado" id="estado" <?php echo $estado?>> Activo<br>
			   </td>
			</tr> 
			</tr> 
			<tr>
		      <td><div align="center">
		        <input type="submit" class='button' name="button" id="button" value="Insertar"/>
		      </div></td>
		      <td><div align="center">
		        <input type="Reset" name="button" id="button2" value="Reset" class='button'/>
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
