<?php
/**
 * @class Permiso
 */
class Permiso extends Model {
public $id, $attributes;
    static function create($params) {
        $obj = new self(get_object_vars($params));
        $obj->save();
        return $obj;
    }
    static function find($id) {
        global $dbh;
        $found = null;
        foreach ($dbh->rs("rel_perm_rol","id") as $rec) {
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
        $rs = $dbh->rs("rel_perm_rol","id");

        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec->attributes = array_merge($rec->attributes, get_object_vars($params));
                $rec->attributes["id"] = $id;
//                	var_dump($rec->attributes);
                $dbh->update("rel_perm_rol", $rec->attributes,"id");
                break;
            }
        }
        return $rec;
    }
    static function destroy($id) {
        global $dbh;
        $rec = null;
        $rs = $dbh->rs("cat_permisos","id_permiso");
        foreach ($rs as $idx => $row) {
            if ($row['id'] == $id) {
                $rec = new self($dbh->destroy("cat_permisos","id_permiso",$id));
                break;
            }
        }
        return $rec;
    }
    static function all($id_rol) {
        global $dbh;

//fortuna 4
// ventura 5
        return $dbh->rs("cat_permisos INNER JOIN rel_perm_rol ON rel_perm_rol.id_permiso=cat_permisos.id_permiso WHERE id_rol=$id_rol   ",
        		"id",
        		"*");
    }

    public function __construct($params) {
        $this->id = isset($params['id']) ? $params['id'] : null;
        $this->attributes = $params;
    }
    public function save() {
        global $dbh;      
        $dbh->insert($this->attributes,"cat_permisos");
    }
    public function to_hash() {
        return $this->attributes;
    }
}
