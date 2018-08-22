<?php
error_reporting ( E_ALL );
require_once 'lib/create_excel_cli_vip_todos.php';
require_once 'lib/sendMailrelay.php';

// GENERANDO EL ARCHIVO EXCEL PARA ENVIAR POR CORREO:
echo "Creando el archivo excel \n\r";
$archivoExcel=creaExcel();
echo "el archivo excel es $archivoExcel \n\r";
echo "Enviando por correo el archivo generado\n\r";
$rcptAdmin = array (
		array (
				'name' => 'Jorge Centeno',
				'email' => 'jorge.centeno@cc-datweb.com.mx'
		)
);
$body= '<html><head><title>Saldo Vencido</title></head><body><h1>
			<p>Se han enviado los saldos a ceros, la lista de tarjetas y saldos previo a la actualizacion: </p><br>
			<p><a href="'.$archivoExcel.'" >Lista de tarjetas VIP</a></p>		
			</h1></body></html>';
$subject="Vencimiento de tarjetas VIP";
sendEmail($rcptAdmin, $body, $subject);
//REINICIANDO LOS SALDOS A CERO
$sqlUpdate="UPDATE clientes_vip SET pto_vip=0, datetime_vip=NOW()";
traedatosmysql($sqlUpdate);
$sqlCorreos="SELECT ema_vip, nom_vip FROM clientes_vip WHERE ema_vip<>''";
$rsdCorreos=traedatosmysql($sqlCorreos);
$rcpt[0]["name"]="Webmaster";
$rcpt[0]["email"]="mr_shookp@hotmail.com";
while (!$rsdCorreos->EOF)
{
	$para[0] = $rsdCorreos->fields["ema_vip"];
	$para[1] = $rsdCorreos->fields["nom_vip"];
	array_push($rcpt, array('name' => $para[1],'email' => $para[0]));
	$contCorreos++;
	$rsdCorreos->MoveNext();
}	
echo "La lista de correos de los clientes:\n\r";
var_dump($rcpt);

$rcpt = array (
		array (
				'name' => 'Jorge Centeno',
				'email' => 'jorge.centeno@cc-datweb.com.mx'
		)
);

var_dump($rcpt);
$body= '<html><head><title>Saldo Vencido</title></head><body><h1>
			<p>Buen d&iacute;a estimado cliente</p><p>Para informarle que de acuerdo a nuestras pol&iacute;ticas de vencimiento de puntos, el saldo de su tarjeta quedo en ceros.</p>
			<p>Sin embargo, la podr&aacute; seguir utilizando en sus consumos y as&iacute; seguir acumulando puntos para pagar en cualquiera de nuestras sucursales.</p><p><br></p>
			</h1></body></html>';
$subject="Puntos de su tarjeta Sirloin Expirados";
sendEmail($rcpt, $body, $subject);

// var_dump ( $result );

?>