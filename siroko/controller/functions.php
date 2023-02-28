<?php
include_once '../model/files/connection.php';
include_once '../model/income.php';
include_once '../model/files/userSession.php';
include_once '../model/functions.php';
        $userSession = new UserSession();
        $functions = new FunctionsO();
        $user = new User();
        $id_products = $_POST['id_product'];
        $cantd = 1;
        if(isset($_SESSION['user'])){
            //_errors', 1);
             /*echo "hay sesion";*/
            $user->setUser($userSession->getCurrentUser());
            $id_user = $user->getId();
            $name = $user->getName();
                if(isset($_POST['add_to_Cart'])){
                   if($functions->addCart($id_user,$id_products,$cantd)){
                        echo 'Se agrego al carrito';
                   }else{
                        echo 'No se pudo agregar al carrito';
                   }
                    include_once '../view/index.php';
                }else if(isset($_POST['delete_to_cart'])){
                    if($functions->deleteCart($id_user,$id_products)){
                        echo 'Se elimino del carrito';
                    }else{
                        echo 'No se pudo eliminar del carrito';
                    }
                    include_once '../view/index.php';
                }
        }else{
            echo "<script language='JavaScript'>";
            echo "alert('¡Debes iniciar sesión!');";
            echo "</script>";
        }
    
?>