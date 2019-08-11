<?php
    namespace app\Models;

    class ProductsModel extends Models{
        public function selectProducts(){
            $result = $this->db->select('products', [
                'productCode',
                'productName',
                'productLine',
                'productScale',
                'productVendor',
                'productDescription',
                'quantityInStock',
                'buyPrice',
                'MSRP'
            ]);
            if (!is_null($this->db->error()[1])){
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
                'description' => 'The Products werefound',
                'products' => $result
            );
        }
        public function insertProducts($product){
            $result = $this->db->insert('products', [
                'productCode' => $product['productCode'],
                'productName' => $product['productName'],
                'productLine' => $product['productLine'],
                'productScale' => $product['productScale'],
                'productVendor' => $product['productVendor'],
                'productDescription' => $product['productDescription'],
                'quantityInStock' => $product['quantityInStock'],
                'buyPrice' => $product['buyPrice'],
                'MSRP' => $product['MSRP']
            ]);

            if (!is_null($this->db->error()[1])) {
                return array(
                    'success' => false,
                    'description' => $this->db->error()[2]
                );
            }
            return array(
                'success' => true,
                'description' => 'The Product was inserted'
            );
        }
    }
?>