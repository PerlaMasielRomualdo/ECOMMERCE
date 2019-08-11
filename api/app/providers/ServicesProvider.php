<?php
    $container['JWTService'] = function($container){
        return new app\services\JWTService($container);
    };
?>