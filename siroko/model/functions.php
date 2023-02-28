<?php
include_once 'files/db.php';

class FunctionsO extends DB{

    public function productExist($id_user,$id_products){
        $query = $this->connect()->prepare('SELECT * FROM shopping_cart WHERE id_user = :id_user AND id_products = :id_products');
        $query->execute(['id_user' => $id_user, 'id_products => $id_products']);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }
    public function addCart($id_user,$id_products,$cantd){
        $query = $this->connect()->prepare('INSERT INTO shopping_cart (id_user,id_products,cantd) VALUES (:id_user,:id_products,:cantd)');
        $query->execute(['id_user' => $id_user, 'id_products' => $id_products, 'cantd' => $cantd]);

        if($query->rowCount()){
            return true;
        }else{  
            return false;
        }
    }
    public function deleteCart($id_user, $id_products){
        $query = $this->connect()->prepare('DELETE FROM shopping_cart WHERE id_user = :id_user AND id_products = :id_products');
        $query->execute(['id_user' => $id_user, 'id_products' => $id_products]);

        if($query->rowCount()){
            return true;
        }else{  
            return false;
        }
    }
}

?>