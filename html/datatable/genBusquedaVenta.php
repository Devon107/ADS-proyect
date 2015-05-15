<?php //Todas las variables que envie el formulario de busqueda
function generabusqueda($inclusivo, $orderby, $inputgerente, $inputzona, $inputdepartamento, $inputcliente) {
	$query = "";
	$booleano = "AND";$comparador = ">";
	 //Verifica si se trata de una busqueda "inclusiva" o "exclusiva"
	if($inclusivo == true){$booleano = "OR";$comparador = "<";}
	else{$booleano = "AND";$comparador = ">";} //Fin del if de "inclusion" o "exclusion"
		if (empty($inputgerente)  == false OR empty($inputzona)  == false OR empty($inputdepartamento)  == false OR empty($inputcliente)  == false){
		$query .= " WHERE v.idventa ".$comparador." 0 "; //Condicion 100% (id>0) posible o 0% posible (id<0), necesario para que no interfiera con los booleanos AND y OR
		if(empty($inputgerente) == false) //Varifica que la variable NO este vacia
			$query .= " ".$booleano." g.gerente LIKE '%".$inputgerente."%' "; //Agrega el fragmento de condicion de busqueda (where) del query SQL
		if(empty($inputzona) == false) //Lo mismo que el if anterior pero para otras variables/parametros a tratar.
			$query .= " ".$booleano." z.zona LIKE '%".$inputzona."%' ";	
		if(empty($inputdepartamento) == false)
			$query .= " ".$booleano." d.departamento LIKE '%".$inputdepartamento."%' ";	
		if(empty($inputcliente) == false)
			$query .= " ".$booleano." c.cliente LIKE '%".$inputcliente."%' ";			
	} //fin de generacion de condiciones "WHERE..."
	if($orderby == 0 OR $orderby > 4) //Agrega el segmento "order by" a la query a generar, el numero de la 2da condicion (despues del OR) debe ser el numero del total de condiciones posibles para order by (el mayor numero posible)
		$orden = " order by v.idventa";
	if($orderby == 1)
		$orden = " order by g.gerente";
	if($orderby == 2)
		$orden = " order by z.zona";
	if($orderby == 3)
		$orden = " order by d.departamento";
	if($orderby == 4)
		$orden = " order by c.cliente";
	@$query .= $orden; //si todos los campos estan vacios la condicion "WHERE blabla bla..." queda vacia y por tanto devuelve simplemente string vacio, lleva arroba al principio para que el server no este jodiendo con advertencias.
	return $query;
} ?>