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
		if (num_regmysql($sql) > 0)
		{
			$rsdDatos = traedatosmysql($sql);
			if (! $rsdDatos->EOF)
			{				
				
				$numVip=$rsdDatos->fields["num_vip"];
				$idUser=$rsdDatos->fields["id"];
				//asignaremos como contraseña temporal el num_vip interno de la tarjeta que tienen, 
				//de esta forma será un dato único
				$sqlUpd="UPDATE usuarios SET password= PASSWORD('".$numVip."') WHERE id=$idUser";
				traedatosmysql($sqlUpd);			
				
				//mandaremos el correo en otro script para acelerar la respuesta al usuario:
				$rcpt= array (
						array (
								'name' => $rsdDatos->fields["nombre"]." ".$rsdDatos->fields["a_paterno"]." ".$rsdDatos->fields["a_materno"],
								'email' => $arrPost["email"]
						)
				);
				$body= '<html><head><title>Recuperacion de password</title></head><body><h1>
				<p>Se le asigno temporalmente el password: <b>'.$numVip.'</b>, por favor, inicie sesion y actualice su password. </p><br>
					<p><a href="http://sirloin.vip.soft-webcosmos.com.mx/" >Inicie sesion</a></p>
				</h1></body></html>';
				$subject="Recuperacion de password de tarjeta VIP";
				sendEmail($rcpt, $body, $subject);
				
				echo json_encode(array(
					"success"	=> true,
					"mensaje"	=> "Se le asigno de temporalmente el password: $numVip, por favor, inicie sesion y actualice su password. Este password temporal se le envio a su correo."
				));
			}
		}
		else
		{
			echo json_encode(array(
				"success"	=> false,
				"mensaje"	=> "No existe un usuario registrado con el correo: ".$arrPost["email"]
				
			));
		}


?>