<?php
error_reporting(0);
require_once 'lib/sesion_usuario.php';
require_once 'lib/conexionMysql.php';
//obtainUser.php


$arrPost=  ( $_REQUEST ["store_data"]  );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrPost[0] as $key => $value ) {
	$arrPost2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrPost= $arrPost2;

$sql = "SELECT email FROM usuarios WHERE usuarios.id='$arrPost[idUser]'";		
		if (num_regmysql($sql) > 0)
		{
			$rsdDatos = traedatosmysql($sql);
			if (! $rsdDatos->EOF)
			{				
				$email=$rsdDatos->fields["email"];
				$sqlLastMov = "SELECT user, pto_vip  FROM usuarios INNER JOIN clientes_vip ON clientes_vip.num_vip = usuarios.num_vip  WHERE usuarios.email = '".$email."'";
				$rsdLastMov = traedatosmysql($sqlLastMov);
				$arData=array();
				while (!$rsdLastMov->EOF)
				{
					
					array_push($arData, $rsdLastMov->fields);
					$rsdLastMov->MoveNext();
				}
				// 				var_dump($arData);
				echo json_encode(array(
						"success"	=> true,
						"data"	=> $arData
				));
			}
		}
		else
		{
			echo json_encode(array(
				"success"	=> false,
					"mensaje"	=> "Problema en la extraccion de datos con: ".$arrPost[idUser]
				
			));
		}


?>