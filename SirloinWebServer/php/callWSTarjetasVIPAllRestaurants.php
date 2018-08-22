<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(0);
require_once "lib/soap/nusoap.php";
require_once ('lib/conexionMysql.php');
//AQUI DEBE RECORRER UN QUERY DE cat_restaurantes OBTENIENDO LAS URLs DE LOS

$sql="SELECT url_fija FROM cat_restaurantes WHERE url_fija like '%WS_Sucursal.php?wsdl'";
$rsd=traedatosmysql($sql);
while (!$rsd->EOF)
{
	$url=$rsd->fields["url_fija"];
// 	echo "<b>la url del servicio $url</b><br/>";
	$client = new nusoap_client($url,'wsdl');
// 	$err = $client->getError();
// 	if ($err) {	echo 'Error en Constructor' . $err ; }
	$param = array('cuenta' => array('usuario' => 'rest1','password' => 'ITPr0t3c$'));	
	$result = $client->call('invokeSyncTarjetasVIP', $param);
	if ($client->fault) {
// 		echo 'Fallo';
// 		print_r($result);
	} else {	// Chequea errores
		$err = $client->getError();
		if ($err) {		// Muestra el error
// 			echo 'Error: ' . $err ;
		} else {		// Muestra el resultado
// 			echo 'Resultado';
		//	print_r ($result);
		}
	}
	
	$rsd->MoveNext();
}

//PENDIENTE DE LA VALIDACION DE ERRORES A REALIZAR CUANDO NO HAYA COMUNICACION CON LOS SERVERS DE LOS RESTAURANTES:

echo "{'success':true, 'mensaje':'Todo en orden'}";
?>