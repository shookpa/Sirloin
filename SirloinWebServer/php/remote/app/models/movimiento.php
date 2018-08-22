<?php
/**
 * @class User
 */
class Movimiento extends Model {
	public $id, $attributes;
	static function create($params) {
		$obj = new self ( get_object_vars ( $params ) );
		$obj->save ();
		return $obj;
	}
	static function find($id) {
		global $dbh;
		$found = null;
		foreach ( $dbh->rs ( "tarifaBaseIntegra", "id_tarifa" ) as $rec ) {
			if ($rec ['id'] == $id) {
				$found = new self ( $rec );
				break;
			}
		}
		return $found;
	}
	static function update($id, $params) {
		global $dbh;
		$rec = self::find ( $id );
		
		if ($rec == null) {
			return $rec;
		}
		$rs = $dbh->rs ( "tarifaBaseIntegra", "id_tarifa" );
		
		foreach ( $rs as $idx => $row ) {
			if ($row ['id'] == $id) {
				$rec->attributes = array_merge ( $rec->attributes, get_object_vars ( $params ) );
				$rec->attributes ["id_tarifa"] = $id;
				// var_dump($rec->attributes);
				$dbh->update ( "tarifaBaseIntegra", $rec->attributes, "id_tarifa" );
				break;
			}
		}
		return $rec;
	}
	static function destroy($id) {
		global $dbh;
		$rec = null;
		$rs = $dbh->rs ( "tarifaBaseIntegra", "id_tarifa" );
		foreach ( $rs as $idx => $row ) {
			if ($row ['id'] == $id) {
				$rec = new self ( $dbh->destroy ( "tarifaBaseIntegra", "id_tarifa", $id ) );
				break;
			}
		}
		return $rec;
	}
	static function all() {
		global $dbh;
		
		return $dbh->rs ( "mov_vip
				LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
				LEFT JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip LIMIT 0", "id_mov", "id_mov,mov_vip.num_vip, clientes_vip.nom_vip,
				cat_restaurantes.nombre_restaurante, mov_vip.doc_vip,
				mov_vip.det_vip, mov_vip.fec_vip, mov_vip.mon_vip, mov_vip.caj_vip" );
	}
	static function searchMovimientos($params) {
		global $dbh;
		
		$parametros = explode ( "&", $params );
		// var_dump($parametros);
		$fec1 = explode ( "=", $parametros [0] );
		$fec1 = $fec1 [1];
		$fec2 = explode ( "=", $parametros [1] );
		$fec2 = $fec2 [1];
		$rest = explode ( "=", $parametros [2] );
		$rest = $rest [1];
		$tipo_mov = explode ( "=", $parametros [3] );
		$tipo_mov = $tipo_mov [1];
		$tarjeta = explode ( "=", $parametros [4] );
		$tarjeta = $tarjeta [1];
		$montoMax = explode ( "=", $parametros [5] );
		$montoMax = $montoMax [1];
		$montoMin = explode ( "=", $parametros [6] );
		$montoMin = $montoMin [1];
		$nombre = explode ( "=", $parametros [7] );
		$nombre = $nombre [1];
		$fechaNac = explode ( "=", $parametros [8] );
		$fechaNac = $fechaNac[1];
		$fechaNac2 = explode ( "=", $parametros [9] );
		$fechaNac2 = $fechaNac2[1];
		$tipoReg = explode ( "=", $parametros [10] );
		$tipoReg= $tipoReg[1];
		if ($_SESSION["s_tipoUser"]=="3")
			$condRest=" AND cat_restaurantes.id_restaurante IN (".$_SESSION["s_rest"].")";
		// "&montoMax=" + montoMax+ "&montoMin=" + montoMin+ "&nombre=" + nombre+ "&fechaNac=" + fechaNac
		if ($fechaNac!= "null" && $fechaNac!= "")
		{
			$fechaNac=explode("-",$fechaNac);
			$fechaNac[1]=$fechaNac[1]*1;
			$fechaNac[2]=$fechaNac[2]*1;
			$condFechanac= "AND usuarios.year_nac=".$fechaNac[0]." AND usuarios.mes_nac=".$fechaNac[1]." AND usuarios.dia_nac=".$fechaNac[2]."";
			
		}
		if ($fechaNac2!= "null" && $fechaNac2!= "")
		{
			$fechaNac2=explode("-",$fechaNac2);
			$fechaNac2[1]=$fechaNac2[1]*1;
			$fechaNac2[2]=$fechaNac2[2]*1;
			$condFechanac2= "AND usuarios.year_nac<=".$fechaNac2[0]." AND usuarios.mes_nac<=".$fechaNac2[1]." AND usuarios.dia_nac<=".$fechaNac2[2]."";
		}
		if ($nombre!= "null" && $nombre!= "")
			$condNombre = "AND clientes_vip.nom_vip LIKE '%$nombre%'";
		if ($rest != "null" && $rest != "0")
			$condRest = "AND mov_vip.id_restaurante= '$rest'";
		if ($tarjeta != "null" && $tarjeta != "")
			$condTarj = "AND mov_vip.num_vip= '$tarjeta'";
		else
			if ($fec1!= "null" && $fec1!= "")
				$condFec = " AND mov_vip.fec_vip BETWEEN '$fec1' AND '$fec2'";
		if ($tipo_mov != "null" && $tipo_mov != "" && $tipo_mov != "0")
			if ($tipo_mov == "1")
				$condMov = "AND mov_vip.det_vip= 'Descarga Puntos en Tarjeta VIP'";
			else
				$condMov = "AND mov_vip.det_vip= 'Acumula Puntos en Tarjeta VIP'";
		if ($montoMax != "null" && $montoMax != "") {
			$condMount = " HAVING sum(mov_vip.mon_vip)<$montoMax";
			if ($montoMin!= "null" && $montoMin!= "") 
				$condMount .= " AND sum(mov_vip.mon_vip)>$montoMin";			
		}
		else 
			if ($montoMin!= "null" && $montoMin!= "") 
				$condMount = " HAVING sum(mov_vip.mon_vip)>$montoMin";
		if ($tipoReg=="true")	
			return $dbh->rs ( "mov_vip
				INNER JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip
				LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
				LEFT JOIN usuarios ON usuarios.num_vip = clientes_vip.num_vip
				WHERE 1
				$condFec $condRest $condMov $condTarj $condNombre $condRest $condFechanac $condFechanac2
				GROUP BY mov_vip.num_vip, mov_vip.det_vip, mov_vip.fec_vip 	
				$condMount
				", "id_mov", "id_mov,mov_vip.num_vip, clientes_vip.nom_vip, clientes_vip.tel_vip,clientes_vip.ema_vip, clientes_vip.pto_vip,
				cat_restaurantes.nombre_restaurante, mov_vip.doc_vip,mov_vip.id_restaurante,
				mov_vip.det_vip, mov_vip.fec_vip,  sum(mov_vip.mon_vip) AS mon_vip 
	 		" );
		else 
			return $dbh->rs ( "mov_vip
					INNER JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip
					LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
					LEFT JOIN usuarios ON usuarios.num_vip = clientes_vip.num_vip
					WHERE 1
					$condFec $condRest $condMov $condTarj $condNombre $condRest $condFechanac $condFechanac2
					GROUP BY clientes_vip.num_vip
					$condMount
					", "id_mov", "clientes_vip.id AS id_mov,clientes_vip.num_vip, clientes_vip.nom_vip, clientes_vip.tel_vip,clientes_vip.ema_vip, clientes_vip.pto_vip,
				cat_restaurantes.nombre_restaurante, mov_vip.id_restaurante,
				clientes_vip.pto_vip AS mon_vip
	 		" );
	}
	static function searchMovimientosPaginados($params) {
		global $dbh;
// 		var_dump($params);
		$parametros = explode ( "&", $params );
		// var_dump($parametros);
		$fec1 = explode ( "=", $parametros [0] );
		$fec1 = $fec1 [1];
		$fec2 = explode ( "=", $parametros [1] );
		$fec2 = $fec2 [1];
		$rest = explode ( "=", $parametros [2] );
		$rest = $rest [1];
		$tipo_mov = explode ( "=", $parametros [3] );
		$tipo_mov = $tipo_mov [1];
		$tarjeta = explode ( "=", $parametros [4] );
		$tarjeta = $tarjeta [1];
		$montoMax = explode ( "=", $parametros [5] );
		$montoMax = $montoMax [1];
		$montoMin = explode ( "=", $parametros [6] );
		$montoMin = $montoMin [1];
		$nombre = explode ( "=", $parametros [7] );
		$nombre = $nombre [1];
		$fechaNac = explode ( "=", $parametros [8] );
		$fechaNac = $fechaNac[1];
		$fechaNac2 = explode ( "=", $parametros [9] );
		$fechaNac2 = $fechaNac2[1];
		$tipoReg = explode ( "=", $parametros [10] );
		$tipoReg= $tipoReg[1];
		if ($_SESSION["s_tipoUser"]=="3")
			$condRest=" AND cat_restaurantes.id_restaurante IN (".$_SESSION["s_rest"].")";
		// "&montoMax=" + montoMax+ "&montoMin=" + montoMin+ "&nombre=" + nombre+ "&fechaNac=" + fechaNac
		if ($fechaNac!= "null" && $fechaNac!= "")
		{
			$fechaNac=explode("-",$fechaNac);
			$fechaNac[1]=$fechaNac[1]*1;
			$fechaNac[2]=$fechaNac[2]*1;			
			$condFechanac= "AND usuarios.year_nac>=".$fechaNac[0]." AND usuarios.mes_nac>=".$fechaNac[1]." AND usuarios.dia_nac>=".$fechaNac[2]."";			
		}
		if ($fechaNac2!= "null" && $fechaNac2!= "")
		{
			$fechaNac2=explode("-",$fechaNac2);
			$fechaNac2[1]=$fechaNac2[1]*1;
			$fechaNac2[2]=$fechaNac2[2]*1;
			$condFechanac2= "AND usuarios.year_nac<=".$fechaNac2[0]." AND usuarios.mes_nac<=".$fechaNac2[1]." AND usuarios.dia_nac<=".$fechaNac2[2]."";
		}
		if ($nombre!= "null"&& $nombre != "")
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
		if ($tipoReg == "true")
			return $dbh->rs ( "mov_vip
														INNER JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip
														LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
														LEFT JOIN usuarios ON usuarios.num_vip = clientes_vip.num_vip
														WHERE 1 
														$condFec $condRest $condMov $condTarj $condNombre $condRest $condFechanac $condFechanac2
														GROUP BY mov_vip.num_vip, mov_vip.det_vip, mov_vip.fec_vip 
														$condMount LIMIT " . $_GET ["limit"] . " OFFSET " . $_GET ["start"] . "
														", "id_mov", "id_mov,mov_vip.num_vip, clientes_vip.nom_vip, clientes_vip.tel_vip,clientes_vip.ema_vip, clientes_vip.pto_vip,
				cat_restaurantes.nombre_restaurante, mov_vip.doc_vip,mov_vip.id_restaurante,
				mov_vip.det_vip, mov_vip.fec_vip,  sum(mov_vip.mon_vip) AS mon_vip
	 		" );
		else
			return $dbh->rs ( "mov_vip
																	INNER JOIN clientes_vip ON clientes_vip.num_vip=mov_vip.num_vip
																	LEFT JOIN cat_restaurantes ON mov_vip.id_restaurante = cat_restaurantes.id_restaurante
																	LEFT JOIN usuarios ON usuarios.num_vip = clientes_vip.num_vip
																	WHERE 1
																	$condFec $condRest $condMov $condTarj $condNombre $condRest $condFechanac $condFechanac2
																	GROUP BY clientes_vip.num_vip
																	$condMount LIMIT " . $_GET ["limit"] . " OFFSET " . $_GET ["start"] . "
																	", "id_mov", "clientes_vip.id AS id_mov,clientes_vip.num_vip, clientes_vip.nom_vip, clientes_vip.tel_vip,clientes_vip.ema_vip, clientes_vip.pto_vip,
				cat_restaurantes.nombre_restaurante, mov_vip.id_restaurante,
				clientes_vip.pto_vip AS mon_vip
	 		" );
	}
	public function __construct($params) {
		$this->id = isset ( $params ['id'] ) ? $params ['id'] : null;
		$this->attributes = $params;
	}
	public function save() {
		global $dbh;
		$dbh->insert ( $this->attributes, "tarifaBaseIntegra" );
	}
	public function to_hash() {
		return $this->attributes;
	}
}

