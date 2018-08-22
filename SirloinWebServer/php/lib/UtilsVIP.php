<?php
class UtilsVIP {
	static function getNumVip($tarjeta) {
		$numVip = substr ( $tarjeta, 2, 3 ) . substr ( $tarjeta, 11, 5 );
		return $numVip;
	}
	static function validateNumVipSeries4($numVip) {
		if (substr($numVip, 0,3)=="714") 
			//AHORA VALIDAREMOS LOS RANGOS DEFINIDOS POR MOI DEL CORREO
			if ((substr ( $numVip, 4, 4 ) >= 300 && substr ( $numVip, 4, 4 ) <= 499)
					|| (substr ( $numVip, 4, 4 ) >= 1300 && substr ( $numVip, 4, 4 ) <= 1399)
					|| (substr ( $numVip, 4, 4 ) >= 1400 && substr ( $numVip, 4, 4 ) <= 1499)
					|| (substr ( $numVip, 4, 4 ) >= 2300 && substr ( $numVip, 4, 4 ) <= 2499))
				return true;
			else
				return false;
		else
			return false;
	}
	static function validateNumVIP($numVip) {
		$numReg = num_regmysql ( "SELECT * FROM clientes_vip WHERE num_vip='" . $numVip . "'" );
		if ($numReg > 0)
			return true;
		else
			return false;
	}
	static function validateNumVIPSold($numVip) {
// 		echo "SELECT * FROM fact_vip WHERE descrip='" . $numVip . "'" ;
		$numReg = num_regmysql ( "SELECT * FROM fact_vip WHERE descrip='" . $numVip . "'" );
		if ($numReg > 0)
			return true;
		else
			return false;
	}
	
	static function getDataMovs($numVip) {
		$rsd = traedatosmysql ( "SELECT id_restaurante FROM mov_vip WHERE num_vip='" . $numVip . "' ORDER BY id_mov LIMIT 1" );
		if (! $rsd->EOF)
			return $rsd->fields;
			else
				return null;
	}
	static function getDataInvoiceSold($numVip) {
		$rsd = traedatosmysql ( "SELECT id_restaurante,fecha,totalf FROM fact_vip WHERE descrip='" . $numVip . "'" );
		if (! $rsd->EOF)
			return $rsd->fields;
		else
			return null;
	}
	static function getDataByUser($user) {
		$rsd = traedatosmysql ( "SELECT * FROM usuarios WHERE user='" . $user. "'" );
		if (! $rsd->EOF)
			return $rsd->fields;
			else
				return null;
	}
	static function getDataById($idUser) {
		$rsd = traedatosmysql ( "SELECT * FROM usuarios WHERE id='" . $idUser. "'" );
		if (! $rsd->EOF)
			return $rsd->fields;
			else
				return null;
	}
	static function validateUserByNumVIP($numVip) {
		$numReg = num_regmysql ( "SELECT * FROM usuarios WHERE num_vip='" . $numVip . "'" );
		if ($numReg > 0)
			return true;
		else
			return false;
	}
	static function validateUserByEmail($email) {
		$numReg = num_regmysql ( "SELECT * FROM usuarios WHERE email='" . $email . "'" );
		if ($numReg > 0)
			return true;
		else
			return false;
	}
}
?>