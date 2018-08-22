<?php
error_reporting(0);
require_once 'lib/sesion_usuario.php';
require_once 'lib/conexionMysql.php';
require_once 'lib/sendMailrelay.php';

$arrPost=  ( $_REQUEST ["store_data"]  );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrPost[0] as $key => $value ) {
	$arrPost2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrPost= $arrPost2;

$sql = "SELECT id, num_vip, nombre, a_paterno, a_materno FROM usuarios WHERE email='$arrPost[email]'";
		
			$rsdDatos = traedatosmysql($sql);
			if (! $rsdDatos->EOF)
			{				
				
				$numVip=$rsdDatos->fields["num_vip"];
				$idUser=$rsdDatos->fields["id"];
				//asignaremos como contraseña temporal el num_vip interno de la tarjeta que tienen, 
				//de esta forma será un dato único
				$sqlUpd="UPDATE usuarios SET password= PASSWORD('".$numVip."') WHERE id=$idUser";
				traedatosmysql($sqlUpd);			
				
				$rcpt= array (
						array (
								'name' => $rsdDatos->fields["nombre"]." ".$rsdDatos->fields["a_paterno"]." ".$rsdDatos->fields["a_materno"],
								'email' => $arrPost["email"]
						)
				);
				$body= '<html><head><title>Recuperación de contraseña</title></head><body><h1>
				<p>Estimado(a) <b>'.$rsdDatos->fields["nombre"]." ".$rsdDatos->fields["a_paterno"]." ".$rsdDatos->fields["a_materno"].'</b>:</p>
				<p>Se le asigno temporalmente el password: <b>'.$numVip.'</b>, por favor, inicie sesión y actualice su password. </p><br>
					<p><a href="http://www.programadepuntos-vip.com" >Inicie sesión</a></p>
				</h1></body></html>';
				$subject="Recuperación de contraseña de tarjeta VIP";
				sendEmail($rcpt, $body, $subject);
				
				echo json_encode(array(
					"success"	=> true,
					"mensaje"	=> "Se le asigno de temporalmente el password: $numVip, por favor, inicie sesión y actualice su password."
				));
			}
			else 
				echo json_encode(array(
						"success"	=> true,
						"mensaje"	=> "No se encuentra registrada ninguna tarjeta VIP con el correo ".$arrPost["email"].", por favor, verifique su informacion e intente nuevamente."
				));
	


?>