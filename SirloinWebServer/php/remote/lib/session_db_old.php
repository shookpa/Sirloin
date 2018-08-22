<?php
//require_once ('../../lib/conexionMysql.php');
class SessionDB {
    public function __construct() {
        if (!isset($_SESSION['pk'])) {
            $this->reset();
        }
    }
    // fake a database pk
    public function pk() {
        return $_SESSION['pk']++;
    }
    // fake a resultset
    public function rs() {
        return $_SESSION['rs'];
    }
    public function insert($rec) {
        array_push($_SESSION['rs'], $rec);
    }
    public function update($idx, $attributes) {
        $_SESSION['rs'][$idx] = $attributes;
    }
    public function destroy($idx) {
        return array_shift(array_splice($_SESSION['rs'], $idx, 1));
    }
    
    public function reset() {
        $_SESSION['pk'] = 10;           // <-- start fake pks at 10
        $_SESSION['rs'] = getData();    // <-- populate $_SESSION with data.
    }
}

// Sample data.
function getData() {
//	$sql = "SELECT * FROM tarifaBaseIntegra";
//	$rsdDatos = traedatosmysql($sql);
//	$i=0;
//	while(!$rsdDatos->EOF){	
////		foreach ($rsdDatos->fields as $key => $value) {
////			//PARA CONVERTIR LOS ACENTOS Y LAS TILDES
////			//A utf8:		
////			$arr[$i][$key]=utf8_encode($value);
////		}
//		$arr[$i]["id"]=utf8_encode($rsdDatos->fields["id"]);
//		$arr[$i]["first"]=utf8_encode($rsdDatos->fields["val_cierre_min"]);
//		$arr[$i]["last"]=utf8_encode($rsdDatos->fields["val_cierre_max"]);
//		$arr[$i]["email"]=utf8_encode($rsdDatos->fields["porcentaje_aplicar"]);
//		$i++;
//		$rsdDatos->MoveNext();
//	}
    return array(
        array('id' => 1, 'first' => "Fred", 'last' => 'Flintstone', 'email' => 'fred@flintstone.com'),
        array('id' => 2, 'first' => "Wilma", 'last' => 'Flintstone', 'email' => 'wilma@flintstone.com'),
        array('id' => 3, 'first' => "Pebbles", 'last' => 'Flintstone', 'email' => 'pebbles@flintstone.com'),
        array('id' => 4, 'first' => "Barney", 'last' => 'Rubble', 'email' => 'barney@rubble.com'),
        array('id' => 5, 'first' => "Betty", 'last' => 'Rubble', 'email' => 'betty@rubble.com'),
        array('id' => 6, 'first' => "BamBam", 'last' => 'Rubble', 'email' => 'bambam@rubble.com')
    );
//	return $arr;
}