<?php
include_once '../model/files/connection.php';
include_once '../model/income.php';
include_once '../model/files/userSession.php';
        $userSession = new UserSession();
        $user = new User();
        if(isset($_SESSION['user'])){
            //_errors', 1);
             /*echo "hay sesion";*/
            $user->setUser($userSession->getCurrentUser());
            $id_user = $user->getId();
            $name = $user->getName();
            $queryP = "SELECT * FROM shopping_cart WHERE id_user = $id_user";
            $resultP = mysqli_query($conn,$queryP); 
            include_once '../view/cart.php';
        }else{
            echo "<script language='JavaScript'>";
            echo "alert('¡Debes iniciar sesión!');";
            echo "</script>";
        }
    
?>