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
		// var_dump($value);
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
$arrayDatosInsertar ["password"] = "PASSWORD('" . $arrayDatosInsertar ["password"] . "')";
$sql = utf8_decode("INSERT INTO usuarios ( NOMBRE, A_PATERNO, A_MATERNO, USER, NUM_VIP, PASSWORD, EMAIL, TELEFONO, CP, DIA_NAC, MES_NAC, YEAR_NAC, GENERO, tipoUser,rol_user,id_empresa, status ) VALUES 
		( '" . $arrayDatosInsertar ["nombre"] . "', '" . $arrayDatosInsertar ["a_paterno"] . "', '" . $arrayDatosInsertar ["a_materno"] . "', '" . $arrayDatosInsertar ["user"] . "', 
		0, " . $arrayDatosInsertar ["password"] . ", '" . $arrayDatosInsertar ["email"] . "', '" . $arrayDatosInsertar ["telefono"] . "', '" . $arrayDatosInsertar ["cp"] . "', 
		0, 0, 0, " . $arrayDatosInsertar ["genero"] . ", " . $arrayDatosInsertar ["tipoUser"] . ", " . $arrayDatosInsertar ["rol_user"] . ", " . $arrayDatosInsertar ["id_empresa"] . ", '1' )");
// echo $sql;
traedatosmysql ( $sql );
$idGenerado = mysql_insert_id ();
foreach ( $restaurantes as $key => $value ) {
	// echo "--------$key => $value----------";
	$arrayDatosInsertarRest ["id_rest"] = $value;
	$arrayDatosInsertarRest ["id_usu"] = $idGenerado;
	InsertTable ( 'rel_usu_rest', $arrayDatosInsertarRest, true );
}

echo '{"success":true, "mensaje":"El registro del usuario fue exitoso"}';
?>