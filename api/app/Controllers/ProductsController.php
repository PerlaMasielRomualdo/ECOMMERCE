<?php
    namespace app\controllers;
    
    class ProductsController extends Controllers{
        public function selectProducts($request, $response){
            $message = $this->ProductsModel->selectProducts();
            //var_dump(json_encode($message));die();
            return json_encode($message);
        }
        public function insertProducts($request, $response){
            $product = $request->getParsedBody();
            $message = $this->ProductsModel->insertProducts($product);
            return json_encode($message);
        }
        public function updateProducts($request, $response){
            $product = $request->getParsedBody();
            $message = $this->ProductsModel->updateProducts($product);
            return json_encode($message);
        }
    }
?>