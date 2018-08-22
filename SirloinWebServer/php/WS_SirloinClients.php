<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(0);
require_once "lib/soap/nusoap.php";
require_once ('lib/conexionMysql.php');

//Perform client authentication
function autenticaUsuario($user,$pass)
{
	if (($user == "rest1" || $user == "rest2" || $user == "rest3" || $user == "rest4" || $user == "rest5" || $user == "rest6") && $pass == "ITPr0t3c$")
		return true;
	else 
		return false;
}	
// Create SOAP Server
$server = new soap_server ();
$server->soap_defencoding = 'UTF-8';
$server->decode_utf8 = false; 
$server->configureWSDL ( "WS_SirloinClients", "http://realtoscana.com/WS_SirloinClients" );



$server->wsdl->addComplexType ( 'clientesVip', 
				'complextType', 'struct', 'sequence', '', array (
					'num_vip' => array ('name' => 'num_vip', 'type' => 'xsd:integer' ),
					'nom_vip' => array ('name' => 'nom_vip', 'type' => 'xsd:string' ), 
					'tel_vip' => array ('name' => 'tel_vip', 'type' => 'xsd:string' ),
					'ema_vip' => array ('name' => 'ema_vip', 'type' => 'xsd:string' ), 
					'fec_vip' => array ('name' => 'fec_vip', 'type' => 'xsd:date' ),
					'sal_vip' => array ('name' => 'sal_vip', 'type' => 'xsd:decimal' ),
					'fuc_vip' => array ('name' => 'fuc_vip', 'type' => 'xsd:date' ),
					'muc_vip' => array ('name' => 'muc_vip', 'type' => 'xsd:decimal' ),	
					'fup_vip' => array ('name' => 'fup_vip', 'type' => 'xsd:date' ),
					'mup_vip' => array ('name' => 'mup_vip', 'type' => 'xsd:decimal' ),				
					'tnr_vip' => array ('name' => 'tnr_vip', 'type' => 'xsd:integer' ),
					'tmr_vip' => array ('name' => 'tmr_vip', 'type' => 'xsd:decimal' ),
					'tct_vip' => array ('name' => 'tct_vip', 'type' => 'xsd:decimal' ),
					'pto_vip' => array ('name' => 'pto_vip', 'type' => 'xsd:decimal' ),	
					'pva_vip' => array ('name' => 'pva_vip', 'type' => 'xsd:decimal' ),
					'datetime_vip' => array ('name' => 'datetime_vip', 'type' => 'xsd:string' ),
					) );	
$server->wsdl->addComplexType ( 'movVip',
		'complextType', 'struct', 'sequence', '', array (
				'num_vip' => array ('name' => 'num_vip', 'type' => 'xsd:integer' ),		
				'doc_vip' => array ('name' => 'doc_vip', 'type' => 'xsd:string' ),			
				'fec_vip' => array ('name' => 'fec_vip', 'type' => 'xsd:date' ),
				'mon_vip' => array ('name' => 'mon_vip', 'type' => 'xsd:decimal' ),
				'caj_vip' => array ('name' => 'caj_vip', 'type' => 'xsd:string' ),
				'det_vip' => array ('name' => 'det_vip', 'type' => 'xsd:string' ),
				'pto_vip' => array ('name' => 'pto_vip', 'type' => 'xsd:decimal' )		
				
				
		) );	
$server->wsdl->addComplexType ( 'factVip',
		'complextType', 'struct', 'sequence', '', array (	
				
				'fecha' => array ('name' => 'fecha', 'type' => 'xsd:date' ),
				'descrip' => array ('name' => 'descrip', 'type' => 'xsd:string' ),				
				'orden' => array ('name' => 'orden', 'type' => 'xsd:string' ),
				'factura' => array ('name' => 'factura', 'type' => 'xsd:string' ),
				'numero' => array ('name' => 'numero', 'type' => 'xsd:string' ),
				'totalf' => array ('name' => 'totalf', 'type' => 'xsd:decimal' )
				
				
		) );



$server->wsdl->addComplexType ( 'accountWS', 
				'complextType', 'struct', 'sequence', '', array (
					'usuario' => array ('name' => 'usuario', 'type' => 'xsd:string' ),
					'password' => array ('name' => 'password', 'type' => 'xsd:string' ) 					
					) );		
$server->wsdl->addComplexType ( 'listaClientesVIP', 'complexType', 'array', '', 'SOAP-ENC:Array', array (), array (array ('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:clientesVip[]' ) ), 'tns:clientesVip' );
$server->wsdl->addComplexType ( 'listaMovVIP', 'complexType', 'array', '', 'SOAP-ENC:Array', array (), array (array ('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:movVip[]' ) ), 'tns:movVip' );
$server->wsdl->addComplexType ( 'listaFactVIP', 'complexType', 'array', '', 'SOAP-ENC:Array', array (), array (array ('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:factVip[]' ) ), 'tns:factVip' );


