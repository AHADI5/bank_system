<?php

class Authentification {
    private $userName ;
    private $password ;

    public function __construct($userName, $password) {
        $this->userName = $userName;
        $this->password = $password;
        
    }

    public function registerAdmin ()  {
        global $connection ;
        $username = $this->userName ;
        $password = password_hash($this->password , PASSWORD_DEFAULT);
        $result = false;

        $requette = 'INSERT INTO ADMINS(ADMINAME , PASSWORD) 
        VALUES (:ADMINAME,:PASSWORD)';

        $statement = $connection->prepare($requette);
        $execution = $statement->execute([
            'ADMINAME'=> $username,
            'PASSWORD'=> $password,
        ]);

        if ($execution) {
            $result = true ;
        } else {$result = false ;} return $result ;
    } 

    public static function login($userName,$password) {
        
         global $connection ;
         $requette = 'SELECT * FROM ADMINS WHERE ADMINAME = :ADMIN';
         $statement = $connection->prepare($requette);
         $execution = $statement->execute([
        ':ADMIN'=> $userName,
        ]) ;
        if ($execution) {
            $user = $statement->fetch(PDO::FETCH_ASSOC) ;
        }
        if ($password == $user['PASSWORD']) {
            session_start();
            $_SESSION['user'] = $user;

            //Authentification reussie
            return $user;
        } else {
            //Authentification failed 
            return null ;
        }
    }

    public static function logout () {

        session_unset();
        session_destroy();
        
    }
        
    
}
