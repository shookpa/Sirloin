<?php
date_default_timezone_set ( 'America/Mexico_City' );
error_reporting(0);

include ("../lib/conexionMysql.php");
include_once "PHPExcel/PHPExcel.php";
// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel ();
// Se asignan las propiedades del libro

// var_dump($_POST);
// $data=json_decode($_POST["data"]);
// var_dump($data);
// $fec1 = $_POST ["fec1"];
// $fec2 = $_POST["fec2"];
// $rest = $_POST ["rest"];
// $tipo_mov = $_POST["tipo_mov"];
// $tarjeta= $_POST["tarjeta"];

// $condFec = " AND mov_vip.fec_vip BETWEEN '$fec1' AND '$fec2'"; // ESTA CONDICION SIEMPRE VA
// if ($tarjeta != "null" && $tarjeta != "")
// $condTarj = "AND mov_vip.num_vip= '$tarjeta'";
// if ($rest != "null")
// $condRest = "AND mov_vip.id_restaurante= '$rest'";
// if ($tipo_mov != "null" && $tipo_mov != "")
// if ($tipo_mov == "1")
// $condMov = "AND mov_vip.det_vip= 'Descarga Puntos en Tarjeta VIP'";
// else
// $condMov = "AND mov_vip.det_vip= 'Acumula Puntos en Tarjeta VIP'";

// $sql = "SELECT
// id_mov,mov_vip.num_vip, clientes_vip.nom_vip,
// cat_restaurantes.nombre_restaurante, mov_vip.doc_vip,
// mov_vip.det_vip, mov_vip.fec_vip, mov_vip.mon_vip, mov_vip.caj_vip
// FROM mov_vip
// LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
// LEFT JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip WHERE 1 $condFec $condRest $condMov $condTarj
// ";
// echo $sql;

$fec1 = $_GET ["fec1"];
$fec2 = $_GET ["fec2"];
$rest = $_GET ["rest"];
$tipo_mov = $_GET ["tipomov"];
$tarjeta = $_GET ["tarjeta"];
$montoMax = $_GET ["montoMax"];
$montoMin = $_GET ["montoMin"];
$nombre = $_GET ["nombre"];
$fechaNac = $_GET ["fechaNac"];
$fechaNac2 = $_GET ["fechaNac2"];
$tipoReg = $_GET ["tipoReg"];

if ($_SESSION ["s_tipoUser"] == "3")
	$condRest = " AND cat_restaurantes.id_restaurante IN (" . $_SESSION ["s_rest"] . ")";
// "&montoMax=" + montoMax+ "&montoMin=" + montoMin+ "&nombre=" + nombre+ "&fechaNac=" + fechaNac
if ($fechaNac != "null" && $fechaNac != "") {
	$fechaNac = explode ( "-", $fechaNac );
	$fechaNac [1] = $fechaNac [1] * 1;
	$fechaNac [2] = $fechaNac [2] * 1;
	$condFechanac = "AND usuarios.year_nac=" . $fechaNac [0] . " AND usuarios.mes_nac=" . $fechaNac [1] . " AND usuarios.dia_nac=" . $fechaNac [2] . "";
}
if ($fechaNac2 != "null" && $fechaNac2 != "") {
	$fechaNac2 = explode ( "-", $fechaNac2 );
	$fechaNac2 [1] = $fechaNac2 [1] * 1;
	$fechaNac2 [2] = $fechaNac2 [2] * 1;
	$condFechanac2 = "AND usuarios.year_nac<=" . $fechaNac2 [0] . " AND usuarios.mes_nac<=" . $fechaNac2 [1] . " AND usuarios.dia_nac<=" . $fechaNac2 [2] . "";
}
if ($nombre != "null" && $nombre != "")
	$condNombre = "AND clientes_vip.nom_vip LIKE '%$nombre%'";
