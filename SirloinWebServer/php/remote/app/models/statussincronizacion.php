<?php
/**
 * @class User
 */
class Statussincronizacion extends Model {
public $id, $attributes;
    static function create($params) {
        $obj = new self(get_object_vars($params));
        $obj->save();
        return $obj;
    }
    static function find($id) {
        global $dbh;
        $found = null;
        foreach ($dbh->rs("tarifaBaseIntegra","id_tarifa") as $rec) {
            if ($rec['id'] == $id) {
                $found = new self($rec);
                break;
            }
        }
        return $found;
    }
    static function update($id, $params) {
        global $dbh;
        $rec = self::find($id);

        if ($rec == null) {
            return $rec;
        }
        $rs = $dbh->rs("tarifaBaseIntegra","id_tarifa");

        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec->attributes = array_merge($rec->attributes, get_object_vars($params));
                $rec->attributes["id_tarifa"] = $id;
//                var_dump($rec->attributes);
                $dbh->update("tarifaBaseIntegra", $rec->attributes,"id_tarifa");
                break;
            }
        }
        return $rec;
    }
    static function destroy($id) {
        global $dbh;
        $rec = null;
        $rs = $dbh->rs("tarifaBaseIntegra","id_tarifa");
        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec = new self($dbh->destroy("tarifaBaseIntegra","id_tarifa",$id));
                break;
            }
        }
        return $rec;
    }
    static function all() {
        global $dbh;

//fortuna 4
// ventura 5
        return $dbh->rs("clientes_rest3 
						UNION 
						SELECT  'Loreto' AS restaurante, MAX(  ultima_actualizacion ) AS ultima_fecha
						FROM  clientes_rest2 
						UNION 
						SELECT  'Fortuna' AS restaurante, MAX(  ultima_actualizacion ) AS ultima_fecha
						FROM  clientes_rest4 
						UNION 
						SELECT  'Ventura' AS restaurante, MAX(  ultima_actualizacion ) AS ultima_fecha
						FROM  clientes_rest5
						UNION 
						SELECT  'Rosario' AS restaurante, MAX(  ultima_actualizacion ) AS ultima_fecha
						FROM  clientes_rest6
						UNION 
						SELECT  'Coapa' AS restaurante, MAX(  ultima_actualizacion ) AS ultima_fecha
						FROM  clientes_rest1","id","'Churubusco' AS restaurante, MAX(ultima_actualizacion) AS ultima_fecha");
    }

    public function __construct($params) {
        $this->id = isset($params['id']) ? $params['id'] : null;
        $this->attributes = $params;
    }
    public function save() {
        global $dbh;      
        $dbh->insert($this->attributes,"tarifaBaseIntegra");
    }
    public function to_hash() {
        return $this->attributes;
    }
}
