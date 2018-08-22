<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		


$arrayDatosInsertar =  ( $_REQUEST ["store_data"]  );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {
	//	     $arrayDatosInsertar2[$key] = utf8_encode(trim($value));
	$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrayDatosInsertar = $arrayDatosInsertar2;
// var_dump($_REQUEST);
// $tarjeta="5271312345600291";

	//SI ESTA ENCONTRADA, DEBEMOS VALIDAR QUE NO EXISTA ESTE CORREO NO ESTE DADO DE ALTA
// 	$duplicada= UtilsVIP::validateUserByEmail($arrayDatosInsertar["email"]);
// 	if ($duplicada>0) {
// 		echo '{"success":false, "mensaje":"Este correo ya se encuentra registrado, favor de usar otro correo"}';
// 		exit;
// 	} //LA VALIDACION DEL USUARIO DUPLICADO SE QUITA, SOLO DEBE QUEDAR LA DE 
	
	$datosActuales= UtilsVIP::getDataByUser($arrayDatosInsertar["user"]);
	//SI NO ESTA DUPLICADA, PROCEDEMOS A REGISTRAR LA TARJETA EN LA TABLA DE USUARIOS:
	$arrayDatosInsertar["genero"]= $arrayDatosInsertar["genero"]=="false" ? 1 : 2;
	
	$actualizaPwd="";
	if($datosActuales["password"]!=$arrayDatosInsertar["password"])
		$actualizaPwd=" password=PASSWORD('".$arrayDatosInsertar["password"]."'), ";
	
	$sql="UPDATE usuarios SET NOMBRE = '".$arrayDatosInsertar["nombre"]."', A_PATERNO = '".$arrayDatosInsertar["a_paterno"]."', A_MATERNO=  '".$arrayDatosInsertar["a_materno"]."', $actualizaPwd  EMAIL='".$arrayDatosInsertar["email"]."', 
		TELEFONO='".$arrayDatosInsertar["telefono"]."', CP='".$arrayDatosInsertar["cp"]."', DIA_NAC=".$arrayDatosInsertar["dia_nac"].", MES_NAC=".$arrayDatosInsertar["mes_nac"].", YEAR_NAC=".$arrayDatosInsertar["year_nac"].", 
		GENERO=".$arrayDatosInsertar["genero"]." WHERE user ='".$arrayDatosInsertar["user"]."'";
	traedatosmysql($sql);

echo '{"success":true, "mensaje":"La modificacion de los datos fue exitosa"}';
?>