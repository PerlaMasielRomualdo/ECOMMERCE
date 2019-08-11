<?php 
    namespace app\controllers;
    class OfficesController extends Controllers {
        public function selectOffices($request, $response){
            $id = $request->getAttribute('id');
            $message = $this->OfficesModel->selectOffices($id);
            return json_encode($message);
        }
        public function insertOffices($request, $response){
            $office = $request->getParsedBody();
            $message = $this->OfficesModel->insertOffices($office);
            return json_encode($message);
        }
        public function updateOffices($request, $response){
            $office = $request->getParsedBody();
            $message = $this->OfficesModel->updateOffices($office);
            return json_encode($message);
        }
    }
?>