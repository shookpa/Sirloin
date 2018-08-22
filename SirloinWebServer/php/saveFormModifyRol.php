<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		


$arrayDatosInsertar =  json_decode ( str_replace("\\", "", $_REQUEST ["store_data"]), true );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {

		$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrayDatosInsertar = $arrayDatosInsertar2;
$arrayDatosInsertar["status"]=1;
// var_dump($arrayDatosInsertar);
UpdateTable('cat_roles', $arrayDatosInsertar,"id_rol");
	
	
echo '{"success":true, "mensaje":"La actualizacion del rol fue exitoso"}';
?>