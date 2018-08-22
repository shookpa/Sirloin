<?php
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';		
require_once 'lib/sendMailrelay.php';

//error_reporting(E_ALL);

$arrayDatosInsertar =  ( $_REQUEST ["store_data"]  );

//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {
	//	     $arrayDatosInsertar2[$key] = utf8_encode(trim($value));
	$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrayDatosInsertar = $arrayDatosInsertar2;
// var_dump($_REQUEST);
$id_rest=0;
// $tarjeta="5271312345600291";
$numVip= UtilsVIP::getNumVip($arrayDatosInsertar["user"]);

//VERIFICAR SI COMIENZA CON 714, PARA NO PERMITIR EL REGISTRO



$encontrada= UtilsVIP::validateNumVIP($numVip);
// echo "<h1>El numero VIP de la tarjeta  ".$arrayDatosInsertar["user"]." es $numVip y fue encontrada: $encontrada</h1>";
if ($encontrada>0) {
	//SI ESTA ENCONTRADA, DEBEMOS VALIDAR QUE NO EXISTA ESTA TARJETA DADA DE ALTA
	$duplicada= UtilsVIP::validateUserByNumVIP($numVip);	
	if ($duplicada>0) {
		echo '{"success":false, "mensaje":"Esta tarjeta ya se encuentra registrada, verifique su informacion en el restaurante mas cercano"}';		
		exit;
	}
	$arrayDatosInsertar["genero"]= $arrayDatosInsertar["genero"]=="false" ? 1 : 2;
	$arrayDatosInsertar["num_vip"]=$numVip;
	$serie4= UtilsVIP::validateNumVipSeries4($numVip);
	if ($serie4>0) {
		//QUE INSERTE EN LA TABLA ALTERNA
		$arrayDatosInsertar["genero"]= $arrayDatosInsertar["genero"]=="false" ? 1 : 2;
		$arrayDatosInsertar["num_vip"]=$numVip;
		$sql="INSERT INTO usuarios714 ( NOMBRE, A_PATERNO, A_MATERNO, USER, NUM_VIP, PASSWORD, EMAIL, TELEFONO, CP, DIA_NAC, MES_NAC, YEAR_NAC, GENERO, tipoUser, status ) VALUES
		( '".$arrayDatosInsertar["nombre"]."', '".$arrayDatosInsertar["a_paterno"]."', '".$arrayDatosInsertar["a_materno"]."', '".$arrayDatosInsertar["user"]."',
		".$arrayDatosInsertar["num_vip"].", '".$arrayDatosInsertar["password"]."', '".$arrayDatosInsertar["email"]."', '".$arrayDatosInsertar["telefono"]."', '".$arrayDatosInsertar["cp"]."',
		".$arrayDatosInsertar["dia_nac"].", ".$arrayDatosInsertar["mes_nac"].", ".$arrayDatosInsertar["year_nac"].", ".$arrayDatosInsertar["genero"].", 2, '1' )";
		traedatosmysql($sql);
// 		echo $sql;
		//QUE ENVIE EL CORREO DE WARNING:
		sendEmailSeries4($arrayDatosInsertar["nombre"]. " ".$arrayDatosInsertar["a_paterno"]." ".$arrayDatosInsertar["a_materno"], $arrayDatosInsertar["email"]);
		
		
		echo '{"success":false, "mensaje":"Estimado Cliente, su tarjeta No pudo ser Activada debido a un problema con la misma, por lo que le pedimos de la Manera más Atenta acuda a la sucursal donde la adquirió para solicitar su cambio. Un correo con esta información y más detalle le ha sido enviado con más instrucciones. Agradecemos su atención y estamos a sus órdenes."}';
		exit;
	}
	
	
	//SI ESTA ENCONTRADA, DEBEMOS VALIDAR QUE NO EXISTA ESTE CORREO NO ESTE DADO DE ALTA
// 	$duplicada= UtilsVIP::validateUserByEmail($arrayDatosInsertar["email"]);
// 	if ($duplicada>0) {
// 		echo '{"success":false, "mensaje":"Este correo ya se encuentra registrado, favor de usar otro correo"}';
// 		exit;
// 	} //LA VALIDACION DEL USUARIO DUPLICADO SE QUITA, SOLO DEBE QUEDAR LA DE 
	
	//SI NO ESTA DUPLICADA, PROCEDEMOS A REGISTRAR LA TARJETA EN LA TABLA DE USUARIOS:
	
	$arrayDatosInsertar["password"]="PASSWORD('".$arrayDatosInsertar["password"]."')";
	$sql="INSERT INTO usuarios ( NOMBRE, A_PATERNO, A_MATERNO, USER, NUM_VIP, PASSWORD, EMAIL, TELEFONO, CP, DIA_NAC, MES_NAC, YEAR_NAC, GENERO, tipoUser, status ) VALUES 
		( '".$arrayDatosInsertar["nombre"]."', '".$arrayDatosInsertar["a_paterno"]."', '".$arrayDatosInsertar["a_materno"]."', '".$arrayDatosInsertar["user"]."', 
		".$arrayDatosInsertar["num_vip"].", ".$arrayDatosInsertar["password"].", '".$arrayDatosInsertar["email"]."', '".$arrayDatosInsertar["telefono"]."', '".$arrayDatosInsertar["cp"]."', 
		".$arrayDatosInsertar["dia_nac"].", ".$arrayDatosInsertar["mes_nac"].", ".$arrayDatosInsertar["year_nac"].", ".$arrayDatosInsertar["genero"].", 2, '1' )";	
	traedatosmysql($sql);
	// 	DEBEMOS AGREGARLE 50 PESOS A ESA TARJETA, ACTUALIZAR LA FECHA Y AGREGARLE UN MOVIMIENTO	
	$sql1="UPDATE clientes_vip SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	$sql1="UPDATE clientes_rest1 SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	$sql1="UPDATE clientes_rest2 SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	$sql1="UPDATE clientes_rest3 SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	$sql1="UPDATE clientes_rest4 SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	$sql1="UPDATE clientes_rest5 SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	$sql1="UPDATE clientes_rest6 SET pto_vip=pto_vip+50,ema_vip='".$arrayDatosInsertar["email"]."',tel_vip='".$arrayDatosInsertar["telefono"]."',	datetime_vip ='".date("Y-m-d H:i:s")."' WHERE num_vip='".$numVip."'";
	traedatosmysql($sql1);
	//Aparte de insertar el saldo, debe generar un movimiento de la tarjeta nueva comprada:
	$datosMov=UtilsVIP::getDataMovs($numVip);//OBTENEMOS EL ID_RESTAURANTE DEL PRIMER REGISTRO
// 	$arDatMovs["id_restaurante"]=$datosMov["id_restaurante"];
	
	createMovement($datosMov["id_restaurante"], 50 , $numVip);
	//QUE ENVIE EL CORREO DE BIENVENIDA:
	$rcpt[0]["name"]=$arrayDatosInsertar["nombre"]. " ".$arrayDatosInsertar["a_paterno"]." ".$arrayDatosInsertar["a_materno"];
	$rcpt[0]["email"]=$arrayDatosInsertar["email"];
	$result=sendEmail($rcpt, "<html><body><img src='http://www.programadepuntos-vip.com/images/bienvenida.png' /></body></html>", "Bienvenido al programa de puntos");
}
else 
{
// 	echo "EN EL ELSE";
	$vendida= UtilsVIP::validateNumVIPSold($numVip);
// 	echo "<h1>El numero VIP de la tarjeta  ".$arrayDatosInsertar["user"]." es $numVip y fue encontrada: $encontrada</h1>";
	if ($vendida>0) {
		//SI ESTA ENCONTRADA, DEBEMOS VALIDAR QUE NO EXISTA ESTA TARJETA DADA DE ALTA
		$duplicada= UtilsVIP::validateUserByNumVIP($numVip);
		if ($duplicada>0) {
			echo '{"success":false, "mensaje":"Esta tarjeta ya se encuentra registrada, verifique su informacion en el restaurante mas cercano"}';
			exit;
		}		
		$arrayDatosInsertar["genero"]= $arrayDatosInsertar["genero"]=="false" ? 1 : 2;
		$arrayDatosInsertar["num_vip"]=$numVip;
		$serie4= UtilsVIP::validateNumVipSeries4($numVip);
		if ($serie4>0) {
			//QUE INSERTE EN LA TABLA ALTERNA
			$arrayDatosInsertar["genero"]= $arrayDatosInsertar["genero"]=="false" ? 1 : 2;
			$arrayDatosInsertar["num_vip"]=$numVip;
			$sql="INSERT INTO usuarios714 ( NOMBRE, A_PATERNO, A_MATERNO, USER, NUM_VIP, PASSWORD, EMAIL, TELEFONO, CP, DIA_NAC, MES_NAC, YEAR_NAC, GENERO, tipoUser, status ) VALUES
		( '".$arrayDatosInsertar["nombre"]."', '".$arrayDatosInsertar["a_paterno"]."', '".$arrayDatosInsertar["a_materno"]."', '".$arrayDatosInsertar["user"]."',
		".$arrayDatosInsertar["num_vip"].", ".$arrayDatosInsertar["password"].", '".$arrayDatosInsertar["email"]."', '".$arrayDatosInsertar["telefono"]."', '".$arrayDatosInsertar["cp"]."',
		".$arrayDatosInsertar["dia_nac"].", ".$arrayDatosInsertar["mes_nac"].", ".$arrayDatosInsertar["year_nac"].", ".$arrayDatosInsertar["genero"].", 2, '1' )";
			traedatosmysql($sql);
			//QUE ENVIE EL CORREO DE WARNING:
			sendEmailSeries4($arrayDatosInsertar["nombre"]. " ".$arrayDatosInsertar["a_paterno"]." ".$arrayDatosInsertar["a_materno"], $arrayDatosInsertar["email"]);
			echo '{"success":false, "mensaje":"Estimado Cliente, su tarjeta No pudo ser Activada debido a un problema con la misma, por lo que le pedimos de la Manera más Atenta acuda a la sucursal donde la adquirió para solicitar su cambio. Un correo con esta información y más detalle le ha sido enviado con más instrucciones. Agradecemos su atención y estamos a sus órdenes."}';
			exit;
		}
		//SI NO ESTA DUPLICADA, PROCEDEMOS A REGISTRAR LA TARJETA EN LA TABLA DE USUARIOS:
		
		$arrayDatosInsertar["password"]="PASSWORD('".$arrayDatosInsertar["password"]."')";
		$sql="INSERT INTO usuarios ( NOMBRE, A_PATERNO, A_MATERNO, USER, NUM_VIP, PASSWORD, EMAIL, TELEFONO, CP, DIA_NAC, MES_NAC, YEAR_NAC, GENERO, tipoUser, status ) VALUES
		( '".$arrayDatosInsertar["nombre"]."', '".$arrayDatosInsertar["a_paterno"]."', '".$arrayDatosInsertar["a_materno"]."', '".$arrayDatosInsertar["user"]."',
		".$arrayDatosInsertar["num_vip"].", ".$arrayDatosInsertar["password"].", '".$arrayDatosInsertar["email"]."', '".$arrayDatosInsertar["telefono"]."', '".$arrayDatosInsertar["cp"]."',
		".$arrayDatosInsertar["dia_nac"].", ".$arrayDatosInsertar["mes_nac"].", ".$arrayDatosInsertar["year_nac"].", ".$arrayDatosInsertar["genero"].", 2, '1' )";
		traedatosmysql($sql);
		//COMO ESTA TARJETA FUE RECIEN VENDIDA, DEBE AGREGAR REGISTRO EN clientes_vip CON UN SALDO INICIAL:
		$datosFactura=UtilsVIP::getDataInvoiceSold($numVip);//AQUI OBTENEMOS LOS DATOS DE LA FACTURA,
		$cliente=array ('num_vip' => $numVip,
				'nom_vip'=>$arrayDatosInsertar["nombre"]. " ".$arrayDatosInsertar["a_paterno"]." ".$arrayDatosInsertar["a_materno"],
				'tel_vip' => $arrayDatosInsertar["telefono"],
				'ema_vip' => $arrayDatosInsertar["email"],
				'fec_vip' => $datosFactura["fecha"],
				'sal_vip' => "0.0",
// 				'fuc_vip' =>"algo",
				"muc_vip"=> "0.0",
// 				"fup_vip"=> "algo",
				"mup_vip"=> "0.0",
				"tnr_vip"=> "0.0",
				"tmr_vip"=> "0.0",
				"tct_vip"=> "0.0",
				"pto_vip"=> $datosFactura["totalf"], // DEBE TOMAR EL TOTAL DE LA FACTURA (PORQUE HAY TARJETAS DE REGALO CON SALDO PRECARGADO)
				"pva_vip"=> "10",
				'datetime_vip'=>date("Y-m-d H:i:s"),
				
		);
		InsertTable('clientes_vip', $cliente,true);
		InsertTable('clientes_rest1', $cliente,true);
		InsertTable('clientes_rest2', $cliente,true);
		InsertTable('clientes_rest3', $cliente,true);
		InsertTable('clientes_rest4', $cliente,true);
		InsertTable('clientes_rest5', $cliente,true);
		InsertTable('clientes_rest6', $cliente,true);
		$id_rest=$datosFactura["id_restaurante"];
		//Aparte de insertar el saldo, debe generar un movimiento de la tarjeta nueva comprada:
		createMovement($id_rest,$datosFactura["totalf"], $numVip);
		//QUE ENVIE EL CORREO DE BIENVENIDA:
		sendWelcomeEmail($arrayDatosInsertar["nombre"]. " ".$arrayDatosInsertar["a_paterno"]." ".$arrayDatosInsertar["a_materno"], $arrayDatosInsertar["email"]);
		
		
	}
	else 
	{
		echo '{"success":false, "mensaje":"Verifique su ticket de compra o acuda al restaurante más cercano"}';
		exit;
	}
}



