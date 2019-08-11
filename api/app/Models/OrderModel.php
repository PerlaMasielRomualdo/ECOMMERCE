<?php
    namespace app\Models;

    class OrderModel extends Models{
        public function insertOrder($order){
            $orderNumber = time();
            $lines = $order['cart']['lines'];
            
            $this->db->pdo->beginTransaction();
            $this->db->insert('orders', [
                'orderNumber' => $orderNumber,
                'orderDate' => date('Y-m-d', time()),
                'requiredDate' => date('Y-m-d', time()),
                'status' => 'In Process',
                'customerNumber' => '496',
            ]);
            foreach($lines as $key => $li){
                $this->db->insert('orderdetails', [
                    'orderNumber' => $orderNumber,
                    'productCode' => $li['product']['productCode'],
                    'quantityOrdered' => $li['quantity'],
                    'priceEach' => $li['product']['MSRP'],
                    'orderLineNumber' => $key + 1
                ]);
            }
            if(!is_null($this->db->error()[1])){
                $this->db->pdo->rollBack();
                return array(
                    'error' => true,
                    'description' => $this->db->error()[2]
                );
            }
            $this->db->pdo->commit();
            return array(
                'success' => true,
                'description' => 'order registered'
            );
        }
    }
?>