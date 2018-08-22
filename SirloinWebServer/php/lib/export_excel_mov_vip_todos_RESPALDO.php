<?php
date_default_timezone_set ( 'America/Mexico_City' );
include ('../lib/sesion_usuario.php');
include ('../lib/valida_sesion.php');
include ("../lib/conexionMysql.php");
include_once "PHPExcel/PHPExcel.php";
// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel ();
$nombreArchivo = "Listado_de_Movimientos_VIP_al_" . date ( "Y-m-d_H.i.s" );
// Se asignan las propiedades del libro
$objPHPExcel->getProperties ()->setCreator ( "Jorge Centeno" )-> // Autor
setLastModifiedBy ( "Jorge Centeno" )-> // Ultimo usuario que lo modificó
setTitle ( "Reporte Excel con PHP y MySQL" )->setSubject ( "Reporte Excel con PHP y MySQL" )->setDescription ( $nombreArchivo )->setKeywords ( $nombreArchivo )->setCategory ( $nombreArchivo );

// var_dump($parametros);
$fec1 = $_GET ["fec1"];
$fec2 = $_GET ["fec2"];
$rest = $_GET ["rest"];
$tipo_mov = $_GET ["tipo_mov"];

$condFec = " AND mov_vip.fec_vip BETWEEN '$fec1' AND '$fec2'"; // ESTA CONDICION SIEMPRE VA
if ($tarjeta != "null" && $tarjeta != "")
	$condTarj = "AND mov_vip.num_vip= '$tarjeta'";
if ($rest != "null")
	$condRest = "AND mov_vip.id_restaurante= '$rest'";
if ($tipo_mov != "null" && $tipo_mov != "")
	if ($tipo_mov == "1")
		$condMov = "AND mov_vip.det_vip= 'Descarga Puntos en Tarjeta VIP'";
	else
		$condMov = "AND mov_vip.det_vip= 'Acumula Puntos en Tarjeta VIP'";

$sql = "SELECT
			id_mov,mov_vip.num_vip, clientes_vip.nom_vip,
			cat_restaurantes.nombre_restaurante, mov_vip.doc_vip,
			mov_vip.det_vip, mov_vip.fec_vip, mov_vip.mon_vip, mov_vip.caj_vip
		FROM mov_vip
		LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
		LEFT JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip WHERE 1 $condFec  $condRest $condMov $condTarj
		";
// echo $sql;
$titulosColumnas = array (
		'ID_MOV',
		'RESTAURANTE',
		'TARJETA',
		'NOMBRE CLIENTE',
		'DOCUMENTO',
		'DETALLE DEL MOVIMIENTO',
		'FECHA',
		'MONTO',
		'CAJERO' 
);
$objPHPExcel->setActiveSheetIndex ( 0 )->mergeCells ( 'A1:I1' );

// Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'A1', $nombreArchivo )->setCellValue ( 'A3', $titulosColumnas [0] )->setCellValue ( 'B3', $titulosColumnas [1] )->setCellValue ( 'C3', $titulosColumnas [2] )->setCellValue ( 'D3', $titulosColumnas [3] )->setCellValue ( 'E3', $titulosColumnas [4] )->setCellValue ( 'F3', $titulosColumnas [5] )->setCellValue ( 'G3', $titulosColumnas [6] )->setCellValue ( 'H3', $titulosColumnas [7] )->setCellValue ( 'I3', $titulosColumnas [8] );

// Se agregan los datos de los alumnos
$i = 4;
$rsdDatos = traedatosmysql ( $sql );
while ( ! $rsdDatos->EOF ) {
	$objPHPExcel->setActiveSheetIndex ( 0 )->setCellValue ( 'A' . $i, $rsdDatos->fields ["id_mov"] )->setCellValue ( 'B' . $i, $rsdDatos->fields ["nombre_restaurante"] )->setCellValue ( 'C' . $i, utf8_encode ( $rsdDatos->fields ["num_vip"] ) )->setCellValue ( 'D' . $i, ($rsdDatos->fields ["nom_vip"]) )->setCellValue ( 'E' . $i, ($rsdDatos->fields ["doc_vip"]) )->setCellValue ( 'F' . $i, ($rsdDatos->fields ["det_vip"]) )->setCellValue ( 'G' . $i, ($rsdDatos->fields ["fec_vip"]) )->setCellValue ( 'H' . $i, ($rsdDatos->fields ["mon_vip"]) )->setCellValue ( 'I' . $i, ($rsdDatos->fields ["caj_vip"]) );
	$i ++;
	$rsdDatos->MoveNext ();
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

$objPHPExcel->getActiveSheet ()->getStyle ( 'A1:I1' )->applyFromArray ( $estiloTituloReporte );
$objPHPExcel->getActiveSheet ()->getStyle ( 'A3:I3' )->applyFromArray ( $estiloTituloColumnas );
$objPHPExcel->getActiveSheet ()->setSharedStyle ( $estiloInformacion, "A4:D" . ($i - 1) );

for($i = 'A'; $i <= 'I'; $i ++) {
	$objPHPExcel->setActiveSheetIndex ( 0 )->getColumnDimension ( $i )->setAutoSize ( true );
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet ()->setTitle ( 'Movimientos_Tarjetas_VIP' );

// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex ( 0 );
// Inmovilizar paneles
// $objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet ( 0 )->freezePaneByColumnAndRow ( 0, 4 );

// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
header ( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
header ( 'Content-Disposition: attachment;filename="' . $nombreArchivo . '.xlsx"' );
header ( 'Cache-Control: max-age=0' );

$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
$objWriter->save ( 'php://output' );
exit ();
?>
