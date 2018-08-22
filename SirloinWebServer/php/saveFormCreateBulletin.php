<?php
error_reporting(0);
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		
require_once 'lib/sendMailrelay.php';

$arrayDatosInsertar = json_decode (str_replace("\\","", str_replace("\\\\\"", "'", $_REQUEST ["store_data"])), true );
// var_dump($arrayDatosInsertar);
$i=0;
//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {
	$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}

//VALIDAMOS QUE NO EXISTA ESE BOLETIN EN LA TABLA
$numBoletines=num_regmysql("SELECT * FROM boletines WHERE asunto ='".$arrayDatosInsertar2["asunto"]."'");
if($numBoletines<=0)
{	
	$resultado = InsertTable("boletines", $arrayDatosInsertar2,true);
	echo "{'success':true, 'mensaje':'Se dio de alta correctamente el boletin: ".$arrayDatosInsertar2["asunto"]."'}";
}
else 
	echo "{'success':false, 'mensaje':'Ya existe un boletin con el asunto: ".$arrayDatosInsertar2["asunto"].", favor de verificar'}";


?>