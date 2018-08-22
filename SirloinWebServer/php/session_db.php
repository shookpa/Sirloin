<?php
//error_reporting(0);
require_once 'lib/conexionMysql.php';

class SessionDB {
//    public function __construct() {
////        if (!isset($_SESSION['pk'])) {
////            $this->reset();
////        }
//    }
//    // fake a database pk
//    public function pk() {
//        return $_SESSION['pk']++;
//    }
    // fake a resultset
    
    public function rs($tabla, $idPersonalizado="id", $campos="*") {
        $sql = "SELECT $campos FROM $tabla";
//        echo $sql ;
		$rsdDatos = traedatosmysql($sql);
		$i=0;
		while(!$rsdDatos->EOF){	
			foreach ($rsdDatos->fields as $key => $value) {
				//PARA CONVERTIR LOS ACENTOS Y LAS TILDES
				//A utf8:		
//				echo "<br>$key => $value";
				$arr[$i][$key]=utf8_encode($value);
			}
			$arr[$i]["id"]=$rsdDatos->fields["$idPersonalizado"];
	
			
			$i++;
			$rsdDatos->MoveNext();
		}	
//		var_dump($arr);
		return $arr;
    }
    public function insert($rec, $tabla) {
//        array_push($_SESSION['rs'], $rec);
		$this->InsertTable($tabla, $rec);
    	
    }
    public function update($tabla, $attributes, $id) {
//        $_SESSION['rs'][$idx] = $attribute
//		echo "COMIENZA tabla: $tabla, $id: $id, atributos:";
//		var_dump($attributes);
//		echo "TERMINA";
		$this->UpdateTable($tabla, $attributes, $id);
    }
    public function destroy($tabla, $id, $varid,$cond_extra="") {
		$this->DeleteFisico($tabla, $id,$varid,$cond_extra);
    }   
	private function DeleteFisico($tabla, $id, $varid, $cond_extra="")
	{
		global $conexionmysql;
		$updateSQL= "DELETE FROM $tabla WHERE $id='$varid' $cond_extra";	
		try {
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
	 
	 * @return BOOLEAN 
	 */
	private function InsertTable($tabla, $array)
	{
		
		try{		
			global $conexionmysql;
			$sql= "select * from $tabla LIMIT 1";		
			$recordset=$conexionmysql->Execute($sql);			
			$scQuery=ereg_replace("\%s",$tabla,$recordset->connection->metaColumnsSQL);	
		    $rsdDatos=traedatosmysql($scQuery);  
			while(!$rsdDatos->EOF)
			{
				  $fields[$rsdDatos->fields["Field"]]="1";
				  $rsdDatos->MoveNext();
			}			
			$array_int = $this->array_key_intersect($array,$fields);		
			$insertSQL = $conexionmysql->GetInsertSQL($recordset, $array_int);
//			echo "el query es:".$sql;
//			echo "empieza";	
//			var_dump($array);
//			echo "termina";		
		}
		catch (Exception $e)
		{		
			$result= "Excepcion en Insercion: ".$e->getMessage();
				
		}	
		try {		
			$result=traedatosmysql($insertSQL);	
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
	 
	 * @return BOOLEAN 
	 */
	private function UpdateTable($tabla, $array, $id)
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
		$array_int = $this->array_key_intersect($array,$fields);	
		$updateSQL = $conexionmysql->GetUpdateSQL($recordset, $array_int);	
		//echo "Intenta:".$updateSQL;   
		
		try {
			
			$result=traedatosmysql($updateSQL);	
			
		}
		catch (Exception $e)
		{
			$result= "Excepcion en Actualizacion: ".$e->getMessage();
				
		}
		
		return  $updateSQL;
	} 
	private function array_key_intersect($a, $b) {
	  $array = array();
	  foreach($a as $key=>$value) {
	   if (isset($b[$key]))
	     $array[$key] = trim($value);
	  }
	  return $array;
	}
}
//$dbh = new SessionDB();
//$dbh->rs("cotizaciones INNER JOIN objetos ON objetos.id =cotizaciones.objeto
//	INNER JOIN propositos ON propositos.id =cotizaciones.proposito
//	INNER JOIN tipoavaluos ON tipoavaluos.id =cotizaciones.tipo	
//	INNER JOIN estados ON estados.id_estado =cotizaciones.estado
//	INNER JOIN municipios ON municipios.id_municipio =cotizaciones.municipio
//	INNER JOIN colonias ON colonias.id_colonia =cotizaciones.colonia	
//	INNER JOIN vialidad ON vialidad.id =cotizaciones.tipoCalle	
//	INNER JOIN usos ON usos.id =cotizaciones.uso
//	INNER JOIN subusos ON subusos.id_subuso =cotizaciones.subuso
//	INNER JOIN tiponiveles ON tiponiveles.id =cotizaciones.tipoNiveles
//	INNER JOIN clases ON clases.id =cotizaciones.clase
//	
//	LEFT JOIN regimenpropiedad ON regimenpropiedad.id =cotizaciones.regimenPropiedad
//	LEFT JOIN titulos ON titulos.id =cotizaciones.titulo","id_cotizacion", 
//	"cotizaciones.*, 
//	 tipoavaluos.avaluo,
//	 objetos.objeto,
//	 propositos.proposito,
//	 estados.estado,
//	 municipios.municipio,	
//	 colonias.colonia, 
//	 cotizaciones.objeto valorobjeto
//	 
//	 
//	 ");

//// Sample data.
//function getData($tabla) {	
//    return array(
//        array('id' => 1, 'first' => "Fred", 'last' => 'Flintstone', 'email' => 'fred@flintstone.com'),
//        array('id' => 2, 'first' => "Wilma", 'last' => 'Flintstone', 'email' => 'wilma@flintstone.com'),
//        array('id' => 3, 'first' => "Pebbles", 'last' => 'Flintstone', 'email' => 'pebbles@flintstone.com'),
//        array('id' => 4, 'first' => "Barney", 'last' => 'Rubble', 'email' => 'barney@rubble.com'),
//        array('id' => 5, 'first' => "Betty", 'last' => 'Rubble', 'email' => 'betty@rubble.com'),
//        array('id' => 6, 'first' => "BamBam", 'last' => 'Rubble', 'email' => 'bambam@rubble.com')
//    );	
//}
?>