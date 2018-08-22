<?php
/**
 * @class ApplicationController
 */
class ApplicationController {
	public $request, $id, $params,$parametros;

    /**
     * dispatch
     * Dispatch request to appropriate controller-action by convention according to the HTTP method.
     */
    public function dispatch($request) {
        $this->request = $request;
        $this->id = $request->id;
        $this->params = $request->params;
        $this->parametros = $request->parametros;
//         var_dump($request);
        if ($request->isRestful()) {
            return $this->dispatchRestful();
        }
        if ($request->action) {
//         	echo $request->action;
            return $this->{$request->action}();
        }

        // normal dispatch here.  discover action
    }

    protected function dispatchRestful() {
        switch ($this->request->method) {
            case 'GET':
                return $this->view();
                break;
            case 'POST':
                return $this->create();
                break;
            case 'PUT':
                return $this->update();
                break;
            case 'DELETE':
                return $this->destroy();
                break;
        }
    }
}

