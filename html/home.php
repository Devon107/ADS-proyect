<?php
 $titulo = "HOME";
  include("./base/header.php"); 
?>
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
   <?php
  include('./base/footer.php');
  ?>
  </body>
</html>
