<?php
error_reporting ( 0 );
require_once 'lib/UtilsVIP.php';
require_once 'lib/conexionMysql.php';	
// require_once 'lib/bitacora.php';
//COMO NOS LLEGA COMO UN OBJETO JSON, CONVIRTAMOSLO A UN ARREGLO PHP QUE ENTIENDEN MIS FUNCIONES DE MI FRAMEWORKSITO:
$arrayDatosInsertar =  json_decode ( str_replace("\\", "", $_REQUEST ["store_data"]), true );
// $arrayDatosInsertar = $_REQUEST ["store_data"];
//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
foreach ( $arrayDatosInsertar [0] as $key => $value ) {
	//	     $arrayDatosInsertar2[$key] = utf8_encode(trim($value));
	$arrayDatosInsertar2 [$key] = html_entity_decode ( preg_replace ( "/\\\\u([0-9abcdef]{4})/", "&#x$1;", trim ( $value ) ) );
}
$arrayDatosInsertar = $arrayDatosInsertar2;

$file_name = $_FILES ["foto"] ["name"];
$file_tmp_name = $_FILES ["foto"] ["tmp_name"];
$file_type = $_FILES ["foto"] ["type"];
$file_size = round ( $_FILES ["foto"] ["size"] / 1024, 2 ) . "  Kilo Bytes";
if ($file_name != '')
	if (move_uploaded_file ( $file_tmp_name, "../images/promociones/" . $file_name ))
		$arrayDatosInsertar ["foto"] = $file_name;
	else
	{
		$arrayDatosInsertar ["foto"] = "";
		echo "<P>MOVE UPLOADED FILE FAILED!</P>";
		print_r(error_get_last());
	}
$arrayDatosInsertar["id_ubicacion"]=1;//por el momento todos serán de la CDMX
//$arrayDatosInsertar ["fecha"] = format_fechaExcelToMysql ( $arrayDatosInsertar ["fecha"] );
$resultado = InsertTable ( "promociones", $arrayDatosInsertar, true );
//INSERTAMOS EN BITACORA
// $arrayDatosBitacora["titulo"]=$arrayDatosInsertar["titulo"];
// $arrayDatosBitacora["foto"]=$arrayDatosInsertar["foto"];		
// $arrayDatosBitacora["descripcion"]=$arrayDatosInsertar["descripcion"];	

// $info=str_replace('}','',str_replace('{','',str_replace('"','',json_encode($arrayDatosBitacora))));
// creaBitacora( 31, $info, "");
echo '{"success":true}';
	 	
	
	
?>