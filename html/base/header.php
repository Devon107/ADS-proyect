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
<title><?php echo $titulo; ?></title>
  <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/foundation.css"/>
  <link rel="stylesheet" href="../css/Tablas_reportes.css">
    <script src="js/vendor/modernizr.js"></script>
  <script src="../js/shortcut.js" type="text/javascript"></script>
      <script>var sep = new Array(4,4)
var sep2 = new Array(4,6,3,1)
var sep3 = new Array(8,1)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
  val = d.value
  largo = val.length
  val = val.split(sep)
  val2 = ''
  for(r=0;r<val.length;r++){
    val2 += val[r]  
  }
  if(nums){
    for(z=0;z<val2.length;z++){
      if(isNaN(val2.charAt(z))){
        letra = new RegExp(val2.charAt(z),"g")
        val2 = val2.replace(letra,"")
      }
    }
  }
  val = ''
  val3 = new Array()
  for(s=0; s<pat.length; s++){
    val3[s] = val2.substring(0,pat[s])
    val2 = val2.substr(pat[s])
  }
  for(q=0;q<val3.length; q++){
    if(q ==0){
      val = val3[q]
    }
    else{
      if(val3[q] != ""){
        val += sep + val3[q]
        }
    }
  }
  d.value = val
  d.valant = val
  }
}</script>
  </head>
  <body>
    <section class="hero">
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
        <h1><a href="home.php">NYMSA</a>
      </h1> 
      </li> <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone --> 
      <li class="toggle-topbar menu-icon">
        <a href="#"><span>Menu</span></a>
      </li>
    </ul> 
      <section class="top-bar-section"> <!-- Right Nav Section --> <ul class="right">
      <li class="active">
        <a href="#"><?php echo $usuario ?></a>
      </li>
      <li class="has-dropdown"> 
      <a href="#"><img class="icono" src="../static/icons/settings-icon2.png"/></a> 
      <ul class="dropdown"> 
      <li><a href="cuenta.php">Cuenta</a></li> 
      <li class="active"><a href="logout.php">Cerrar Sesi&oacute;n</a></li>
    </ul> 
    </li> </ul> <!-- Left Nav Section --> <ul class="left"> 
    </ul> 
    </section>
    </nav>
    
        </section>
      </nav>
    </div>
  </div>
  <?php
}
else{
	header('Location: index.php');
}
?>
