<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		


$arrayDatosInsertar =  json_decode ( str_replace("\\", "", $_REQUEST ["store_data"]), true );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {
	//	     $arrayDatosInsertar2[$key] = utf8_encode(trim($value));
	if ($key=="restaurantes") {
// 		$restaurantes =  json_decode($value);
		$restaurantes =  $value;
// 		var_dump($value);
		foreach ( $value  as $keyC => $valueC ) {
// 						echo "--------$keyC => $valueC----------";
			$restaurantes [$i] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $valueC ) ) );
			$i++;
		}
		
	}
	else
		$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrayDatosInsertar = $arrayDatosInsertar2;

InsertTable('cat_restaurantes', $arrayDatosInsertar,true);
	
	//EN EL CASO DE QUE ESTO SEA CORRECTO, DEBEMOS CREAR LA TABLA DEL RESTAURANT. 


echo '{"success":true, "mensaje":"El registro del restaurante fue exitoso"}';
?>