<?php
error_reporting(0);
	require_once 'lib/basicos.php';
	require_once 'lib/sesion_usuario.php';
	//COMO NOS LLEGA COMO UN OBJETO JSON, CONVIRTAMOSLO A UN ARREGLO PHP QUE ENTIENDEN MIS FUNCIONES DE MI FRAMEWORKSITO:
	$arrayDatosInsertar=json_decode(str_replace("\\", "", $_REQUEST["store_data"]));
//	var_dump($arrayDatosInsertar);
	//COMO HASTA AHORITA SIGUE SIENDO UN OBJETO, LO CONVERTIMOS A UN ARREGLO PARA MIS FUNCIONES
	foreach($arrayDatosInsertar[0] as $key=>$value) {	  
//	     $arrayDatosInsertar2[$key] = utf8_encode(trim($value));
	     $arrayDatosInsertar2[$key] = (trim($value));
	}
	$arrayDatosInsertar= $arrayDatosInsertar2;
	  
	$arrayDatosInsertar["tipoNiveles"] > 0 ? $arrayDatosInsertar["tipoNiveles"] : $arrayDatosInsertar["tipoNiveles"] = 0; 
	$arrayDatosInsertar["clase"] > 0 ? $arrayDatosInsertar["clase"] : $arrayDatosInsertar["clase"] = 0;
	//OBTENEMOS LA CLAVE DEL TIPO DE AVALUO:
	$sql="SELECT clave FROM tipoavaluos WHERE id =".$arrayDatosInsertar["tipo"];
	$rsd= traedatosmysql($sql);
	$clave=$rsd->fields["clave"];
	//OBTENEMOS LA ABREVIATURA DEL ESTADO:
	$sql="SELECT abreviatura FROM estados WHERE id_estado =".$arrayDatosInsertar["estado"];
	$rsd= traedatosmysql($sql);
	$abreviatura=$rsd->fields["abreviatura"];
	//OBTENEMOS EL MUNICIPIO:
	$sql="SELECT municipio, claveDelegacion FROM municipios WHERE id_municipio =".$arrayDatosInsertar["municipio"];
	$rsd= traedatosmysql($sql);
	$municipio=$abreviatura == "DF" ? $rsd->fields["claveDelegacion"] : strtoupper(substr($rsd->fields["municipio"],0,3));
	//OBTENEMOS LA COLONIA:
	$sql="SELECT colonia FROM colonias WHERE id_colonia =".$arrayDatosInsertar["colonia"];
	$rsd= traedatosmysql($sql);
	$colonia= $rsd->fields["colonia"];
	
	//DECIDIMOS CADENA DEL NOMBRE EMPRESA O PERSONA FISICA
	if ($arrayDatosInsertar["personaMoral"]==1)
	{
		$arrayNombreEmpresa=explode(" ",QuitarArticulos(trim($arrayDatosInsertar["nombreEmpresa"])));
		switch (count($arrayNombreEmpresa)) {
			case 1:
				$solicitante = substr($arrayNombreEmpresa[0],0,3);			
				break;
			case 2:
				$solicitante = substr($arrayNombreEmpresa[0],0,1).substr($arrayNombreEmpresa[1],0,2);
				break;
			case 3:
				$solicitante =substr($arrayNombreEmpresa[0],0,1).substr($arrayNombreEmpresa[1],0,1).substr($arrayNombreEmpresa[2],0,1);
				break;
			
			default:
				$solicitante =substr($arrayNombreEmpresa[0],0,1).substr($arrayNombreEmpresa[1],0,1).substr($arrayNombreEmpresa[2],0,1);
				break;
		}
		$solicitante=strtoupper($solicitante);
		
	}
	else
	{
		$nombre =strtoupper(trim($arrayDatosInsertar["nombre"])); 
		$apellidoPaterno =QuitarArticulos(strtoupper(trim($arrayDatosInsertar["apPaterno"]))); 
		$apellidoMaterno =QuitarArticulos(strtoupper(trim($arrayDatosInsertar["apMaterno"]))); 
		//Agregamos el primer caracter del apellido paterno 
		$solicitante = substr($apellidoPaterno,0, 1); 	
		//Buscamos y agregamos al rfc la primera vocal del primer apellido 
		$len_apellidoPaterno=strlen($apellidoPaterno); 
		for	($x=1;	$x<$len_apellidoPaterno; $x++) 
		{ 
			$c=substr($apellidoPaterno,$x,1); 
			if (EsVocal($c)) 
			{ 
				$solicitante .= $c; 
				break; 
			} 
		} 	
		//Agregamos el primer caracter del apellido materno 
		$solicitante.= substr($apellidoMaterno,0, 1); 
		
		//Agregamos el primer caracter del primer nombre 
		$solicitante .= substr($nombre,0, 1); 
	}	
//	$solicitante = $arrayDatosInsertar["personaMoral"]==1 ? substr(trim($arrayDatosInsertar["nombreEmpresa"]),3) : substr(trim($arrayDatosInsertar["apPaterno"]),3);
	
	
	
	
	
	
	//DECIDIMOS CADENA PARA EL NUMERO INTERIOR
	$numeroInterior = trim($arrayDatosInsertar["numInt"])!="" ? "-".trim($arrayDatosInsertar["numInt"]) : "";  
	$arrayDatosInsertar["usuario"]=$_SESSION["s_iduser"];
	$sql="SELECT rfcFirst FROM usuarios WHERE id =".$arrayDatosInsertar["usuario"];
	$rsd= traedatosmysql($sql);
	$rfcFirst= $rsd->fields["rfcFirst"];
	$arrayDatosInsertar["clave"]=utf8_encode($clave." ".substr(year_actual(), -2).date("m").dia_actual()." ".$arrayDatosInsertar["cp"]." ".$abreviatura.
	" ".$municipio. " ". $colonia. ", ". $arrayDatosInsertar["nombreCalle"]." ".$arrayDatosInsertar["numExt"].$numeroInterior. " ".	$solicitante." ".$rfcFirst);
	$arrayDatosInsertar["idUsuario"]=$_SESSION["s_iduser"];
	$resultado = InsertTable("cotizaciones", $arrayDatosInsertar,true);
	$idCotizacion=mysql_insert_id();
	echo '{"success":true, "clave":"'.$arrayDatosInsertar["clave"].'","idCotizacion":"'.$idCotizacion.'"}';
?>