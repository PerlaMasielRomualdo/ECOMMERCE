<?php
    namespace app\Models;

    class CustomersModel extends Models{
        public function selectCustomers($id){
            /*$result = $this->db->select('customers', [
                'customerNumber',
                'customerName',
                'contactLastName',
                'contactFirstName',
                'phone',
                'addressLine1',
                'addressLine2',
                'city',
                'state',
                'postalCode',
                'country',
                'salesRepEmployeeNumber',
                'creditLimit',
            ]);*/
            $cons = $this->db->pdo->prepare('SELECT * FROM customers WHERE customerNumber = :id');
            $cons->bindParam(':id', $id, \PDO::PARAM_INT);
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
                'description' => 'The customers were found',
                'employees' => $result
            );
        }
        public function insertCustomers($customer){
            /*$result = $this->db->insert('customers', [
                'customerNumber' => $customer['customerNumber'],
                'customerName' => $customer['customerName'],
                'contactLastName' => $customer['contactLastName'],
                'contactFirstName' => $customer['contactFirstName'],
                'phone' => $customer['phone'],
                'addressLine1' => $customer['addressLine1'],
                'addressLine2' => $customer['addressLine2'],
                'city' => $customer['city'],
                'state' => $customer['state'],
                'postalCode' => $customer['postalCode'],
                'country' => $customer['country'],
                'salesRepEmployeeNumber' => $customer['salesRepEmployeeNumber'],
                'creditLimit' => $customer['creditLimit']
            ]);*/
            $result = $this->db->pdo->prepare('INSERT INTO customers 
            VALUES (:customerNumber, :customerName, :contactLastName, :contactFirstName, :phone, :addressLine1, :addressLine2, 
            :city, :state, :postalCode, :country, :salesRepEmployeeNumber, :creditLimit);');
            $result->bindParam(':customerNumber', $customer['customerNumber'], \PDO::PARAM_INT);
            $result->bindParam(':customerName', $customer['customerName'], \PDO::PARAM_STR);
            $result->bindParam(':contactLastName', $customer['contactLastName'], \PDO::PARAM_STR);
            $result->bindParam(':contactFirstName', $customer['contactFirstName'], \PDO::PARAM_STR);
            $result->bindParam(':phone', $customer['phone'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine1', $customer['addressLine1'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine2', $customer['addressLine2'], \PDO::PARAM_STR);
            $result->bindParam(':city', $customer['city'], \PDO::PARAM_STR);
            $result->bindParam(':state', $customer['state'], \PDO::PARAM_STR);
            $result->bindParam(':postalCode', $customer['postalCode'], \PDO::PARAM_STR);
            $result->bindParam(':country', $customer['country'], \PDO::PARAM_STR);
            $result->bindParam(':salesRepEmployeeNumber', $customer['salesRepEmployeeNumber'], \PDO::PARAM_INT);
            $result->bindParam(':creditLimit', $customer['creditLimit'], \PDO::PARAM_STR);
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
                'description' => 'The customer was inserted'
            );
        }
        public function updateCustomers($customer){
            /*$result = $this->db->update('customers', [
                'customerName' => $customer['customerName'],
                'contactLastName' => $customer['contactLastName'],
                'contactFirstName' => $customer['contactFirstName'],
                'phone' => $customer['phone'],
                'addressLine1' => $customer['addressLine1'],
                'addressLine2' => $customer['addressLine2'],
                'city' => $customer['city'],
                'state' => $customer['state'],
                'postalCode' => $customer['postalCode'],
                'country' => $customer['country'],
                'salesRepEmployeeNumber' => $customer['salesRepEmployeeNumber'],
                'creditLimit' => $customer['creditLimit']
            ],[
                'customerNumber[=]' => $customer['customerNumber'],
            ]);*/
            $result = $this->db->pdo->prepare('UPDATE customers SET
            customerName = :customerName,
            contactLastName = :contactLastName,
            contactFirstName = :contactFirstName,
            phone = :phone,
            addressLine1 = :addressLine1,
            addressLine2 = :addressLine2,
            city = :city,
            state = :state,
            postalCode = :postalCode,
            country = :country,
            salesRepEmployeeNumber = :salesRepEmployeeNumber,
            creditLimit = :creditLimit
            WHERE customerNumber = :customerNumber');
            $result->bindParam(':customerNumber', $customer['customerNumber'], \PDO::PARAM_INT);
            $result->bindParam(':customerName', $customer['customerName'], \PDO::PARAM_STR);
            $result->bindParam(':contactLastName', $customer['contactLastName'], \PDO::PARAM_STR);
            $result->bindParam(':contactFirstName', $customer['contactFirstName'], \PDO::PARAM_STR);
            $result->bindParam(':phone', $customer['phone'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine1', $customer['addressLine1'], \PDO::PARAM_STR);
            $result->bindParam(':addressLine2', $customer['addressLine2'], \PDO::PARAM_STR);
            $result->bindParam(':city', $customer['city'], \PDO::PARAM_STR);
            $result->bindParam(':state', $customer['state'], \PDO::PARAM_STR);
            $result->bindParam(':postalCode', $customer['postalCode'], \PDO::PARAM_STR);
            $result->bindParam(':country', $customer['country'], \PDO::PARAM_STR);
            $result->bindParam(':salesRepEmployeeNumber', $customer['salesRepEmployeeNumber'], \PDO::PARAM_INT);
            $result->bindParam(':creditLimit', $customer['creditLimit'], \PDO::PARAM_STR);
            $result->execute();
            if(!is_null($this->db->error()[1])){
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }
            return array(
                'success' => true,
                'description' => 'The customer was updated'
            );
        }
    }
?>