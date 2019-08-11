<?php
    namespace app\Models;

    class EmployeesModel extends Models {
        public function selectEmployees($id){
            /*$result = $this->db->select('employees', ['[>]offices' => 'officeCode'],[
                'employeeNumber',
                'lastName',
                'firstName',
                'extension',
                'email',
                'offices.city',
                'reportsTo',
                'jobTitle'
            ]);*/
            $cons = $this->db->pdo->prepare('SELECT employeeNumber, lastName, firstName, extension, email, offices.city, reportsTo, jobTitle
            FROM employees
            LEFT JOIN offices ON employees.officeCode = offices.officeCode
            WHERE employeeNumber = :id');
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
                'description' => 'The employess were found',
                'employees' => $result
            );
        }
        public function insertEmployees($employee){
            /*$result = $this->db->insert('employees', [
                'employeeNumber' => $employee['employeeNumber'],
                'lastName' => $employee['lastName'],
                'firstName' => $employee['firstName'],
                'extension' => $employee['extension'],
                'email' => $employee['email'],
                'officeCode' => $employee['officeCode'],
                'reportsTo' => $employee['reportsTo'],
                'jobTitle' => $employee['jobTitle']
            ]);*/
            $result = $this->db->pdo->prepare('INSERT INTO employees 
            VALUES (:employeeNumber, :lastName, :firstName, :extension, :email, :officeCode, :reportsTo, :jobTitle);');
            $result->bindParam(':employeeNumber', $employee['employeeNumber'], \PDO::PARAM_STR);
            $result->bindParam(':lastName', $employee['lastName'], \PDO::PARAM_STR);
            $result->bindParam(':firstName', $employee['firstName'], \PDO::PARAM_STR);
            $result->bindParam(':extension', $employee['extension'], \PDO::PARAM_STR);
            $result->bindParam(':email', $employee['email'], \PDO::PARAM_STR);
            $result->bindParam(':officeCode', $employee['officeCode'], \PDO::PARAM_STR);
            $result->bindParam(':reportsTo', $employee['reportsTo'], \PDO::PARAM_INT);
            $result->bindParam(':jobTitle', $employee['jobTitle'], \PDO::PARAM_STR, 50);
            $result->execute();
            //var_dump($result->execute());die();
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
                'description' => 'The employee was inserted'
            );
        }
        public function updateEmployees($employee){
            /*$result = $this->db->update('employees', [
                'lastName' => $employee['lastName'],
                'firstName' => $employee['firstName'],
                'extension' => $employee['extension'],
                'email' => $employee['email'],
                'officeCode' => $employee['officeCode'],
                'reportsTo' => $employee['reportsTo'],
                'jobTitle' => $employee['jobTitle']
            ], [
                'employeeNumber[=]' => $employee['employeeNumber'],
            ]);*/
            $result = $this->db->pdo->prepare('UPDATE employees SET 
            lastName = :lastName, 
            firstName = :firstName,
            extension = :extension,
            email = :email,
            officeCode = :officeCode,
            reportsTo = :reportsTo,
            jobTitle = :jobTitle
            WHERE employeeNumber = :employeeNumber');
            
            $result->bindParam(':employeeNumber', $employee['employeeNumber'], \PDO::PARAM_INT);
            $result->bindParam(':lastName', $employee['lastName'], \PDO::PARAM_STR);
            $result->bindParam(':firstName', $employee['firstName'], \PDO::PARAM_STR);
            $result->bindParam(':extension', $employee['extension'], \PDO::PARAM_STR);
            $result->bindParam(':email', $employee['email'], \PDO::PARAM_STR);
            $result->bindParam(':officeCode', $employee['officeCode'], \PDO::PARAM_STR);
            $result->bindParam(':reportsTo', $employee['reportsTo'], \PDO::PARAM_INT);
            $result->bindParam(':jobTitle', $employee['jobTitle'], \PDO::PARAM_STR);
            $result->execute();
            
            if(!is_null($this->db->error()[1])){
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }
            return array(
                'success' => true,
                'description' => 'The employee was updated'
            );
        }
        public function login($login){
            $email = $login['email'];
            $pass = md5($login['password']);
            $consE = $this->db->pdo->prepare('SELECT * FROM employees WHERE email = :email');
            $consE->bindParam(':email', $email, \PDO::PARAM_STR);
            $consE->execute();
            $result = $consE->fetchAll(\PDO::FETCH_ASSOC);
            if(empty($result)){
                return array(
                    'error' => true,
                    'description' => 'Email incorrect'
                );
            }
            $consP = $this->db->pdo->prepare('SELECT * FROM employees WHERE password = :password AND email = :email');
            $consP->bindParam(':password', $pass, \PDO::PARAM_STR);
            $consP->bindParam(':email', $email, \PDO::PARAM_STR);
            $consP->execute();
            $result = $consP->fetchAll(\PDO::FETCH_ASSOC);
            if(empty($result)){
                return array(
                    'error' => true,
                    'description' => 'Password incorrect'
                );
            }
            $token = $this->JWTService->encode($email);
            return array(
                'success' => true,
                'description' => 'Accès autorisé. Bonjour esclave',
                'token' => $token
            );
            /*if($consE){
                $consP = $this->db->pdo->prepare('SELECT * FROM employees WHERE password = :password');
                $consP->bindParam(':password', $pass, \PDO::PARAM_STR);
                $consP->execute();
                if($consP){
                    $token = $this->JWTService->encode($email);
                    return array(
                        'success' => true,
                        'description' => 'Access granted',
                        'token' => $token
                    );
                }else {
                    return array(
                        'error' => true,
                        'description' => 'Wrong password'
                    );
                }
            }else{
                return array(
                    'error' => true,
                    'description' => 'Wrong email'
                );
            }*/
        }
    }
?>