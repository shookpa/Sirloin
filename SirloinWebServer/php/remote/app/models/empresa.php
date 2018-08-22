<?php
/**
 * @class Empresa
 */
class Empresa extends Model {
public $id, $attributes;
    static function create($params) {
        $obj = new self(get_object_vars($params));
        $obj->save();
        return $obj;
    }
    static function find($id) {
        global $dbh;
        $found = null;
        foreach ($dbh->rs("cat_empresas","id_empresa") as $rec) {
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
        $rs = $dbh->rs("cat_empresas","id_empresa");

        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec->attributes = array_merge($rec->attributes, get_object_vars($params));
                $rec->attributes["id_empresa"] = $id;
//                var_dump($rec->attributes);
                $dbh->update("cat_empresas", $rec->attributes,"id_empresa");
                break;
            }
        }
        return $rec;
    }
    static function destroy($id) {
        global $dbh;
        $rec = null;
        $rs = $dbh->rs("cat_empresas","id_empresa");
        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec = new self($dbh->destroy("cat_empresas","id_empresa",$id));
                break;
            }
        }
        return $rec;
    }
    static function all() {
        global $dbh;

//fortuna 4
// ventura 5
        return $dbh->rs("cat_empresas
						INNER JOIN estados ON estados.id_estado =cat_empresas.estado
						INNER JOIN municipios ON municipios.id_municipio =cat_empresas.municipio
						INNER JOIN colonias ON colonias.id_colonia =cat_empresas.colonia	",
        		"id_empresa",
        		"cat_empresas.*,  estados.estado,
				 municipios.municipio,	
				 colonias.colonia,  cat_empresas.estado idestado,
				 cat_empresas.municipio idmunicipio,
				 cat_empresas.colonia idcolonia");
    }

    public function __construct($params) {
        $this->id = isset($params['id']) ? $params['id'] : null;
        $this->attributes = $params;
    }
    public function save() {
        global $dbh;      
        $dbh->insert($this->attributes,"cat_empresas");
    }
    public function to_hash() {
        return $this->attributes;
    }
}
