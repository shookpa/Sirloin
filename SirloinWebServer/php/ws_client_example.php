<?php
require_once "lib/soap/nusoap.php";

$client = new nusoap_client('http://sirloin-lotero.dyndns.org:8181/rest/WS_Sucursal.php?wsdl','wsdl');
$err = $client->getError();
if ($err) {	echo 'Error en Constructor' . $err ; }
$param = array("cuenta"=> array('usuario' => 'rest1','password' => 'ITPr0t3c$'));
$result = $client->call('invokeSyncFact', $param);


var_dump($result);
?>
