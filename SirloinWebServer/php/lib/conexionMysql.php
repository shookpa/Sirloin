<?php
include('adodb/adodb.inc.php');
include('adodb/tohtml.inc.php');
date_default_timezone_set ("America/Mexico_City");

$host='localhost';
$useri='root';  
$pwd='moniceli'; 
$base='softwebc_sirloin';
$conexionmysql=conectamysql("HASH",$host,$useri,$pwd,$base);
//var_dump($conexionmysql);
function conectamysql($fetchas="ARRAY",$host,$useri,$pwd,$base)
{
	$db = &ADONewConnection('mysql');
	//$db->debug = true;	
	$db->Connect($host, $useri,$pwd,$base);	
	if($fetchas == "HASH")
	{	
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
	}
	return $db;  
} 
function desconecta()
{
	extract($GLOBALS);
	$Conn=null;
	return $function_ret;
} 
/**
 * DEVUELVE EL RECORDSET DE UN QUERY ENVIADO DE MySQL
 *
 * @param String $lsQuery
 * @return RecordSet
 */
function traedatosmysql($lsQuery)
{
	global $conexionmysql;
	$rsd=$conexionmysql->execute($lsQuery);
	return $rsd;
} 
/**
 * DEVUELVE EL NUMERO DE REGISTROS DEL QUERY ENVIADO DE MySQL
 *
 * @param String $lsQuery
 * @return int 
 */
function num_regmysql($lsQuery)
{
	extract($GLOBALS);	
	global $conexionmysql;	
	try {
		$rsdDatos=$conexionmysql->Execute($lsQuery);

		$numreg = $rsdDatos->RecordCount();
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
			 $numreg=0;
	}
	return $numreg;
} 


/**
 * FUNCION PARA DESACTIVAR REGISTROS CAMBIANDO EL STATUS:
 *
 * @param String $tabla
 * @param String $id
 * @param String $varid
 * @param Int $mod_err
 * @return BOOLEAN 
 */
function DeleteLogicoTable($tabla, $id, $varid, $mod_err)
{
	global $conexionmysql;
	$updateSQL= "UPDATE $tabla SET status = '0' WHERE $id='$varid'";	
	
	try {
		$result=traedatosmysql($updateSQL);	
	}
	catch (Exception $e)
	{
		$result= "Excepcion en Actualizacion: ".$e->getMessage();
		
				
	}
	return  $result;
}
/**
 * FUNCION PARA ACTIVAR REGISTROS CAMBIANDO EL STATUS:
 *
 * @param String $tabla
 * @param String $id
 * @param String $varid
 * @param Int $mod_err
 * @return BOOLEAN 
 */
function RestartDeleteLogicoTable($tabla, $id,$varid, $mod_err)
{
	global $conexionmysql;
	$updateSQL= "UPDATE $tabla SET status = '1' WHERE $id='$varid'";	
	try {
		$result=traedatosmysql($updateSQL);	
	}
	catch (Exception $e)
	{
		$result= "Excepcion en Actualizacion: ".$e->getMessage();
					
	}
	return  $result;
}
/**
 * FUNCION PARA ELIMINAR REGISTROS FISICAMENTE EN LA TABLA:
 *
 * @param String $tabla
 * @param String $id
 * @param String $varid
 * @param String $cond_extra
 * @param Int $mod_err
 * @return BOOLEAN 
 */
function DeleteFisico($tabla, $id, $varid, $cond_extra="", $mod_err=1)
{
	global $conexionmysql;
	$updateSQL= "DELETE FROM $tabla WHERE $id='$varid' $cond_extra";	
	try {
//		echo "<br> La eliminacion que intenta hacer es ".$updateSQL;
		$result=traedatosmysql($updateSQL);	
	}
	catch (Exception $e)
	{
		$result= "Excepcion en Eliminacion: ".$e->getMessage();
			
	}
	return  $result; 
}


/**
 * FUNCION PARA INSERTAR DATOS
 *
 * @param String $tabla
 * @param Array $array (datos por insertar)
 * @param Int $mod_err
 * @return BOOLEAN 
 */
