<?php

    $container['db'] = function($container){
        //var_dump(Medoo\Medoo($container['settings']['db']));die();
        return new Medoo\Medoo($container['settings']['db']);
    };

    $container['jwt'] = function($container){
        return new \Firebase\JWT\JWT;
    }
?>