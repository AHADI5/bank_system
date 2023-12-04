<?php 

use models\Accounts;
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Including Essentials

include_once ("../../configurations/configuration.php");
include_once ("../../models/Accounts.php");
$id = $_GET['id'];
$cours = Accounts :: getFullInfoAccount($id);

for ($i = 0; $i < count($cours); $i++) {
    $nom = $cours[$i] -> getName() ;
    $firstName = $cours[$i] -> getFristName() ;
    $Adress  = $cours[$i] -> getOwnerAdress() ;
    $code = $cours[$i] -> getCode() ;
    $balance = $cours[$i] -> getBalance() ;
    $devise = $cours[$i] -> getDevise() ;


    echo  <<< __END
    <div class="student-name-promotion">
    <div class="name">$balance $devise</div>
    <div class="promotion ">
        <span class="prom">$nom $firstName</span>
    </div>
    
    
    </div>
__END;
}


