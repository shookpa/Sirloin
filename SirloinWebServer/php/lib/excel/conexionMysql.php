<? 
include('adodb/adodb.inc.php');
include('adodb/tohtml.inc.php');
$host='localhost';
$useri='web13u1';
$pwd='admin2008';
$base='web13db1';
$conexionmysql=conectamysql("HASH",$host,$useri,$pwd,$base);
function conectamysql($fetchas="ARRAY",$host,$useri,$pwd,$base)
{
	$db = &ADONewConnection('mysql');//$db->debug = true;	
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
		//echo "el query que intenta hacer es $lsQuery";	
		$numreg = $rsdDatos->RecordCount();
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
			 $numreg=0;
	}
	return $numreg;
} 
?>
