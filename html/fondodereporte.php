      <?php $titulo = "Reportes";
	  include("./base/headerreportes.php"); /* $titulo debe estar antes de include() */
    //include("./base/header.php");
		
	  ?>
	  <div align="center">
	    <div>
        <div align="center" class="large-13 about-box">
        <div>
        <form action="" method="POST">
          <div class="opciones"><input class="button" type="submit" name="boton1" value="Venta"></div>
          <div class="opciones"><input class="button" type="submit" name="boton2" value="Oferta"></div>
          <div class="opciones"><input class="button" type="submit" name="boton3" value="Premio"></div>
          <div class="opciones"><input class="button1" type="submit" name="boton4" value="Pendiente"></div>
          <div class="opciones"><input class="button" type="submit" name="boton5" value="Cobros"></div>
          <div class="opciones"><input class="button" type="submit" name="boton6" value="Historial"></div>
          <div class="opciones"><input class="button" type="submit" name="boton7" value="Notas"></div>
          <div class="opciones"><input class="button1" type="submit" name="boton8" value="Promocion"></div>
          <div class="opciones"><input class="button1" type="submit" name="boton9" value="Consignacion"></div>
        </form>
        </div>
          <div class="black-box">
          <?php
            if(isset($_POST['boton0']))
            { ?><iframe src="datatable/venta.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
		    if(isset($_POST['boton1']))
            { ?><iframe src="datatable/venta.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton2']))
            {  ?><iframe src="datatable/oferta.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton3']))
            { ?><iframe src="datatable/premios.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton4']))
            { ?><iframe src="datatable/pendientes.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton5']))
            { ?><iframe src="datatable/cobro.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton6']))
            { ?><iframe src="datatable/hisCobro.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton7']))
            { ?><iframe src="datatable/nota.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton8']))
            { ?><iframe src="datatable/promocion.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
          if(isset($_POST['boton9']))
            { ?><iframe src="datatable/consignacion.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
            echo"<p>Para generar reportes seleccione una opci&oacuten del men&uacute</p>";
          ?>
        </div>
         </div>
      </div>
      </div>
<?php include("./base/footerreportes.php"); ?>