if ($rest != "null" && $rest != "0")
	$condRest = "AND mov_vip.id_restaurante= '$rest'";
if ($tarjeta != "null" && $tarjeta != "")
	$condTarj = "AND mov_vip.num_vip= '$tarjeta'";
else if ($fec1 != "null" && $fec1 != "")
	$condFec = " AND mov_vip.fec_vip BETWEEN '$fec1' AND '$fec2'";
if ($tipo_mov != "null" && $tipo_mov != "" && $tipo_mov != "0")
	if ($tipo_mov == "1")
		$condMov = "AND mov_vip.det_vip= 'Descarga Puntos en Tarjeta VIP'";
	else
		$condMov = "AND mov_vip.det_vip= 'Acumula Puntos en Tarjeta VIP'";
if ($montoMax != "null" && $montoMax != "") {
	$condMount = " HAVING sum(mov_vip.mon_vip)<$montoMax";
	if ($montoMin != "null" && $montoMin != "")
		$condMount .= " AND sum(mov_vip.mon_vip)>$montoMin";
} else if ($montoMin != "null" && $montoMin != "")
	$condMount = " HAVING sum(mov_vip.mon_vip)>$montoMin";
if ($tipoReg == "true") {
	$nombreArchivo = "Movimientos_VIP_al_" . date ( "Y-m-d_H.i.s" );
	$objPHPExcel->getProperties()->setCreator("Jorge Centeno") //Autor
	->setLastModifiedBy("Jorge Centeno") //Ultimo usuario que lo modificó
	->setTitle("Reporte Excel con PHP y MySQL")
	->setSubject("Reporte Excel con PHP y MySQL")
	->setDescription($nombreArchivo)
	->setKeywords($nombreArchivo)
	->setCategory($nombreArchivo);
	$sql = "SELECT id_mov,mov_vip.num_vip, clientes_vip.nom_vip, clientes_vip.tel_vip,clientes_vip.ema_vip, clientes_vip.pto_vip,
				cat_restaurantes.nombre_restaurante, mov_vip.doc_vip,mov_vip.id_restaurante,
				mov_vip.det_vip, mov_vip.fec_vip,  sum(mov_vip.mon_vip) AS mon_vip FROM  mov_vip
			INNER JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip
			LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
			LEFT JOIN usuarios ON usuarios.num_vip = clientes_vip.num_vip
			WHERE 1
			$condFec $condRest $condMov $condTarj $condNombre $condRest $condFechanac $condFechanac2
			GROUP BY id_mov, mov_vip.num_vip, mov_vip.det_vip, mov_vip.fec_vip
			$condMount ";
// 			echo $sql;
	$titulosColumnas = array (
			'ID_MOV',
			'RESTAURANTE',
			'NUM_VIP',
			'NOMBRE CLIENTE',
			'CORREO CLIENTE',
			'TELEFONO CLIENTE',
			'DOCUMENTO',
			'DETALLE DEL MOVIMIENTO',
			'FECHA',
			'MONTO' 
	);
	$objPHPExcel->setActiveSheetIndex ( 0 )->mergeCells ( 'A1:J1' );
	
	// Se agregan los titulos del reporte
	
	$objPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'A1', $nombreArchivo )->setCellValue ( 'A3', $titulosColumnas [0] )->setCellValue ( 'B3', $titulosColumnas [1] )->setCellValue ( 'C3', $titulosColumnas [2] )->setCellValue ( 'D3', $titulosColumnas [3] )->setCellValue ( 'E3', $titulosColumnas [4] )->setCellValue ( 'F3', $titulosColumnas [5] )->setCellValue ( 'G3', $titulosColumnas [6] )->setCellValue ( 'H3', $titulosColumnas [7] )->setCellValue ( 'I3', $titulosColumnas [8] )->setCellValue ( 'J3', $titulosColumnas [9] );
	$i = 4;
	$rsdDatos = traedatosmysql ( $sql );
	
	while ( ! $rsdDatos->EOF) {
// 		var_dump($rsdDatos->fields);
		$objPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'A' . $i, $rsdDatos->fields ["id_mov"] )->setCellValue ( 'B' . $i, $rsdDatos->fields ["nombre_restaurante"] )->setCellValue ( 'C' . $i, utf8_encode ( $rsdDatos->fields ["num_vip"] ) )->setCellValue ( 'D' . $i, ($rsdDatos->fields ["nom_vip"]) )->setCellValue ( 'E' . $i, ($rsdDatos->fields ["ema_vip"]) )->setCellValue ( 'F' . $i, ($rsdDatos->fields ["tel_vip"]) )->setCellValue ( 'G' . $i, ($rsdDatos->fields ["doc_vip"]) )->setCellValue ( 'H' . $i, ($rsdDatos->fields ["det_vip"]) )->setCellValue ( 'I' . $i, ($rsdDatos->fields ["fec_vip"]) )->setCellValue ( 'J' . $i, ($rsdDatos->fields ["mon_vip"]) );
		$i ++;
		$rsdDatos->MoveNext ();
	}
	$title="A1:J1";
	$headers="A3:J3";
} else {
	$nombreArchivo = "Listado_de_Tarjetas_VIP_al_" . date ( "Y-m-d_H.i.s" );
	$objPHPExcel->getProperties()->setCreator("Jorge Centeno") //Autor
	->setLastModifiedBy("Jorge Centeno") //Ultimo usuario que lo modificó
	->setTitle("Reporte Excel con PHP y MySQL")
	->setSubject("Reporte Excel con PHP y MySQL")
	->setDescription($nombreArchivo)
	->setKeywords($nombreArchivo)
	->setCategory($nombreArchivo);
	$sql = "SELECT clientes_vip.id AS id_mov,clientes_vip.num_vip, clientes_vip.nom_vip, clientes_vip.tel_vip,clientes_vip.ema_vip, cat_restaurantes.nombre_restaurante, clientes_vip.pto_vip
				 FROM mov_vip
			INNER JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip
			LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
			LEFT JOIN usuarios ON usuarios.num_vip = clientes_vip.num_vip
			WHERE 1
			$condFec $condRest $condMov $condTarj $condNombre $condRest $condFechanac $condFechanac2
			GROUP BY cat_restaurantes.nombre_restaurante,clientes_vip.num_vip
			$condMount ";
// 	echo $sql;
	$titulosColumnas = array (
			'ID_MOV',
			'RESTAURANTE',
			'NUM_VIP',
			'NOMBRE CLIENTE',
			'CORREO CLIENTE',
			'TELEFONO CLIENTE',
			'SALDO EN PUNTOS' 
	);
	$objPHPExcel->setActiveSheetIndex ( 0 )->mergeCells ( 'A1:G1' );
	
	// Se agregan los titulos del reporte
	$objPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'A1', $nombreArchivo )->setCellValue ( 'A3', $titulosColumnas [0] )->setCellValue ( 'B3', $titulosColumnas [1] )->setCellValue ( 'C3', $titulosColumnas [2] )->setCellValue ( 'D3', $titulosColumnas [3] )->setCellValue ( 'E3', $titulosColumnas [4] )->setCellValue ( 'F3', $titulosColumnas [5] )->setCellValue ( 'G3', $titulosColumnas [6] );
	
	$i = 4;
	$rsdDatos = traedatosmysql ( $sql );
	while ( ! $rsdDatos->EOF ) {
		// 		var_dump($rsdDatos->fields);
		
		$objPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'A' . $i, $rsdDatos->fields ["id_mov"] )->setCellValue ( 'B' . $i, $rsdDatos->fields ["nombre_restaurante"] )->setCellValue ( 'C' . $i, utf8_encode ( $rsdDatos->fields ["num_vip"] ) )->setCellValue ( 'D' . $i, ($rsdDatos->fields ["nom_vip"]) )->setCellValue ( 'E' . $i, ($rsdDatos->fields ["ema_vip"]) )->setCellValue ( 'F' . $i, ($rsdDatos->fields ["tel_vip"]) )->setCellValue ( 'G' . $i, ($rsdDatos->fields ["pto_vip"]) );
		$i ++;
		$rsdDatos->MoveNext ();
	}
	$title="A1:G1";
	$headers="A3:G3";
}



