<?php 
date_default_timezone_set('America/Mexico_City');
include('../lib/sesion_usuario.php');
include('../lib/valida_sesion.php');
include("../lib/conexionMysql.php");
include_once "PHPExcel/PHPExcel.php";
// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel();
$nombreArchivo="Listado_de_Clientes_VIP_al_".date("Y-m-d_H.i.s");
// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("Jorge Centeno") //Autor
					 ->setLastModifiedBy("Jorge Centeno") //Ultimo usuario que lo modificó
					 ->setTitle("Reporte Excel con PHP y MySQL")
					 ->setSubject("Reporte Excel con PHP y MySQL")
					 ->setDescription($nombreArchivo)
					 ->setKeywords($nombreArchivo)
					 ->setCategory($nombreArchivo);


$sql="SELECT
	id, num_vip, nom_vip, tel_vip, ema_vip, fec_vip, sal_vip, fuc_vip, muc_vip, fup_vip, mup_vip, tnr_vip, tmr_vip, tct_vip, pto_vip, pva_vip, datetime_vip 
	FROM
	clientes_vip";
	$titulosColumnas = array('id', 'num_vip', 'nom_vip', 'tel_vip', 'ema_vip', 'fec_vip', 'sal_vip', 'fuc_vip', 'muc_vip', 'fup_vip', 'mup_vip', 'tnr_vip', 'tmr_vip', 'tct_vip', 'pto_vip', 'pva_vip', 'datetime_vip');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:Q1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',$nombreArchivo)
        		    ->setCellValue('A3',  $titulosColumnas[0])
		            ->setCellValue('B3',  $titulosColumnas[1])
        		    ->setCellValue('C3',  $titulosColumnas[2])
        		    ->setCellValue('D3',  $titulosColumnas[3])
        		    ->setCellValue('E3',  $titulosColumnas[4])
        		    ->setCellValue('F3',  $titulosColumnas[5])
        		    ->setCellValue('G3',  $titulosColumnas[6])
        		    ->setCellValue('H3',  $titulosColumnas[7])
        		    ->setCellValue('I3',  $titulosColumnas[8])
        		    ->setCellValue('J3',  $titulosColumnas[9])
        		    ->setCellValue('K3',  $titulosColumnas[10])
        		    ->setCellValue('L3',  $titulosColumnas[11])
        		    ->setCellValue('M3',  $titulosColumnas[12])
        		    ->setCellValue('N3',  $titulosColumnas[13])
        		    ->setCellValue('O3',  $titulosColumnas[14])
        		    ->setCellValue('P3',  $titulosColumnas[15])
        		    ->setCellValue('Q3',  $titulosColumnas[16]);        		    
		
		//Se agregan los datos de los alumnos
		$i = 4;
		$rsdDatos=traedatosmysql($sql);
		 while(!$rsdDatos->EOF)
		{
			$objPHPExcel->setActiveSheetIndex(0)
        		    ->setCellValue('A'.$i,  $rsdDatos->fields["id"])
		            ->setCellValue('B'.$i,  $rsdDatos->fields["num_vip"])
        		    ->setCellValue('C'.$i,  utf8_encode($rsdDatos->fields["nom_vip"]))
        		    ->setCellValue('D'.$i,  ($rsdDatos->fields["tel_vip"]))
        		    ->setCellValue('E'.$i,  ($rsdDatos->fields["ema_vip"]))
        		    ->setCellValue('F'.$i,  ($rsdDatos->fields["fec_vip"]))
        		    ->setCellValue('G'.$i,  ($rsdDatos->fields["sal_vip"]))
        		    ->setCellValue('H'.$i,  ($rsdDatos->fields["fuc_vip"]))
        		    ->setCellValue('I'.$i,  ($rsdDatos->fields["muc_vip"]))
        		    ->setCellValue('J'.$i,  ($rsdDatos->fields["fup_vip"]))
        		    ->setCellValue('K'.$i,  ($rsdDatos->fields["mup_vip"]))
        		    ->setCellValue('L'.$i,  ($rsdDatos->fields["tnr_vip"]))
        		    ->setCellValue('M'.$i,  ($rsdDatos->fields["tmr_vip"]))
        		    ->setCellValue('N'.$i,  ($rsdDatos->fields["tct_vip"]))
        		    ->setCellValue('O'.$i,  ($rsdDatos->fields["pto_vip"]))
        		    ->setCellValue('P'.$i,  ($rsdDatos->fields["pva_vip"]))
        		    ->setCellValue('Q'.$i,  ($rsdDatos->fields["datetime_vip"]));
					$i++;
			$rsdDatos->MoveNext();
		}
		
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => 'FFFFFF'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'FF220835')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		$estiloTituloColumnas = array(
            'font' => array(
                'name'      => 'Arial',
                'bold'      => true,                          
                'color'     => array(
                    'rgb' => 'FFFFFF'
                )
            ),
            'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation'   => 90,
        		'startcolor' => array(
            		'rgb' => 'c47cf2'
        		),
        		'endcolor'   => array(
            		'argb' => 'FF431a5d'
        		)
			),
            'borders' => array(
            	'top'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                ),
                'bottom'     => array(
                    'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
                    'color' => array(
                        'rgb' => '143860'
                    )
                )
            ),
			'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'wrap'          => TRUE
    		));
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFd9b7f4')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A3:Q3')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:D".($i-1));
				
		for($i = 'A'; $i <= 'Q'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(true);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Tarjetas_Clientes_VIP');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,4);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$nombreArchivo.'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// 		$objWriter->save('php://output');
		$filePath = "/usr/local/4admin/apache/vhosts/programadepuntos-vip.com/httpdocs/resources/" . rand(0, getrandmax()) . rand(0, getrandmax()) . ".tmp";
		$objWriter->save($filePath);
		readfile($filePath);
		unlink($filePath);
		exit;	
?>
