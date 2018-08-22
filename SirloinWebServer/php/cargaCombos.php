<?php
error_reporting(0);
require_once 'lib/conexionMysql.php';

		
		
$tabla = urldecode($_REQUEST['tabla']);
$filtros = urldecode( $_REQUEST['filtros']);
$opcion1= urldecode( $_REQUEST['opcion1']);
$campos = $_REQUEST['campos'] == null || $_REQUEST['campos'] == '' ? "*" : $_REQUEST['campos'];
$campos=urldecode($campos);
$sql = "SELECT $campos FROM $tabla $filtros";
//echo "EL SQL ES: ".$sql. $_REQUEST['filtros']; 
//var_dump($_GET);

$rsdDatos = traedatosmysql($sql);
$i=0;
$arr[$i]=array();
if (strlen(trim($opcion1))>1) {
// 	var_dump($opcion1 );
	$opcion1=explode ( "-", $opcion1 );
	$key1=explode ( ":", $opcion1[0] );
	$arr[$i][$key1[0]]=utf8_encode($key1[1]);
	$value1=explode ( ":",$opcion1[1]);
	$arr[$i][$value1[0]]=utf8_encode($value1[1]);
	$i++;
}

while(!$rsdDatos->EOF){	
	foreach ($rsdDatos->fields as $key => $value) {
		//PARA CONVERTIR LOS ACENTOS Y LAS TILDES
		//A utf8:		
		$arr[$i][$key]=utf8_encode($value);
	}
	$i++;
	$rsdDatos->MoveNext();
}
echo '{"success":true, "datos":'.json_encode($arr).'}';


?>