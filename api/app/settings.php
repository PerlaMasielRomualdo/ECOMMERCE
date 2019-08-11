<?php 
    //configuración de la base de datos
    $db = require $contexto_app . '/app/database/config.php';
    
    //key de encriptación
    $jwt = array('key' => 'gDR]r65&Db+tF(-:', 'algorithms'=> array('HS256'));
    //configuración de la app
    
    $settings = array(
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'db' => $db,
        'jwt' => $jwt
    );
    
    //Se agrega el contexto de la app
    $settings['contexto'] = $contexto_app;
    
    return $settings;
?>