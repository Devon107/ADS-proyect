<?php
/////////////////////////////////////////////////////////////////////////////
//   http://blog.timersys.com/php/paginacion-con-php-y-mysql-3-estilos/   //
////////////////////////////////////////////////////////////////////////////
//INCLUYO LA HOJA DE ESTILOS
?>
<meta charset="utf-8" />
<link href="../css/paginacion.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" type='text/css' href="../css/Tablas_reportes.css">
<?php
include('../config/db.php');
$conn=get_db_conn();

//AL PRINCIPIO COMPRUEBO SI HICIERON CLICK EN ALGUNA PÁGINA
if(isset($_GET['page'])){
    $page= $_GET['page'];
}else{
//SI NO DIGO Q ES LA PRIMERA PÁGINA
    $page=1;
}

//ACA SE SELECCIONAN TODOS LOS DATOS DE LA TABLA
$consulta="SELECT o.idOrdenDeVenta, o.fechaCreacion, o.fechaEntrega, CONCAT(p.Primer_Nombre, ' ', p.Primer_Apellido) AS cliente, IF(o.estado=1,'Si','No') AS estado, e.cantidad FROM ordendeventa AS o INNER JOIN cliente AS c ON c.idCliente = o.idCliente INNER JOIN persona AS p ON p.idPersona = c.idPersona INNER JOIN detalleordendeventa AS e ON e.idordendeventa=o.idordendeventa";
$datos=mysql_query($consulta,$conn);

//MIRO CUANTOS DATOS FUERON DEVUELTOS
$num_rows=mysql_num_rows($datos);

//ACA SE DECIDE CUANTOS RESULTADOS MOSTRAR POR PÁGINA , EN EL EJEMPLO PONGO 15
$rows_per_page= 5;

//CALCULO LA ULTIMA PÁGINA
$lastpage= ceil($num_rows / $rows_per_page);

//COMPRUEBO QUE EL VALOR DE LA PÁGINA SEA CORRECTO Y SI ES LA ULTIMA PÁGINA
$page=(int)$page;
$lastpage=(int)$lastpage;
if($page > $lastpage){
    $page= $lastpage;
}
if($page < 1){
    $page=1;
}

//CREO LA SENTENCIA LIMIT PARA AÑADIR A LA CONSULTA QUE DEFINITIVA
$limit= ' LIMIT '. ($page -1) * $rows_per_page . ',' .$rows_per_page;

//REALIZO LA CONSULTA QUE VA A MOSTRAR LOS DATOS (ES LA ANTERIO + EL $limit)
$consulta .="$limit";
$peliculas=mysql_query($consulta,$conn);

if(!$peliculas){
        //SI FALLA LA CONSULTA MUESTRO ERROR
 die('Invalid query: ' . mysql_error());
}else{
      //SI ES CORRECTA MUESTRO LOS DATOS
      ?> <div align="center"><table><thead>
     <tr>
                            <th>Fecha Inicio</th>
                            <th>Duracion</th>
                            <th>Producto</th>
                            <th>Valor</th>
                            <th>condicion</th>
                        </tr>
        </thead>
        <tbody>
   <?php while ($row = mysql_fetch_assoc($peliculas)){?>
      
  <?php }?>
      </tbody>
      </table>
      </div>
<?php
//UNA VEZ Q MUESTRO LOS DATOS TENGO Q MOSTRAR EL BLOQUE DE PAGINACIÓN SIEMPRE Y CUANDO HAYA MÁS DE UNA PÁGINA

if($num_rows != 0){
   $nextpage= $page +1;
   $prevpage= $page -1;
?><ul id="pagination-digg"><?php
//SI ES LA PRIMERA PÁGINA DESHABILITO EL BOTON DE PREVIOUS, MUESTRO EL 1 COMO ACTIVO Y MUESTRO EL RESTO DE PÁGINAS
 if ($page == 1) {
    ?>
      <li class="previous-off">&laquo; Previous</li>
      <li class="active">1</li> <?php
    for($i= $page+1; $i<= $lastpage ; $i++){?>
            <li><a href="Busquedaventa.php?page=<?php echo $i;?>"><?php echo $i;?></a></li>
 <?php }
       //Y SI LA ULTIMA PÁGINA ES MAYOR QUE LA ACTUAL MUESTRO EL BOTON NEXT O LO DESHABILITO
    if($lastpage > $page ){?>       
      <li class="next"><a href="Busquedaventa.php?page=<?php echo $nextpage;?>" >Next &raquo;</a></li><?php
    }else{?>
      <li class="next-off">Next &raquo;</li>
<?php  }
 } else {
    
    //EN CAMBIO SI NO ESTAMOS EN LA PÁGINA UNO HABILITO EL BOTON DE PREVIUS Y MUESTRO LAS DEMÁS
  ?>
      <li class="previous"><a href="Busquedaventa.php?page=<?php echo $prevpage;?>"  >&laquo; Previous</a></li><?php
      for($i= 1; $i<= $lastpage ; $i++){
                       //COMPRUEBO SI ES LA PÁGINA ACTIVA O NO
            if($page == $i){
        ?>  <li class="active"><?php echo $i;?></li><?php
            }else{
        ?>  <li><a href="Busquedaventa.php?page=<?php echo $i;?>" ><?php echo $i;?></a></li><?php
            }
      }
         //SI NO ES LA ÚLTIMA PÁGINA ACTIVO EL BOTON NEXT    
      if($lastpage >$page ){    ?> 
      <li class="next"><a href="Busquedaventa.php?page=<?php echo $nextpage;?>">Next &raquo;</a></li><?php
      }else{
    ?> <li class="next-off">Next &raquo;</li><?php
      }
 }   
?></ul></div>
<?php
}
}?>