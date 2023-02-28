<?php
include_once '../model/files/connection.php';
            $data = "SELECT * FROM products WHERE stock > 0 ";
            $resultD = mysqli_query($conn,$data); 
?>