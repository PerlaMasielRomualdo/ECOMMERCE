<?php
    header ('Access-Control-Allow-Credentials: true');
    header ('Access-Control-Allow-Origin: *');
    header ('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header ('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Method, Authorization');
    
    session_start();

    //directorio de la aplicacion 
    $contexto_app = __DIR__; //Cambia a la direccion de un servidor real
    //var_dump($contexto_app); die();

    //Establecer el entorno de la aplicacion
    $env = 'development'; //Production or development

    //agregar la configuración de la App
    require $contexto_app . '/app/app.php';
?>
