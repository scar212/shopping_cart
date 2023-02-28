<?php
include 'files/db.php';

class User extends DB{

    public function userExists($user,$pass){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE user = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM users WHERE user = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->name = $currentUser['name'];
            $this->id_user = $currentUser['id_user'];
        }
    }

    public function getName(){
        return $this->name;
    }
    public function getId(){
        return $this->id_user;
    }
}

?>