<?php
error_reporting(0);
require_once 'lib/sesion_usuario.php';
require_once 'lib/conexionMysql.php';


$arrPost=  ( $_REQUEST ["store_data"]  );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrPost[0] as $key => $value ) {
	$arrPost2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrPost= $arrPost2;

$sql = "SELECT password, user,nombre, a_paterno, a_materno, email, telefono, cp, dia_nac, mes_nac,num_vip, year_nac, genero FROM usuarios WHERE id='$arrPost[idUser]'";
		if (num_regmysql($sql) > 0)
		{
			$rsdDatos = traedatosmysql($sql);
			if (! $rsdDatos->EOF)
			{				
				$numVip=$rsdDatos->fields["num_vip"];
				$sqlLastMov = "SELECT fec_vip FROM mov_vip WHERE num_vip='".$numVip."' ORDER BY id_mov DESC LIMIT 1";
				$rsdLastMov = traedatosmysql($sqlLastMov);
				$sqlSaldo = "SELECT pto_vip FROM clientes_vip WHERE num_vip='".$numVip."'";
				$rsdSaldo = traedatosmysql($sqlSaldo);
				echo json_encode(array(
					"success"	=> true,
					"password"	=> $rsdDatos->fields["password"],
					"user"	=> $rsdDatos->fields["user"],
					"nombre"	=> $rsdDatos->fields["nombre"],
					"a_paterno"	=> $rsdDatos->fields["a_paterno"],
					"a_materno"	=> $rsdDatos->fields["a_materno"],
					"email"	=> $rsdDatos->fields["email"],
					"telefono"	=> $rsdDatos->fields["telefono"],
					"cp"	=> $rsdDatos->fields["cp"],
					"dia_nac"	=> $rsdDatos->fields["dia_nac"],
					"mes_nac"	=> $rsdDatos->fields["mes_nac"],
					"year_nac"	=> $rsdDatos->fields["year_nac"],
					"genero"	=> $rsdDatos->fields["genero"],
					"fechaUltimaVisita"	=> $rsdLastMov->fields["fec_vip"],
					"saldoPuntos"	=> $rsdSaldo->fields["pto_vip"]
				));
			}
		}
		else
		{
			echo json_encode(array(
				"success"	=> false,
					"mensaje"	=> "Problema en la extracción de datos con: ".$arrPost[idUser]
				
			));
		}


?>