function listarClientes($cuenta) {
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		$sqlAccion= "SELECT * FROM clientes_vip";
		$rsdAccion=traedatosmysql($sqlAccion);
		$response=array();
		while(!$rsdAccion->EOF)
		{
			array_push($response,
				array ('num_vip' => $rsdAccion->fields["num_vip"],
				'nom_vip'=> utf8_encode($rsdAccion->fields["nom_vip"]), 
				'tel_vip' => utf8_encode($rsdAccion->fields["tel_vip"]), 
				'ema_vip' => utf8_encode($rsdAccion->fields["ema_vip"]), 
				'fec_vip' => $rsdAccion->fields["fec_vip"], 
				'sal_vip' => $rsdAccion->fields["sal_vip"],  
				'fuc_vip' =>$rsdAccion->fields["fuc_vip"], 
				"muc_vip"=> $rsdAccion->fields["muc_vip"],
				"fup_vip"=> $rsdAccion->fields["fup_vip"],
				"mup_vip"=> $rsdAccion->fields["mup_vip"],
				"tnr_vip"=> $rsdAccion->fields["tnr_vip"],   
				"tmr_vip"=> $rsdAccion->fields["tmr_vip"],   
				"tct_vip"=> $rsdAccion->fields["tct_vip"],   
				"pto_vip"=> $rsdAccion->fields["pto_vip"],   
				"pva_vip"=> $rsdAccion->fields["pva_vip"],
				"datetime_vip"=> $rsdAccion->fields["datetime_vip"],   
				
				
				) );
			$rsdAccion->MoveNext();
		}
		if (count($response)>0)
			return $response;
		else 
			return new soap_fault ( 'SOAP-ENV:Server', '', 'No existen datos', '' );
	} else {
		return new soap_fault ( 'SOAP-ENV:Server', '', 'Error en credenciales :'.$usuario, '' );
	}
}

function listarClientesDelDia($cuenta) {
if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		$tl="clientes_".$cuenta["usuario"];		
		$sqlUpdate= "UPDATE ".$tl.", clientes_vip SET ".$tl.".datetime_vip = clientes_vip.datetime_vip, ".$tl.".sal_vip = clientes_vip.sal_vip, ".$tl.".muc_vip = clientes_vip.muc_vip, ".$tl.".mup_vip = clientes_vip.mup_vip, ".$tl.".tmr_vip = clientes_vip.tmr_vip, ".$tl.".tct_vip = clientes_vip.tct_vip, ".$tl.".pto_vip = clientes_vip.pto_vip, ".$tl.".pva_vip = clientes_vip.pva_vip,  ".$tl.".ultima_actualizacion= DATE_SUB(NOW(), INTERVAL 1 HOUR) WHERE clientes_vip.num_vip = ".$tl.".num_vip";
		traedatosmysql($sqlUpdate);
		$sqlAccion= "SELECT * FROM clientes_vip WHERE DATEDIFF(DATE(NOW()), DATE(fec_vip)) <=7 OR  DATEDIFF(DATE(NOW()), DATE(fuc_vip)) <=7  OR DATEDIFF(DATE(NOW()), DATE(fup_vip)) <=7 OR DATEDIFF(DATE(NOW()), DATE(datetime_vip)) <=7";
		$rsdAccion=traedatosmysql($sqlAccion);
		$response=array();
		while(!$rsdAccion->EOF)
		{
			array_push($response,
				array ('num_vip' => $rsdAccion->fields["num_vip"],
				'nom_vip'=>utf8_encode($rsdAccion->fields["nom_vip"]), 
				'tel_vip' => utf8_encode($rsdAccion->fields["tel_vip"]), 
				'ema_vip' => utf8_encode($rsdAccion->fields["ema_vip"]), 
				'fec_vip' => $rsdAccion->fields["fec_vip"], 
				'sal_vip' => $rsdAccion->fields["sal_vip"],  
				'fuc_vip' =>$rsdAccion->fields["fuc_vip"], 
				"muc_vip"=> $rsdAccion->fields["muc_vip"],
				"fup_vip"=> $rsdAccion->fields["fup_vip"],
				"mup_vip"=> $rsdAccion->fields["mup_vip"],
				"tnr_vip"=> $rsdAccion->fields["tnr_vip"],   
				"tmr_vip"=> $rsdAccion->fields["tmr_vip"],   
				"tct_vip"=> $rsdAccion->fields["tct_vip"],   
				"pto_vip"=> $rsdAccion->fields["pto_vip"],   
				"pva_vip"=> $rsdAccion->fields["pva_vip"],
				'datetime_vip'=>$rsdAccion->fields["datetime_vip"],    
								
				) );
			$rsdAccion->MoveNext();
		}
		if (count($response)>0)
			return $response;
		else 
			return new soap_fault ( 'SOAP-ENV:Server', '', 'No existen datos', '' );
	} else {
		return new soap_fault ( 'SOAP-ENV:Server', '', 'Error en credenciales :'.$usuario, '' );
	}
}




