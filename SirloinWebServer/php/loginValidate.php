<?php
// error_reporting ( E_ALL );
require_once 'lib/sesion_usuario.php';
require_once 'lib/conexionMysql.php';

$arrPost = ($_REQUEST ["store_data"]);

// COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrPost [0] as $key => $value ) {
	$arrPost2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrPost = $arrPost2;

$sql = "SELECT id, password, user,nombre, rol_user, a_paterno, a_materno,tipoUser FROM usuarios WHERE email='$arrPost[username]' AND password= PASSWORD('$arrPost[password]') AND status='1' ";
if (num_regmysql ( $sql ) > 0) {
	$rsdDatos = traedatosmysql ( $sql );
	if (! $rsdDatos->EOF) {
		
		$_SESSION ["s_iduser"] = $rsdDatos->fields ["id"];
		$_SESSION ["s_tipoUser"] = $rsdDatos->fields ["tipoUser"];
		$_SESSION ["s_rol_user"] = $rsdDatos->fields ["rol_user"];
		$_SESSION ["s_user_name"] = $rsdDatos->fields ["nombre"] . " " . $rsdDatos->fields ["a_paterno"] . " " . $rsdDatos->fields ["a_materno"];
		// OBTENEMOS LOS PERMISOS DEL USUARIO PARA DEVOLVERLOS EN JSON:
		if ($_SESSION ["s_tipoUser"]==3 || $_SESSION ["s_tipoUser"]=="3")
		{
			$rsdPer = traedatosmysql ( "SELECT * FROM rel_perm_rol WHERE id_rol=".$_SESSION ["s_rol_user"]);
			$per=array();
			while (!$rsdPer->EOF)
			{
				array_push($per, $rsdPer->fields);
				$rsdPer->MoveNext();
			}
			$rsdRest = traedatosmysql ( "SELECT id_rest FROM rel_usu_rest WHERE id_usu=".$_SESSION ["s_iduser"]);
			$rest="";
			while (!$rsdRest->EOF)
			{
				$rest.=$rsdRest->fields["id_rest"].",";
				$rsdRest->MoveNext();
			}
			$rest=substr($rest, 0,strlen($rest)-1);
			$_SESSION ["s_rest"]=$rest;
			echo json_encode ( array (
					"success" => true,
					"iduser" => $_SESSION ["s_iduser"],
					"permisos" => json_encode ($per),
					"restaurantes" => $rest,
					"tipoUser" => $_SESSION ["s_tipoUser"],
					"userName" => $_SESSION ["s_user_name"]
			) );
		}
		else
		{
			echo json_encode ( array (
					"success" => true,
					"permisos" => null,
					"restaurantes" => null,
					"iduser" => $_SESSION ["s_iduser"],
					"tipoUser" => $_SESSION ["s_tipoUser"],
					"userName" => $_SESSION ["s_user_name"]
			) );
		}
		
		
		
		
	}
} else {
	echo json_encode ( array (
			"success" => false,
			"mensaje" => "Las credenciales de acceso son incorrectas $sql" 
	
	) );
}

?>