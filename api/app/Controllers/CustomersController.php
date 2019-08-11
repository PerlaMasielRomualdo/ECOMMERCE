<?php 
    namespace app\controllers;
    
    class CustomersController  extends Controllers {
        public function selectCustomers($request, $response){
            $id = $request->getAttribute('id');
            
            $message = $this->CustomersModel->selectCustomers($id);
            return json_encode($message);
        }
        
        public function insertCustomers($request, $response){
            $customer = $request->getParsedBody();
            
            $message = $this->CustomersModel->insertCustomers($customer);
            return json_encode($message);
        }
        
        public function updateCustomers($request, $response){
            $customer = $request->getParsedBody();
            
            $message = $this->CustomersModel->updateCustomers($customer);
            return json_encode($message);
        }
    }
?>