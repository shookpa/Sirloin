<?php
error_reporting ( 0 );
require_once 'lib/UtilsVIP.php';
require_once 'lib/sesion_usuario.php';
require_once 'lib/conexionMysql.php';
require_once 'lib/sendMailrelay.php';

$arrPost = ($_REQUEST ["store_data"]);

// COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrPost [0] as $key => $value ) {
	$arrPost2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrPost = $arrPost2;

$rcpt = array (
		array (
				'name' => "Soporte",
				'email' => "soporte@programadepuntos-vip.com" 
		) 
);
$numeroInterno = UtilsVIP::getNumVip($arrPost ["tarjeta"]);
$body = "<html><head><title>Solicitud de soporte en el sitio de programa de puntos</title></head><body><h1>
				<p>El usuario: <b>" . $arrPost ["nombre"] . "</b>, email: <b>" . $arrPost ["email"] . "</b>, telefono:<b>" . $arrPost ["telefono"] . "</b>, Numero tarjeta:<b>" . $arrPost ["tarjeta"] . ", </b> 
				numero de tarjeta interno:<b>" . $numeroInterno . "</b>, envía el mensaje:
				<br/>
				<p>" . $arrPost ["mensaje"] . "</p>
				</body></html>";
$subject = "Soporte de la pagina del programa de puntos";
sendEmail ( $rcpt, $body, $subject );

echo json_encode ( array (
		"success" => true,
		"mensaje" => "Se enviaron correctamente los datos, en breve nos comunicaremos con usted." 
) );

?>