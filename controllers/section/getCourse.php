<?php
use models\Accounts;
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Including Essentials

include_once ("../../configurations/configuration.php");
include_once ("../../models/Accounts.php");
$cours = Accounts ::getAccount();

for ($i = 0; $i < count($cours); $i++) {
    $nom = $cours[$i] -> getName() ;
    $firstName = $cours[$i] -> getFristName() ;
    $Adress  = $cours[$i] -> getOwnerAdress() ;
    $code = $cours[$i] -> getCode();
    $balance = $cours[$i] -> getBalance() ;
    $devise = $cours[$i] -> getDevise() ;

   
    echo  <<< __END
    <tr class="student grid">

        <td class="code">$code </td>
        <td class="student-number">$firstName</td>
        <td class="student-promotion">$devise</td>
        <td class="student-promotion">$balance<span class="number">$code</span></td>
     </tr>
__END;
}

