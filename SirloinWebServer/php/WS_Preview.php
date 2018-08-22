<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(0);
require_once "lib/soap/nusoap.php";
require_once ('lib/conexionMysql.php');


// Create SOAP Server
$server = new soap_server ();
$server->soap_defencoding = 'UTF-8';
$server->decode_utf8 = false; 
$server->configureWSDL ( "WS_Preview", "http://soft-webcosmos.com.mx/axa_service/php/WS_Preview.php");




$server->wsdl->addComplexType ( 'item', 
				'complextType', 'struct', 'sequence', '', array (
					'key' => array ('name' => 'key', 'type' => 'xsd:string' ),
					'value' => array ('name' => 'value', 'type' => 'xsd:string' ) 					
					) );	
// $server->wsdl->addComplexType ( 'item',
// 		'complextType', 'struct', 'sequence', '', array (
// 				'item' => array ('name' => 'item', 'type' => 'tns:MyMapOf_xsd_string_To_xsd_anyType_Item' )
				
// 		) );	
$server->wsdl->addComplexType ( 'items', 'complexType', 'array', '', 'SOAP-ENC:Array', array (), array (array ('ref' => 'SOAP-ENC:arrayType', 'wsdl:arrayType' => 'tns:item[]' ) ), 'tns:item' );
$server->wsdl->addComplexType ( 'outDoc',
		'complextType', 'struct', 'sequence', '', array (
				'contentType' => array ('name' => 'contentType', 'type' => 'xsd:string'),
				'remoteURL' => array ('name' => 'remoteURL', 'type' => 'xsd:anyURI'),
				'attributes' => array ('name' => 'attributes', 'type' => 'tns:items')
		 ));	
 
function invoke($datosForma) {
	$response=array();
	$response["contentType"]="application/pdf";
	$response["remoteURL"]="http://soft-webcosmos.com.mx/axa_service/preview.pdf";
	$response["attributes"][0]["key"]="basename";
	$response["attributes"][0]["value"]="bg_axa_oficial.pdf";
	$response["attributes"][1]["key"]="file";
	$response["attributes"][1]["value"]="/opt/adobe/repository/pdf/bg_axa_oficial.pdf";
	$response["attributes"][2]["key"]="wsfilename";
	$response["attributes"][2]["value"]="/opt/adobe/repository/pdf/bg_axa_oficial.pdf";
	return $response;
}


$server->register ( "invoke", array (	'claveForma' => 'xsd:string' , 'leyenda'  => 'xsd:string'  	), array ("outDoc" => "tns:outDoc"), "", "", "", "", "Vista previa del documento" );
// Run service
$server->service ( file_get_contents ( 'php://input' ) );

?>
