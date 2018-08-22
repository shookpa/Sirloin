<?php 
include('../lib/sesion_usuario.php');
include('../lib/valida_sesion.php');
include("../lib/conexionMysql.php");
include('../lib/excel/excel.php');
//initiating Sql2Excel class instance
$excel=new Sql2Excel($host,$useri,$pwd,$base);
	$nombreArchivo="Listado_de_Clientes_VIP_al_".date("Y-m-d_H.i.s");
	$sql="SELECT
	*
	FROM
	clientes_vip";


$excel->ExcelOutput($sql,$nombreArchivo);
?>