echo '{"success":true, "mensaje":"El registro de la tarjeta fue exitoso, gracias por su preferencia.","id_rest":"'.$id_rest.'" }';


function createMovement($idRest, $monto, $numVip)
{
	$arDatMovs["id_restaurante"]=$idRest;
	$arDatMovs["num_vip"]=$numVip;
	$arDatMovs["fec_vip"]=date("Y-m-d");
	$arDatMovs["det_vip"]="Registro de nueva tarjeta comprada";
	$arDatMovs["mon_vip"]=$monto;
	InsertTable("mov_vip", $arDatMovs,true);
}
function sendWelcomeEmail($name, $email )
{
	$rcpt[0]["name"]=$name;
	$rcpt[0]["email"]=$email;
	$result=sendEmail($rcpt, "<html><body><img src='http://www.programadepuntos-vip.com/images/bienvenida.png' /></body></html>", "Bienvenido al programa de puntos");
}
function sendEmailSeries4($name, $email )
{
	$rcpt[0]["name"]=$name;
	$rcpt[0]["email"]=$email;
	$result=sendEmail($rcpt, "<html><body>  
							<p> <b>Estimado Cliente</b>, su tarjeta No pudo ser Activada debido a un problema con la misma, por lo que le pedimos de la Manera m&aacute;s Atenta acuda a la sucursal donde la adquiri&oacute; para solicitar su cambio. </p>
							<p>Le pedimos Presentar este correo al Gerente de la Sucursal para que le entregue su nueva tarjeta para lo cual deber de entregarle f&iacute;sicamente la anterior para su resguardo, y la nueva tarjeta no tendr&aacute; costo para usted ser&aacute; de Cortes&iacute;a por sustituci&oacute;n.</p>
							<p>Les solicitamos enviarnos la Fotograf&iacute;a tanto de la Nueva tarjeta en su parte frontal como el Ticket que le entregaran con la misma para as&iacute; validar la informaci&oacute;n en sistema por parte de SOPORTE T&eacute;cnico y poder trasladar los puntos de su Tarjeta Anterior a la Nueva.</p>	
							<p>El proceso de sustituci&oacute;n lo deber&aacute; de realizar en un plazo m&aacute;ximo de 15 d&iacute;as a partir de esta fecha, de lo contrario su Tarjeta ya no se podr&aacute; activar bajo este nuevo proceso y sus puntos se perder&aacute;n.</p>
							
							<p>Agradecemos su atenci&oacute;n y nos reiteramos a sus &oacute;rdenes </p>
							<br/><br/><br/>
							<p>SOPORTE PROGRAMA DE PUNTOS SIRLOIN STOCKADE.</p>
							</body></html>", "Programa de puntos Sirloin Stockade");
}
?>