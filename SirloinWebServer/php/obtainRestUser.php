<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		

$idUser=$_GET["id_user"];

$sql="SELECT id_rest FROM rel_usu_rest WHERE id_usu=$idUser";
$rsd=traedatosmysql($sql);
$response=array();
while(!$rsd->EOF)
{
	array_push($response, $rsd->fields);
	$rsd->MoveNext();
}	

echo '{"success":true, "datos":'.json_encode($response).'}';
?>