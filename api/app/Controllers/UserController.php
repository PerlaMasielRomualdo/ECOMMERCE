<?php 
    namespace app\controllers;
    class UserController extends Controllers {
        function helloUser($request, $response){
            return json_encode(array('greetings' => 'Hello from the darkness...'));
        }
        function helloUserName($request, $response){
            $name = $request -> getAttribute('name');
            $msg['name'] = $name;
            $msg['encodedName'] = $this->jwt->encode($name, $this->settings['jwt']['key']);
            $msg['decodedName'] = $this->jwt->decode($msg['encodedName'], $this->settings['jwt']['key'], $this->settings['jwt']['algorithms']);
            return json_encode(array('result' => $msg));
        }
    }
?>