$estiloTituloReporte = array (
		'font' => array (
				'name' => 'Verdana',
				'bold' => true,
				'italic' => false,
				'strike' => false,
				'size' => 16,
				'color' => array (
						'rgb' => 'FFFFFF' 
				) 
		),
		'fill' => array (
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array (
						'argb' => 'FF220835' 
				) 
		),
		'borders' => array (
				'allborders' => array (
						'style' => PHPExcel_Style_Border::BORDER_NONE 
				) 
		),
		'alignment' => array (
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'rotation' => 0,
				'wrap' => TRUE 
		) 
);

$estiloTituloColumnas = array (
		'font' => array (
				'name' => 'Arial',
				'bold' => true,
				'color' => array (
						'rgb' => 'FFFFFF' 
				) 
		),
		'fill' => array (
				'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation' => 90,
				'startcolor' => array (
						'rgb' => 'c47cf2' 
				),
				'endcolor' => array (
						'argb' => 'FF431a5d' 
				) 
		),
		'borders' => array (
				'top' => array (
						'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
						'color' => array (
								'rgb' => '143860' 
						) 
				),
				'bottom' => array (
						'style' => PHPExcel_Style_Border::BORDER_MEDIUM,
						'color' => array (
								'rgb' => '143860' 
						) 
				) 
		),
		'alignment' => array (
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'wrap' => TRUE 
		) 
);