function InsertTable($tabla, $array, $mod_err=1)
{
	
	try{		
		global $conexionmysql;
		$sql= "select * from $tabla LIMIT 1";
// 		echo $sql;
		$recordset=$conexionmysql->Execute($sql);			
		$scQuery=ereg_replace("\%s",$tabla,$recordset->connection->metaColumnsSQL);	
	    $rsdDatos=traedatosmysql($scQuery);  
		while(!$rsdDatos->EOF)
		{
			  $fields[$rsdDatos->fields["Field"]]="1";
			  $rsdDatos->MoveNext();
		}			
		$array_int = array_key_intersect($array,$fields);		
		
		$insertSQL = utf8_decode($conexionmysql->GetInsertSQL($recordset, $array_int));
// 		echo "VEAMOS EL QUERY POR INSERTAR: ".$insertSQL;
		
	}
	
	catch (Exception $e)
	{		
		$result= "Excepcion en Insercion: ".$e->getMessage();
			
	}	

	try {		
		$result=traedatosmysql($insertSQL);	
//		$result=$insertSQL;
	}
	
	catch (Exception $e)
	{
		$result= "Excepcion en Insercion: ".$e->getMessage();				
	}
	return  $result;
}

/**
 * MODIFICAR DATOS PASANDO EN EL ARRAY EL ID
 *
 * @param String $tabla
 * @param Array $array
 * @param String $id
 * @param Int $mod_err
 * @return BOOLEAN 
 */
function UpdateTable($tabla, $array, $id, $mod_err)
{
	global $conexionmysql;
	$sql= "select * from $tabla where $id='$array[$id]'";
	//echo "Intenta:".$sql;  
	$recordset=$conexionmysql->Execute($sql);	
	$scQuery=ereg_replace("\%s",$tabla,$recordset->connection->metaColumnsSQL);	
	$rsdDatos=traedatosmysql($scQuery);
	while(!$rsdDatos->EOF)
	{
		  $fields[$rsdDatos->fields["Field"]]="1";	
		  $rsdDatos->MoveNext();
	}
	$array_int = array_key_intersect($array,$fields);	
	$updateSQL =utf8_decode($conexionmysql->GetUpdateSQL($recordset, $array_int));	
//	echo "Intenta:".$updateSQL;   
	
	try {
		
		$result=traedatosmysql($updateSQL);	
		$result=($updateSQL);	
		
	}
	catch (Exception $e)
	{
		$result= "Excepcion en Actualizacion: ".$e->getMessage();
			
	}
	
	return  $result;
}
/**
 * MODIFICAR DATOS CON CRITERIO PERSONALIZABLE
 *
 * @param String $tabla
 * @param Array $array
 * @param String $id
 * @param String $varid
 * @param Int $mod_err
 * @return BOOLEAN 
 */
function UpdateTableChar($tabla, $array,$id,$condExtra, $mod_err)
{
	global $conexionmysql;
	$sql= "select * from $tabla where $id='$array[$id]' $condExtra";
//	echo $sql;
	$recordset=$conexionmysql->Execute($sql);	
	$scQuery=ereg_replace("\%s",$tabla,$recordset->connection->metaColumnsSQL);	
	$rsdDatos=traedatosmysql($scQuery);
	 while(!$rsdDatos->EOF)
	{
		$fields[$rsdDatos->fields["Field"]]="1";
		$rsdDatos->MoveNext();
	}
	$array_int = array_key_intersect($array,$fields);
	$updateSQL = $conexionmysql->GetUpdateSQL($recordset, $array_int);
	try {
		$result=traedatosmysql($updateSQL);	
	}
	catch (Exception $e)
	{
		$result= "Excepcion en Actualizacion: ".$e->getMessage();
					
	}
	return  $updateSQL;
}

/**
 * Funcion que limpia la tabla de datos
 *
 * @param String $tabla
 * @return Boolean
 */
function truncaTable ($tabla)
{
	global $conexionmysql;	
	$sql= "TRUNCATE TABLE $tabla";
	$conexionmysql->Execute($sql);
	return true;
}

// PARA ASIGNAR LOS VALORES ENTRE ARREGLOS:
function array_key_intersect($a, $b) {
  $array = array();
  foreach($a as $key=>$value) {
   if (isset($b[$key]))
     $array[$key] = trim($value);
  }
  return $array;
}

?>
