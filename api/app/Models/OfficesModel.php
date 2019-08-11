<?php
    namespace app\Models;
    
    class OfficesModel extends Models{
        public function selectOffices($id){
            /*$result = $this->db->select('offices', [
                'officeCode',
                'city',
                'phone',
                'addressLine1',
                'addressLine2',
                'state',
                'country',
                'postalCode',
                'territory'
            ]);*/
            $cons = $this->db->pdo->prepare('SELECT * FROM offices WHERE officeCode = :id');
            $cons->bindParam(':id', $id, \PDO::PARAM_STR);
            $cons->execute();
            $result = $cons->fetchAll(\PDO::FETCH_ASSOC);
            if(!is_null($this->db->error()[1])){
                return array(
                    'error' => true,
                    'description' => $this->db->error()[2]
                );
            } else if (empty($result)){
                return array(
                    'notFound' => true,
                    'description' => 'The result is empty'
                );
            }
            return array(
                'success' => true,
                'description' => 'The offices were found',
                'employees' => $result
            );
        }
        public function insertOffices($office){
            /*$result = $this->db->insert('offices', [
                'officeCode' => $office['officeCode'],
                'city' => $office['city'],
                'phone' => $office['phone'],
                'addressLine1' => $office['addressLine1'],
                'addressLine2' => $office['addressLine2'],
                'state' => $office['state'],
                'country' => $office['country'],
                'postalCode' => $office['postalCode'],
                'territory' => $office['territory']
            ]);*/
            $result = $this->db->pdo->prepare('INSERT INTO offices 
            VALUES (:officeCode, :city, :phone, :addressLine1, :addressLine2, :state, :country, :postalCode, :territory);');
            $result->bindParam(':officeCode', $office['officeCode'], \PDO::PARAM_STR);
            $result->bindParam(':city', $office['city'], \PDO::PARAM_STR);
            $result->bindParam(':phone', $office['phone'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine1', $office['addressLine1'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine2', $office['addressLine2'], \PDO::PARAM_STR);
            $result->bindParam(':state', $office['state'], \PDO::PARAM_STR);
            $result->bindParam(':country', $office['country'], \PDO::PARAM_STR);
            $result->bindParam(':postalCode', $office['postalCode'], \PDO::PARAM_STR);
            $result->bindParam(':territory', $office['territory'], \PDO::PARAM_STR);
            $result->execute();
            if(!is_null($this->db->error()[1])){
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }else if(!is_null($result)){
                return array(
                    'success' => false,
                    'description' => $result->errorInfo()
                );
            }
            return array(
                'success' => true,
                'description' => 'The office was inserted'
            );
        }
        public function updateOffices($office){
            /*$result = $this->db->update('offices', [
                'city' => $office['city'],
                'phone' => $office['phone'],
                'addressLine1' => $office['addressLine1'],
                'addressLine2' => $office['addressLine2'],
                'state' => $office['state'],
                'country' => $office['country'],
                'postalCode' => $office['postalCode'],
                'territory' => $office['territory']
            ], [
                'officeCode[=]' => $office['officeCode']
            ]);*/
            $result = $this->db->pdo->prepare('UPDATE offices SET
            city = :city,
            phone = :phone,
            addressLine1 = :addressLine1,
            addressLine2 = :addressLine2,
            state = :state,
            country = :country,
            postalCode = :postalCode,
            territory = :territory
            WHERE officeCode = :officeCode');
            $result->bindParam(':officeCode', $office['officeCode'], \PDO::PARAM_STR);
            $result->bindParam(':city', $office['city'], \PDO::PARAM_STR);
            $result->bindParam(':phone', $office['phone'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine1', $office['addressLine1'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine2', $office['addressLine2'], \PDO::PARAM_STR);
            $result->bindParam(':state', $office['state'], \PDO::PARAM_STR);
            $result->bindParam(':country', $office['country'], \PDO::PARAM_STR);
            $result->bindParam(':postalCode', $office['postalCode'], \PDO::PARAM_STR);
            $result->bindParam(':territory', $office['territory'], \PDO::PARAM_STR);
            $result->execute();
            if(!is_null($this->db->error()[1])){
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }
            return array(
                'success' => true,
                'description' => 'The office was updated'
            );
        }
    }
?>