$estiloInformacion = new PHPExcel_Style ();
$estiloInformacion->applyFromArray ( array (
		'font' => array (
				'name' => 'Arial',
				'color' => array (
						'rgb' => '000000' 
				) 
		),
		'fill' => array (
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array (
						'argb' => 'FFd9b7f4' 
				) 
		),
		'borders' => array (
				'left' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array (
								'rgb' => '3a2a47' 
						) 
				) 
		) 
) );

$objPHPExcel->getActiveSheet ()->getStyle ( $title )->applyFromArray ( $estiloTituloReporte );
$objPHPExcel->getActiveSheet ()->getStyle ( $headers )->applyFromArray ( $estiloTituloColumnas );
$objPHPExcel->getActiveSheet ()->setSharedStyle ( $estiloInformacion, "A4:D" . ($i - 1) );

for($i = 'A'; $i <= 'I'; $i ++) {
	$objPHPExcel->setActiveSheetIndex ( 0 )->getColumnDimension ( $i )->setAutoSize ( true );
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet ()->setTitle ( "VIP");

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex ( 0 );
// Inmovilizar paneles
$objPHPExcel->getActiveSheet ( 0 )->freezePaneByColumnAndRow ( 0, 4 );
// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$nombreArchivo.'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
// $filePath = "/usr/local/4admin/apache/vhosts/programadepuntos-vip.com/httpdocs/resources/" . $nombreArchivo. ".xlsx";
$filePath = '../../resources/' . rand(0, getrandmax()) . rand(0, getrandmax()) . ".tmp";
$objWriter->save($filePath);
readfile($filePath);
// unlink($filePath);
exit;	
// $objWriter->save ( '../../resources/' . $nombreArchivo . ".xlsx" );
// echo 'http://sirloin.vip.soft-webcosmos.com.mx/resources/'.$nombreArchivo.".xlsx";
// echo '{"success":true, "archivo":"' . 'http://localhost/sirloin/resources/' . $nombreArchivo . ".xlsx" . '"}';
?>
