      <?php $titulo = "Reportes";
	  include("./base/headerreportes.php"); /* $titulo debe estar antes de include() */
		
	  ?>
	  <div align="center">
	    <div>
        <div align="center" class="large-13 about-box">
        <div>
        <form action="" method="POST">
	
		<section class="top-bar-section">
		
		<nav class="top-bar" data-topbar role="navigation"> 
			<section class="top-bar-section"> <!-- Right Nav Section --> <ul class="left">
		<li class="has-dropdown"> 
			<a href="#">Seleccione Una Opcion</a> 
			<ul class="dropdown"> 
						<li ><input type="submit"  name="totaldiocobromes" class="button7" id="totaldiocobromes" value="Total de Cobro por Mes"/>	</li>			
						<li ><input type="submit" name="promediocobromes" class="button7" id="promediocobromes" value="Promedio de Cobro por Mes"/>	</li>		
						<li ><input type="submit" name="promedioventames" class="button7" id="promedioventames" value="Promedio de Venta por Mes"/>	</li>
			</ul> 
		</li> 
		</ul> 
		</section>
		</nav>
		
        </section>
		
			
			
		</form>
        </div>
		<div class="black-box">
          <?php
            if(isset($_POST['totaldiocobromes']))
            { ?><iframe src="totalcobromes.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
		    else if(isset($_POST['promediocobromes']))
            { ?><iframe src="promediocobromes.php" frameborder="0" width="1000" height="500"></iframe><?php
          }
		  else if(isset($_POST['promediocobromes']))
            { ?><iframe src="#" frameborder="0" width="1000" height="500"></iframe><?php
          }
		  else
            echo"<p>Para generar reportes seleccione una opci&oacuten del men&uacute</p>";
          ?>
        </div>
         </div>
      </div>
      </div>
<?php include("./base/footerreportes.php"); ?>