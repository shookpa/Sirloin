<?php
/**
 * @class boletin
 */
class Boletin extends Model {
	public $id, $attributes;
	static function create($params) {
		$obj = new self ( get_object_vars ( $params ) );
		$obj->save ();
		return $obj;
	}
	static function find($id) {
		global $dbh;
		$found = null;
		foreach ( $dbh->rs ( "boletines", "id" ) as $rec ) {
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
		$rs = $dbh->rs ( "boletines", "id" );
		
		foreach ( $rs as $idx => $row ) {
			if ($row ['id'] == $id) {
				$rec->attributes = array_merge ( $rec->attributes, get_object_vars ( $params ) );
				$rec->attributes ["boletines"] = $id;
				// var_dump($rec->attributes);
				$dbh->update ( "boletines", $rec->attributes, "id" );
				break;
			}
		}
		return $rec;
	}
	static function destroy($id) {
		global $dbh;
		$rec = null;
		$rs = $dbh->rs ( "boletines", "id" );
		foreach ( $rs as $idx => $row ) {
			if ($row ['id'] == $id) {
				$rec = new self ( $dbh->destroy ( "boletines", "id", $id ) );
				break;
			}
		}
		return $rec;
	}
	static function all() {
		global $dbh;
		/**
		 * SELECT  
		 * FROM 
		 */
		
		return $dbh->rs ( "boletines", 
				"id", 
				"*" );
	}
	
	public function __construct($params) {
		$this->id = isset ( $params ['id'] ) ? $params ['id'] : null;
		$this->attributes = $params;
	}
	public function save() {
		global $dbh;
		$dbh->insert ( $this->attributes, "boletines" );
	}
	public function to_hash() {
		return $this->attributes;
	}
}

