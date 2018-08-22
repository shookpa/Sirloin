<?php
    session_start();

    // base framework
    require('session_db.php');
    require(dirname(__FILE__).'/lib/application_controller.php');
    require(dirname(__FILE__).'/lib/model.php');
    require(dirname(__FILE__).'/lib/request.php');
    require(dirname(__FILE__).'/lib/response.php');

    // require /models (Should iterate app/models and auto-include all files there)
    require(dirname(__FILE__).'/app/models/statussincronizacion.php');
    require(dirname(__FILE__).'/app/models/movimiento.php');
    require(dirname(__FILE__).'/app/models/usuario.php');
    require(dirname(__FILE__).'/app/models/rol.php');
    require(dirname(__FILE__).'/app/models/promocion.php');
    require(dirname(__FILE__).'/app/models/boletin.php');
    require(dirname(__FILE__).'/app/models/restaurant.php');
    require(dirname(__FILE__).'/app/models/empresa.php');
    require(dirname(__FILE__).'/app/models/permiso.php');
    
    

    // Fake a database connection using _SESSION
    $dbh = new SessionDB();