$server->register ( "listarClientes", array ("cuenta" => "tns:accountWS"), array ("return" => "tns:listaClientesVIP" ), "", "", "", "", "Lista total de Clientes VIP " );



$server->register ( "listarClientesDelDia", array ("cuenta" => "tns:accountWS"), array ("return" => "tns:listaClientesVIP" ), "", "", "", "", "Lista de Clientes agregados en el dia" );


function agregarClientes($cuenta, $listaClientes) {
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		$cont=0;		
		foreach ($listaClientes as $cliente) {
			$rsdCliAct=traedatosmysql("SELECT * FROM clientes_vip WHERE num_vip ='".$cliente["num_vip"]."'");
			
			if ($rsdCliAct->RecordCount()>0)
			{
				//AQUI DEBEMOS DE VALIDAR SI ES UNA FECHA DIFERENTE:
				$dateTimeAct= $rsdCliAct->fields["datetime_vip"];
				//EN EL CASO DE QUE LA FECHA QUE NOS LLEGA EN CADA CLIENTE SEA DIFERENTE, DEBE HACER EL UPDATE, 
				//EN OTRO CASO NO DEBE HACER NADA
				if ($cliente["datetime_vip"] != $dateTimeAct) {					
					//DEBE BUSCAR LO QUE TIENE ACTUALMENTE EN LOS NUMEROS Y LA FECHA DE SU RESTAURANTE
					$rsdCurrent=traedatosmysql("SELECT * FROM clientes_".$cuenta["usuario"]." WHERE num_vip ='".$cliente["num_vip"]."'");
					//VERIFICAMOS QUE TENGA FECHA DIFERENTE EN SU LISTA DE SU RESTAURANTE, CON LO QUE NOS ESTA LLEGANDO, 
					//Y ASI EVITAR MULTIPLES ACTUALIZACIONES
					
					if ($cliente["datetime_vip"] != $rsdCurrent->fields["datetime_vip"]) {						
					
						$sal_vip=$rsdCurrent->fields["sal_vip"];
						$muc_vip=$rsdCurrent->fields["muc_vip"];
						$mup_vip=$rsdCurrent->fields["mup_vip"];
						$tmr_vip=$rsdCurrent->fields["tmr_vip"];
						$tct_vip=$rsdCurrent->fields["tct_vip"];
						$pto_vip=$rsdCurrent->fields["pto_vip"];
						$pva_vip=$rsdCurrent->fields["pva_vip"];
						
						$rest_sal_vip =  $cliente["sal_vip"] - $sal_vip;
						$rest_muc_vip =  $cliente["muc_vip"] - $muc_vip;
						$rest_mup_vip =  $cliente["mup_vip"] - $mup_vip;
						$rest_tmr_vip =  $cliente["tmr_vip"] - $tmr_vip;
						$rest_tct_vip =  $cliente["tct_vip"] - $tct_vip;
						$rest_pto_vip =  $cliente["pto_vip"] - $pto_vip;
						$rest_pva_vip =  $cliente["pva_vip"] - $pva_vip;
						
						$cliente["sal_vip"]=$rsdCliAct->fields["sal_vip"] + $rest_sal_vip;
						$cliente["muc_vip"]=$rsdCliAct->fields["muc_vip"] + $rest_muc_vip;
						$cliente["mup_vip"]=$rsdCliAct->fields["mup_vip"] + $rest_mup_vip;
						$cliente["tmr_vip"]=$rsdCliAct->fields["tmr_vip"] + $rest_tmr_vip;
						$cliente["tct_vip"]=$rsdCliAct->fields["tct_vip"] + $rest_tct_vip;
						$cliente["pto_vip"]=$rsdCliAct->fields["pto_vip"] + $rest_pto_vip;
						$cliente["pva_vip"]=$rsdCliAct->fields["pva_vip"] + $rest_pva_vip; 
						
						//CON ESE VALOR DEBE ACTUALIZAR TANTO EN SU TABLA DEL RESTAURANTE COMO LA TABLA CONCENTRADORA						
						UpdateTable('clientes_vip', $cliente,'num_vip');
						UpdateTable("clientes_".$cuenta["usuario"], $cliente,'num_vip');					
					}						
				}				
			}
			else
			{
				InsertTable('clientes_vip', $cliente);
				InsertTable('clientes_rest1', $cliente);
				InsertTable('clientes_rest2', $cliente);
				InsertTable('clientes_rest3', $cliente);
				InsertTable('clientes_rest4', $cliente);
				InsertTable('clientes_rest5', $cliente);
				InsertTable('clientes_rest6', $cliente);
			}					
			$cont++;		
		}
		return 'Se sincronizaron '.$cont .' clientes' ;				
			
	} else {
		return new soap_fault ( 'SOAP-ENV:Server', '', 'Error en credenciales', '' );
	}
}


