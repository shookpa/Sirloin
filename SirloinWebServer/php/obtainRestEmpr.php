<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		

$idEmpr=$_GET["id_empr"];

$sql="SELECT id_rest FROM rel_empr_rest WHERE id_empr=$idEmpr";
$rsd=traedatosmysql($sql);
$response=array();
while(!$rsd->EOF)
{
	array_push($response, $rsd->fields);
	$rsd->MoveNext();
}	

echo '{"success":true, "datos":'.json_encode($response).'}';
?>