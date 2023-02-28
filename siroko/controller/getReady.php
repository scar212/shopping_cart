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
            $deleteE = "DELETE FROM shopping_cart WHERE id_user = $id_user ";
            $resultD = mysqli_query($conn,$deleteE); 
            header('Location: ../index.html');
                
        }else{
            echo "<script language='JavaScript'>";
            echo "alert('¡Debes iniciar sesión!');";
            echo "</script>";
        }
    
?>