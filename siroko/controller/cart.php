<?php
include_once '../model/files/connection.php';
include_once '../model/income.php';
include_once '../model/files/userSession.php';
include_once '../model/cart.php';
        $userSession = new UserSession();
        $orderD = new Cartshopping();
        $user = new User();
        $id_products = $_POST['id_product'];
        $cantd = $_REQUEST['cant'];
        if(isset($_SESSION['user'])){
            //_errors', 1);
             /*echo "hay sesion";*/
            $user->setUser($userSession->getCurrentUser());
            $id_user = $user->getId();
            $name = $user->getName();
                if(isset($_POST['btn_delete_shop'])){
                    if($orderD->deleteOrder($id_user,$id_products)){
                        echo 'Se elimino la orden';
                    }else{
                        echo 'No se pudo eliminar la orden';
                    }
                    include_once './process.php';
                }else if(isset($_POST['btn_update_shop'])){
                    if($orderD->updateOrder($id_user,$id_products,$cantd)){
                        echo 'Se modifico la base de datos';
                    }else{
                        echo 'No se modifico la base de datos';
                    }
                    header('Location: process.php');
                    //include_once '../controller/process.php';
                }else if(isset($_POST['btn_confirmation'])){
                    echo "<script language='JavaScript'>";
                    echo "alert('¡Orden Confirmada, gracias por preferirnos  ');".$name;
                    echo "</script>";
                }
        }else{
            echo "<script language='JavaScript'>";
            echo "alert('¡Debes iniciar sesión!');";
            echo "</script>";
        }
    
?>