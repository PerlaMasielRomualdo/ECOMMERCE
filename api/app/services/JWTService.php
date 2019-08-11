<?php
    namespace app\services;
    class JWTService extends Services {
        function encode($chain){
            $msg = $this->jwt->encode($chain, $this->settings['jwt']['key']);
            return $msg;
        }
    }
?>