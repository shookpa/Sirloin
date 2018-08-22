<?php
/**
 * @class Promocion
 */
class Promocion extends Model {
	public $id, $attributes;
	static function create($params) {
		$obj = new self ( get_object_vars ( $params ) );
		$obj->save ();
		return $obj;
	}
	static function find($id) {
		global $dbh;
		$found = null;
		foreach ( $dbh->rs ( "promociones", "id_promocion" ) as $rec ) {
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
		$rs = $dbh->rs ( "promociones", "id_promocion" );
		
		foreach ( $rs as $idx => $row ) {
			if ($row ['id'] == $id) {
				$rec->attributes = array_merge ( $rec->attributes, get_object_vars ( $params ) );
				$rec->attributes ["promociones"] = $id;
				// var_dump($rec->attributes);
				$dbh->update ( "promociones", $rec->attributes, "id_promocion" );
				break;
			}
		}
		return $rec;
	}
	static function destroy($id) {
		global $dbh;
		$rec = null;
		//OBTENEMOS LOS DATOS QUE EXISTAN DE ESE ID, EN PARTICULAR REQUERIMOS EL NOMBRE DE LA FOTO PARA ELIMINAR EL ARCHIVO
		$rsBeforeDelete = $dbh->rs("promociones WHERE id_promocion = $id ","id_promocion");
		
// 		$rs = $dbh->rs ( "promociones", "id_promocion" );
// 		foreach ( $rs as $idx => $row ) {
// 			if ($row ['id'] == $id) {
				
// 		return "<br>VEAMOS:   ../../../../images/promociones/".$found['foto']."<br>";
		//EN EL CASO DE QUE SEA EXITOSO LA ELLIMINACION DEL ARCHIVO, QUE PROCEDA A ELIMINAR EL REGISTRO
		if (unlink($_SERVER["DOCUMENT_ROOT"]."/images/promociones/".$rsBeforeDelete[0]["foto"]))
			$rec = new self ( $dbh->destroy ( "promociones", "id_promocion", $id ) );
			
			
		
		return $rec;
	}
	static function all() {
		global $dbh;
		/**
		 * SELECT  
		 * FROM 
		 */
		
		return $dbh->rs ( "promociones", 
				"id_promocion", 
				"*" );
	}
	
	public function __construct($params) {
		$this->id = isset ( $params ['id'] ) ? $params ['id'] : null;
		$this->attributes = $params;
	}
	public function save() {
		global $dbh;
		$dbh->insert ( $this->attributes, "promociones" );
	}
	public function to_hash() {
		return $this->attributes;
	}
}

