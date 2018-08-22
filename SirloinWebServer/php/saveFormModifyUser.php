<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';

$arrayDatosInsertar = json_decode ( str_replace("\\", "", $_REQUEST ["store_data"]), true );
// echo str_replace("\\", "", $_REQUEST ["store_data"]);
// var_dump($arrayDatosInsertar);
// COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {
	// $arrayDatosInsertar2[$key] = utf8_encode(trim($value));
	if ($key == "restaurantes") {
		$restaurantes =  ( $value );
// 		var_dump($value);
		foreach ( $value as $keyC => $valueC ) {
			// echo "--------$keyC => $valueC----------";
			$restaurantes [$i] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $valueC ) ) );
			$i ++;
		}
	} else
		$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrayDatosInsertar = $arrayDatosInsertar2;
// var_dump($_REQUEST);


$arrayDatosInsertar ["genero"] = 0;
if (! ($arrayDatosInsertar ["rol_user"] >= 1))
	$arrayDatosInsertar ["rol_user"] = 0;
if (! ($arrayDatosInsertar ["id_empresa"] >= 1))
	$arrayDatosInsertar ["id_empresa"] = 0;
$arrayDatosInsertar ["num_vip"] = $numVip;
$datosActuales= UtilsVIP::getDataById($arrayDatosInsertar["id"]);

$actualizaPwd="";
if($datosActuales["password"]!=$arrayDatosInsertar["password"])
	$actualizaPwd=" password=PASSWORD('".$arrayDatosInsertar["password"]."'), ";
$idUser=$arrayDatosInsertar ["id"];
$sql = "UPDATE usuarios SET 
		 NOMBRE = '".$arrayDatosInsertar["nombre"]."', A_PATERNO = '".$arrayDatosInsertar["a_paterno"]."', A_MATERNO=  '".$arrayDatosInsertar["a_materno"]."', $actualizaPwd   
		EMAIL='".$arrayDatosInsertar["email"]."', TELEFONO='".$arrayDatosInsertar["telefono"]."', tipoUser='".$arrayDatosInsertar["tipoUser"]."',rol_user='".$arrayDatosInsertar["rol_user"]."',
		id_empresa='".$arrayDatosInsertar["id_empresa"]."'
		WHERE id=$idUser";

// echo $sql;
traedatosmysql ( $sql );


DeleteFisico('rel_usu_rest', "id_usu",$idUser);
foreach ( $restaurantes as $key => $value ) {
	// echo "--------$key => $value----------";
	$arrayDatosInsertarRest ["id_rest"] = $value;
	$arrayDatosInsertarRest ["id_usu"] = $idUser;
	InsertTable ( 'rel_usu_rest', $arrayDatosInsertarRest, true );
}

echo '{"success":true, "mensaje":"El registro del usuario fue exitoso"}';
?>