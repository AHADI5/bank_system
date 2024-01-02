<?php

namespace models;

class Accounts
{
  private  $ownwerName;
  private  $ownerFirstname;
  private  $ownerAdress;
  private  $typeAccount;
  private $deviseAccount;
  private $passWord;
  private $Balance ;


 public function __construct($ownwerName, $ownerFirstname, $ownerAdress, 
 $typeAccount, $deviseAccount, $passWord, $Balance) {
    $this->ownwerName = $ownwerName;
    $this->ownerFirstname = $ownerFirstname;
    $this->ownerAdress = $ownerAdress;
    $this->typeAccount = $typeAccount;
    $this->deviseAccount = $deviseAccount;
    $this->passWord = $passWord;
    $this->Balance = $Balance;
 }


    public function  registerAccount() {
        global  $connection ;
        $result = false;
        $ownerName = $this->ownwerName;
        $ownerFirstName = $this -> ownerFirstname;
        $ownerAdress = $this->ownerAdress;
        $typeAccount = $this->typeAccount;
        $deviseAccount = $this->deviseAccount;
        $passWord = $this->passWord;
        $Balance = $this ->Balance;


        $requette = 'INSERT INTO ACCOUNTS (NOM ,PRENOM,ADRESSE,CATEGORY,DEVISE, PASSWOR , BALANCE) 
        VALUES (:NOM ,:PRENOM,:ADRESSE,:CATEGORY,:DEVISE,:PASSWOR,:BALANCE) ';

        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            ':NOM'=> $ownerName,
            ':PRENOM'=> $ownerFirstName,
            ':ADRESSE'=> $ownerAdress,
            ':CATEGORY'=> $typeAccount, 
            ':DEVISE'=> $deviseAccount,
            ':PASSWOR'=> $passWord,
            ':BALANCE'=> $Balance,
        ]);

        if ($execution) {
             $result = true;
        } else {
             $result = false;
        }
       return $result;
     

    }

    public  static function getAccount() {
        global $connection ;
        $requette = 'SELECT * FROM ACCOUNTS ';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([]);
        $accounts = [];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $account = new Accounts($data["NOM"], $data["PRENOM"],
                    $data["ADRESSE"], $data["CATEGORY"],
                    $data["DEVISE"], $data["PASSWOR"], $data["BALANCE"]);
               array_push($accounts, $account);

            } return $accounts ;
        } return [];
    }

    // public static  function getAccountPerNumber ($promotion , $department): array
    // {
    //     global $connection ;
    //     $requette = 'SELECT * FROM COURS WHERE DEPARTEMENT = :DEPARTEMENT AND 
    //                   PROMOTION = :PROMOTION';
    //     $statement = $connection -> prepare($requette);
    //     $execution = $statement -> execute([
    //         ":PROMOTION" =>$promotion,
    //         ":DEPARTEMENT" => $department,
    //     ]);
    //     $coursesPromotion = [];
    //     if ($execution) {
    //         while ($data = $statement -> fetch()){
    //             $course =  new Course($data["NOM"], $data["NOMBRE_HEURES"],
    //                 $data["ID_ENSEIGNANT"], $data["NOMBRE_CREDITS"],
    //                 $data["DEPARTEMENT"], $data["PROMOTION"]);
    //             array_push($coursesPromotion, $course);

    //         }

    //     }
    //     return $coursesPromotion;

    // }
    public function getCode () {
        global $connection ;
        $ownerName = $this->ownwerName;
        $ownerFirstName = $this -> ownerFirstname;
        $ownerAdress = $this->ownerAdress;
        $typeAccount = $this->typeAccount;
        $deviseAccount = $this->deviseAccount;
        $passWord = $this->passWord;
        $balance = $this->Balance;

        $requette = "SELECT CODE FROM ACCOUNTS WHERE NOM = 
                     :NOM AND PRENOM = :PRENOM  AND ADRESSE = :ADRESSE AND 
                    CATEGORY = :CATEGORY AND DEVISE = :DEVISE AND   PASSWOR = :PASSWOR
                    AND BALANCE = :BALANCE";
        $statement  = $connection -> prepare($requette);
        $execution  = $statement -> execute([
            ':NOM'=> $ownerName,
            ':PRENOM'=> $ownerFirstName,
            ':ADRESSE'=> $ownerAdress,
            ':CATEGORY'=> $typeAccount, 
            ':DEVISE'=> $deviseAccount,
            ':PASSWOR'=> $passWord,
            ':BALANCE' => $balance
            
        ]);

        if ($execution) {
            if($data = $statement ->fetch()){
                return $data["CODE"];

            } else return null;
        } else return null;
    }

    public static function getFullInfoAccount ($id) {
        global $connection ;
        

        $requette = "SELECT * FROM ACCOUNTS WHERE CODE = :CODE";
        $statement  = $connection -> prepare($requette);
        $execution  = $statement -> execute([
            "CODE"=> $id,
        ]);
        $accounts = [];
        if ($execution) {
            while ($data = $statement -> fetch()) {
                $account = new Accounts($data["NOM"], $data["PRENOM"],
                    $data["ADRESSE"], $data["CATEGORY"],
                    $data["DEVISE"], $data["PASSWOR"], $data["BALANCE"]);
               array_push($accounts, $account);

            } return $accounts ;
        } return [];
    }

    static function majoration($id, $newAmount)  {
        global $connection ;
        $requette = 'UPDATE ACCOUNTS SET BALANCE  = BALANCE + :NEW_VALUE WHERE CODE = :ID';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            'ID'=> $id,
            'NEW_VALUE'=> $newAmount,
        ]);
     
        if ($execution) {
            $requette2 = 'SELECT BALANCE FROM ACCOUNTS WHERE CODE = :IDACCOUNT ';
            $statement = $connection -> prepare($requette2);
            $execution2 = $statement -> execute([
                ':IDACCOUNT'=> $id,]);
            if ($execution2) {
                if ($data = $statement -> fetch()) {
                   return $data["BALANCE"];
                } else return null;
                
            }
            
        } 

    }

    static function withdraw($id, $newAmount) {
        global $connection ;
        $requette = 'UPDATE ACCOUNTS SET BALANCE  = BALANCE - :NEW_VALUE WHERE CODE = :ID';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            'ID'=> $id,
            'NEW_VALUE'=> $newAmount,
        ]);
        
        if ($execution) {
            $requette2 = 'SELECT BALANCE FROM ACCOUNTS WHERE CODE = :IDACCOUNT ';
            $statement = $connection -> prepare($requette2);
            $execution2 = $statement -> execute([
                ':IDACCOUNT'=> $id,]);
            if ($execution2) {
                if ($data = $statement -> fetch()) {
                   return $data["BALANCE"];
                } else return null;
                
            }
            
        } 
    }
    static function getPassWord($id) {
        global $connection ;
        $requette = "SELECT PASSWOR FROM ACCOUNTS WHERE CODE = :CODE";
        $statement  = $connection -> prepare($requette);
        $execution  = $statement -> execute([
            "CODE"=> $id

        ]);

        if ($execution) {
            if($data = $statement ->fetch()){
                return $data["PASSWOR"];

            } else return null;
        } else return null;
    }

    public static function blockAccount ($id, $newStatus) { 
        global $connection ;
        $rersult = false ;
        $requette = "UPDATE  ACCOUNTS SET STATUS = :STATUS WHERE CODE = :ID";
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            "ID"=> $id,
            "STATUS"=> $newStatus
        ]);

        if ($execution) {
            $result  = true ;
            return $result;
        } else {
           return $rersult;
        }
        
    }
    public static function deblockAccount ($id, $newStatus) { 
        global $connection ;
        $rersult = false ;
        $requette = "UPDATE  ACCOUNTS SET STATUS = :STATUS WHERE CODE = :ID";
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            "ID"=> $id,
            "STATUS"=> $newStatus
        ]);

        if ($execution) {
            $result  = true ;
            return $result;
        } else {
           return $rersult;
        }
        
    }

    public static function getStatus ($id) {
        global $connection ;
        $requette = 'SELECT STATUS FROM ACCOUNTS WHERE CODE = :CODE';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            'CODE'=> $id
            ]);
        if ($execution) {
            $status = $statement -> fetch(\PDO::FETCH_ASSOC);
            return $status;
        } else {
            return null;
        }
    }


    public function getName () {
        return $this -> ownwerName;
    }

    public function getFristName () {
        return $this -> ownerFirstname;
    }

    public function getOwnerAdress () {
        return $this -> ownerAdress;

    }

    public function getBalance () {
        return $this -> Balance;
    }

   public function  getDevise()  {
    return $this -> deviseAccount;
   }




}