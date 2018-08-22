<?php
/**
 * @class Restaurantes
 * A simple application controller extension
 */
class Restaurantes extends ApplicationController {
    /**
     * view
     * Retrieves rows from database.
     */
    public function view() {
        $res = new Response();
        $res->success = true;
        $res->message = "Loaded data";
//         $res->data = Residente::all($this->id);
        if ($this->id != null && $this->id > 0)
//         	echo 
        	$res->data = Restaurant::filterByEmpresa($this->id );
        else
        	$res->data = Restaurant::all();
        return $res->to_json();
    }
    /**
     * create
     */
    public function create() {
        $res = new Response();

        // data=<JSON encoded data>
        if ($this->params->data) {
        	if ($rec =  Restaurant::create(json_decode($this->params->data, true))) {
                $res->success = true;
                $res->data = $rec->to_hash();
                $res->message = "Registro Creado!";
            } else {
                $res->success = false;
                $res->message = "Fallo al crear el registro";
            }
        }
        // Ugh, php...check if !hash
        else if (is_array($this->params) && !empty($this->params) && preg_match('/^\d+$/', implode('', array_keys($this->params)))) {
            foreach ($this->params as $data) {
            	array_push($res->data, Restaurant::create($data)->to_hash());
            }
            $res->success = true;
            $res->message = "Se crearon " . count($res->data) . ' registros';
        }
        else {
        	if ($rec =  Restaurant::create($this->params)) {
                $res->success = true;
                $res->data = $rec->to_hash();
                $res->message = "Registro Creado";
            } else {
                $res->success = false;
                $res->message = "Fallo al generar el registro";
            }
        }
        return $res->to_json();
    }

    /**
     * update
     */
    public function update() {
        $res = new Response();

        // data=<JSON encoded data>
        if ($this->params->data) {
            $data = json_decode($this->params->data, true);
            $res->data = array();
            foreach ($data as $rec_data) {
            	if ($rec = Restaurant::update($rec_data->id, $rec_data)) {
                    array_push($res->data, $rec->to_hash());
                }
            }
            $res->success = true;
            $res->message = "Updated " . count($res->data) . " records!";
        }
        else if (is_array($this->params)) {
            $res->data = array();
            foreach ($this->params as $data) {
            	if ($rec = Restaurant::update($data->id, $data)) {
                    array_push($res->data, $rec->to_hash());
                }
            }
            $res->success = true;
            $res->message = "Updated " . count($res->data) . " records";
        }
        else {
        	if ($rec = Restaurant::update($this->params->id, $this->params)) {
                $res->data = $rec->to_hash();
                    $res->success = true;
                    $res->message = "Restaurant actualizado";
//                }
            } else {
            	var_dump($this->params);
                $res->message = "Fallo al actualizar el Restaurant " . $this->params->id;
                $res->success = false;
            }

        }
        return $res->to_json();
    }

    /**
     * destroy
     */
    public function destroy() {
        $res = new Response();

        // data=<JSON encoded data>
        if ($this->params->data) {
            $data = json_decode($this->params->data, true);
            $destroyed = array();
            foreach ($data as $rec_data) {
            	if ($rec = Restaurant::destroy($rec_data->id)) {
                    array_push($destroyed, $rec->to_hash());
                }
            }
            $res->success = true;
            $res->message = "Eliminados " . count($destroyed) . " registros!";
        }
        else if (is_array($this->params)) {
            $destroyed = array();
            foreach ($this->params as $rec) {
            	if ($rec = Restaurant::destroy($rec->id)) {
                    array_push($destroyed, $rec);
                }
            }
            $res->success = true;
            $res->message = 'Eliminados ' . count($destroyed) . ' registros';
        }
        else {
        	if ($rec = Restaurant::destroy($this->params->id)) {
                $res->message = "Restaurant eliminado";
                $res->success = true;
            } else {
            	var_dump($this->params);
                $res->message = "Fallo al eliminar el restaurant". $this->params->id;
            }
        }
        return $res->to_json();
    }
    public function delete() {
    	$res = new Response();
    	
    	// data=<JSON encoded data>
    	if ($this->params->data) {
    		$data = json_decode($this->params->data, true);
    		$destroyed = array();
    		foreach ($data as $rec_data) {
    			if ($rec = Restaurant::delete($rec_data->id)) {
    				array_push($destroyed, $rec->to_hash());
    			}
    		}
    		$res->success = true;
    		$res->message = "Eliminados " . count($destroyed) . " registros!";
    	}
    	else if (is_array($this->params)) {
    		$destroyed = array();
    		foreach ($this->params as $rec) {
    			if ($rec = Restaurant::delete($rec->id)) {
    				array_push($destroyed, $rec);
    			}
    		}
    		$res->success = true;
    		$res->message = 'Eliminados ' . count($destroyed) . ' registros';
    	}
    	else {
    		if ($rec = Restaurant::delete($this->params->id)) {
    			$res->message = "Restaurant eliminado";
    			$res->success = true;
    		} else {
    			var_dump($this->params);
    			$res->message = "Fallo al eliminar el restaurant". $this->params->id;
    		}
    	}
    	return $res->to_json();
    }
}

