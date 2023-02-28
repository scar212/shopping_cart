<?php
include_once 'files/db.php';

class Cartshopping extends DB{

    public function deleteOrder($id_user, $id_products){
        $query = $this->connect()->prepare('DELETE FROM shopping_cart WHERE id_user = :id_user AND id_products = :id_products');
        $query->execute(['id_user' => $id_user, 'id_products' => $id_products]);
        if($query->rowCount()){
            return true;
        }else{  
            return false;
        }
    }
    public function updateOrder($id_user, $id_products,$cantd){
        $query = $this->connect()->prepare('UPDATE shopping_cart SET cantd = :cantd WHERE id_user = :id_user AND id_products = :id_products');
        $query->execute(['id_user' => $id_user, 'id_products' => $id_products, 'cantd' => $cantd]);
        if($query->rowCount()){
            return true;
        }else{  
            return false;
        }
    }
}

?>