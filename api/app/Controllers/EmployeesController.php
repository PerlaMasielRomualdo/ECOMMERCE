<?php
    namespace app\controllers;
    
    class EmployeesController extends Controllers {
        
        function selectEmployees($request, $response){
            $id = $request->getAttribute('id');
            
            $message = $this->EmployeesModel->selectEmployees($id);
            return json_encode($message);
        }
        
        function insertEmployees($request, $response){
            $employee = $request->getParsedBody();
            
            $message = $this->EmployeesModel->insertEmployees($employee);
            return json_encode($message);
        }
        
        function updateEmployees($request, $response){
            $employee = $request->getParsedBody();
            
            $message = $this->EmployeesModel->updateEmployees($employee);
            return \json_encode($message);
        }
        
        function login($request, $response){
            $login = $request->getParsedBody();
            
            $message = $this->EmployeesModel->login($login);
            return \json_encode($message);
        }
    }
?>