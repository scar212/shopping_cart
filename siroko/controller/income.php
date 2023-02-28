<?php
    include('../model/files/connection.php');
    include_once '../model/income.php';
    include_once '../model/files/userSession.php';
            $userSession = new UserSession();
            $user = new User(); 
            $userForm= $_POST['user'];
            $passForm = $_POST['password'];
            if(isset($_SESSION['user'])){
                /*echo "hay sesion";*/
                $user->setUser($userSession->getCurrentUser());
                $user->setUser($userForm);
                $name = $user->getName();
                $id_user = $user->getId();
                include_once '../view/index.php';
            } else if(isset($_POST['user']) && isset($_POST['password'])){
                    $userForm= $_POST['user'];
                    $passForm = $_POST['password'];
                    if($user->userExists($userForm, $passForm)){
                        //echo "Existe el usuario";
                        $userSession->setCurrentUser($userForm);
                        $user->setUser($userForm);
                        $name = $user->getName();
                        $id_user = $user->getId();
                        include_once '../view/index.php';
                    }else{
                        //$errorLogin = "Nombre de usuario y/o password incorrecto";
                        echo "<script language='JavaScript'>";
                        echo "alert('¡Usuario o Contraseña incorrecta!');";
                        echo "</script>";
                        include_once '../index.html';
                    }
            }else{
                echo "<script language='JavaScript'>";
                echo "alert('¡Debes iniciar sesión!');";
                echo "</script>";

            }
    ?>