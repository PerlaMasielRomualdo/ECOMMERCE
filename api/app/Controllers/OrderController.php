<?php
    namespace app\controllers;
    class OrderController extends Controllers{
        public function insertOrder($request, $response){
            $order = $request->getParsedBody(); 
            //var_dump($order['cart']['lines'][0]['product']['productCode']); die();
            $message = $this->OrderModel->insertOrder($order);
            return \json_encode($message);
        }
    }
?>