function agregarMovimientos($cuenta, $listaMovs) {
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		$cont=0;
		foreach ($listaMovs as $mov) {
			$rsdCliAct=traedatosmysql("SELECT * FROM mov_vip WHERE num_vip ='".$mov["num_vip"]."' AND doc_vip ='".$mov["doc_vip"]."'");			
			if (!($rsdCliAct->RecordCount()>0)) //EN EL CASO DE QUE NO HAYA ESOS REGISTROS, DEBE HACER EL INSERT EN LA TABLA DE MOVIMIENTOS
			{
				$mov["id_restaurante"]=str_replace("rest", "", $cuenta["usuario"]);
// 				$sqlInsert="INSERT INTO mov_vip( id_restaurante, num_vip,  doc_vip, fec_vip, mon_vip, caj_vip, det_vip, pto_vip) VALUES 
// 							('".$mov["id_restaurante"]."', '".$mov["num_vip"]."',  '".$mov["doc_vip"]."', '".$mov["fec_vip"]."',  '".$mov["mon_vip"]."', '".$mov["caj_vip"]."', '".$mov["det_vip"]."', '".$mov["pto_vip"]."' )";
// 				traedatosmysql($sqlInsert);
				InsertTable('mov_vip', $mov);				
			}
			$cont++;
		}
		return 'Se sincronizaron '.$cont .' movimientos' ;
		
	} else {
		return new soap_fault ( 'SOAP-ENV:Server', '', 'Error en credenciales', '' );
	}
}
function agregarFacturas($cuenta, $listaFacts) {
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		$cont=0;
		$id_rest=str_replace("rest", "", $cuenta["usuario"]);
		foreach ($listaFacts as $fac) {
			$fac["id_restaurante"]=$id_rest;
			$rsdCliAct=traedatosmysql("SELECT * FROM fact_vip WHERE id_restaurante ='".$id_rest."' AND orden ='".$fac["orden"]."' AND factura ='".$fac["factura"]."'");
			if (!($rsdCliAct->RecordCount()>0)) //EN EL CASO DE QUE NO HAYA ESOS REGISTROS, DEBE HACER EL INSERT EN LA TABLA DE FACTURAS VIP
			{
				
// 				$sqlInsert="INSERT INTO fact_vip ( id_restaurante, fecha, descrip, orden, factura, numero) VALUES
// 							('".$id_rest."', '".$fac["num_vip"]."',  '".$fac["doc_vip"]."', '".$fac["fec_vip"]."',  '".$fac["mon_vip"]."', '".$fac["caj_vip"]."', '".$fac["det_vip"]."', '".$fac["pto_vip"]."' )";
				// 				traedatosmysql($sqlInsert);
				InsertTable('fact_vip', $fac);
			}
			$cont++;
		}
		return 'Se sincronizaron '.$cont .' facturas ' ;
		
	} else {
		return new soap_fault ( 'SOAP-ENV:Server', '', 'Error en credenciales', '' );
	}
}

$server->register ( "agregarClientes", array ("cuenta" => "tns:accountWS", "listaClientes" => "tns:listaClientesVIP" ), array ("mensaje" => "xsd:string" ), "", "", "", "", "Agregar nuevos clientes VIP" );
$server->register ( "agregarMovimientos", array ("cuenta" => "tns:accountWS", "listaMovimientos" => "tns:listaMovVIP" ), array ("mensaje" => "xsd:string" ), "", "", "", "", "Agregar movimientos VIP" );

$server->register ( "agregarFacturas", array ("cuenta" => "tns:accountWS", "listaFacturas" => "tns:listaFactVIP" ), array ("mensaje" => "xsd:string" ), "", "", "", "", "Agregar facturas de tarjetas VIP" );

// Run service
$server->service ( file_get_contents ( 'php://input' ) );

?>
