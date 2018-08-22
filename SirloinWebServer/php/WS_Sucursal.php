<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ALL);
require_once "soap/nusoap.php";
//require_once ('lib/conexionMysql.php');

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
$server->configureWSDL ( "WS_Sucursal", "http://localhost/sirloin/php/WS_Sucursal.php");




$server->wsdl->addComplexType ( 'accountWS',
		'complextType', 'struct', 'sequence', '', array (
				'usuario' => array ('name' => 'usuario', 'type' => 'xsd:string' ),
				'password' => array ('name' => 'password', 'type' => 'xsd:string' )
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
 
function invokeSyncFact($cuenta) {
	$response=array();
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		
		$response["estatus"]=true;
		//aqui debemos invocar al jar
		// 	$salida = "La salida del comando, es:".shell_exec ( "./home/jcenteno/SW/test.sh");
		//$salida = "La salida del comando, es:".utf8_encode(exec( "C:\SirloinDesarrollo\Java\bin\java.exe -jar Sirloin_local_v2.1.jar 7 >> C:\SirloinDesarrollo\logs\CompLocalProc7.log"));
		//$salida .= "La salida del comando, es:".utf8_encode(exec( "C:\SirloinDesarrollo\Java\bin\runjobWebProc7Log.bat"));
		// pclose(popen("start /B ". "C:\\SirloinDesarrollo\Java\bin\runjobWebProc7Log.bat", "r")); 
		$bat="C:/SirloinDesarrollo/Java/bin/runjobLocalProc7WebProc7Log.bat";
		
		pclose(popen("start /B ". $bat, "r"));  
	//	$bat="C:/SirloinDesarrollo/Java/bin/runjobWebProc7Log.bat";
		
	//	pclose(popen("start /B ". $bat, "r"));  
		// exec("start /B C:\SirloinDesarrollo\Java\bin\runjobWebProc7Log.bat");
		//start /B
		// 	$salida = "La salida del comando, es:".exec ( "cd /home/jcenteno/ ; pwd; ls -l");
		// 	$salida .= shell_exec ( "ls -l");
		$response["mensaje"]= "Ya se ejecuto correctamente";
	}
	else 
	{
		$response["estatus"]=false;
		$response["mensaje"]= "Credenciales incorrectas, favor de verificar";
	}

	
	return $response;
}


function invokeSyncTarjetasVIP($cuenta) {
	$response=array();
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		
		$response["estatus"]=true;
		
		$bat="C:/SirloinDesarrollo/Java/bin/runjobWebProc2LocalProc3WSLog.bat";
		pclose(popen("start /B ". $bat, "r"));
		///$bat="C:/SirloinDesarrollo/Java/bin/runjobLocalProc3Log.bat";
		//pclose(popen("start /B ". $bat, "r"));		
		$response["mensaje"]= "Ya se ejecuto correctamente";
	}
	else
	{
		$response["estatus"]=false;
		$response["mensaje"]= "Credenciales incorrectas, favor de verificar";
	}
	
	
	return $response;
}
function createLogs($cuenta) {
	$response=array();
	if (autenticaUsuario($cuenta["usuario"], $cuenta["password"] )) {
		
		$response["estatus"]=true;
		// Get real path for our folder
// 		$rootPath = realpath('/var/www/html/sirloin/logs/');
		
		// Initialize archive object
		$zip = new ZipArchive();
		$zip->open('resources/logs.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
		
		// Create recursive directory iterator
		/** @var SplFileInfo[] $files */
		$files = new RecursiveIteratorIterator(
				new RecursiveDirectoryIterator("C:/SirloinDesarrollo/logs/"),
				RecursiveIteratorIterator::LEAVES_ONLY
				);
		
		foreach ($files as $name => $file)
		{
			// Skip directories (they would be added automatically)
			if (!$file->isDir())
			{
				// Get real and relative path for current file
				$filePath = $file->getRealPath();
				$relativePath = substr($filePath, strlen("C:/SirloinDesarrollo/logs/") );
				
				// Add current file to archive
				$zip->addFile($filePath, $relativePath);
			}
		}
		
		// Zip archive will be created only after closing object
		$zip->close();
		
		
		$response["mensaje"]= "http://".$_SERVER['HTTP_HOST']."/rest/resources/logs.zip";
	}
	else
	{
		$response["estatus"]=false;
		$response["mensaje"]= "Credenciales incorrectas, favor de verificar";
	}
	
	
	return $response;
}



$server->register ( "invokeSyncFact", array ("cuenta" => "tns:accountWS"), array ("estatus" => "xsd:boolean","mensaje" => "xsd:string" ), "", "", "", "", "Sincronizacion de facturas del dia" );
$server->register ( "createLogs", array ("cuenta" => "tns:accountWS"), array ("estatus" => "xsd:boolean","mensaje" => "xsd:string" ), "", "", "", "", "Creacion del zip con los logs de la unidad" );
$server->register ( "invokeSyncTarjetasVIP", array ("cuenta" => "tns:accountWS"), array ("estatus" => "xsd:boolean","mensaje" => "xsd:string" ), "", "", "", "", "Sincronizacion de las tarjetas VIP del dia" );
// Run service
$server->service ( file_get_contents ( 'php://input' ) );

?>
