<?php
/**
 * @class Restaurant
 */
class Restaurant extends Model {
public $id, $attributes;
    static function create($params) {
        $obj = new self(get_object_vars($params));
        $obj->save();
        return $obj;
    }
//     static function find($id) {
//         global $dbh;
//         $found = null;
//         foreach ($dbh->rs("cat_restaurantes","id_restaurante") as $rec) {
//             if ($rec['id'] == $id) {
//                 $found = new self($rec);
//                 break;
//             }
//         }
//         return $found;
//     }
    static function update($id, $params) {
        global $dbh;
        $rec = self::find($id);

        if ($rec == null) {
            return $rec;
        }
        $rs = $dbh->rs("cat_restaurantes","id_restaurante");

        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec->attributes = array_merge($rec->attributes, get_object_vars($params));
                $rec->attributes["id_restaurante"] = $id;
//                var_dump($rec->attributes);
                $dbh->update("cat_restaurantes", $rec->attributes,"id_restaurante");
                break;
            }
        }
        return $rec;
    }
    static function destroy($id) {
        global $dbh;
        $rec = null;
        $rs = $dbh->rs("cat_restaurantes","id_restaurante");
        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec = new self($dbh->destroy("cat_restaurantes","id_restaurante",$id));
                break;
            }
        }
        return $rec;
    }
    static function delete($id) {
    	global $dbh;
    	$rec = null;
    	$rs = $dbh->rs("rel_empr_rest","id");
    	foreach ($rs as $idx => $row) {
    		if ($row['id'] == $id) {
    			$rec = new self($dbh->destroy("rel_empr_rest","id",$id));
    			break;
    		}
    	}
    	return $rec;
    }
    static function filterByEmpresa($id) {
        global $dbh;

//fortuna 4
// ventura 5
        return $dbh->rs("cat_restaurantes
						INNER JOIN estados ON estados.id_estado =cat_restaurantes.estado
						INNER JOIN municipios ON municipios.id_municipio =cat_restaurantes.municipio
						INNER JOIN colonias ON colonias.id_colonia =cat_restaurantes.colonia
						 INNER JOIN rel_empr_rest ON id_rest=id_restaurante WHERE id_empr = $id",
        		"id",
        		"rel_empr_rest.id,cat_restaurantes.*,  estados.estado,
				 municipios.municipio,	
				 colonias.colonia,  cat_restaurantes.estado idestado,
				 cat_restaurantes.municipio idmunicipio,
				 cat_restaurantes.colonia idcolonia");
    }
    static function all() {
    	global $dbh;
    	
    	//fortuna 4
    	// ventura 5
    	return $dbh->rs("cat_restaurantes
						INNER JOIN estados ON estados.id_estado =cat_restaurantes.estado
						INNER JOIN municipios ON municipios.id_municipio =cat_restaurantes.municipio
						INNER JOIN colonias ON colonias.id_colonia =cat_restaurantes.colonia	
					",
    			"id_restaurante",
    			"cat_restaurantes.*,  estados.estado,
				 municipios.municipio,	
				 colonias.colonia,  cat_restaurantes.estado idestado,
				 cat_restaurantes.municipio idmunicipio,
				 cat_restaurantes.colonia idcolonia");
    }

    public function __construct($params) {
        $this->id = isset($params['id']) ? $params['id'] : null;
        $this->attributes = $params;
    }
    public function save() {
        global $dbh;      
        $dbh->insert($this->attributes,"cat_restaurantes");
    }
    public function to_hash() {
        return $this->attributes;
    }
}
