<?php 
include("../../models/Accounts.php");
include("../../configurations/configuration.php");
use models\Accounts;
error_reporting(E_ALL);
ini_set('display_errors', 1);

$codeAccount = $_POST["idCompte"];
$montant =   $_POST["montant"];
$passWord =  $_POST["motDepasse"];
$confirmPassWord =  $_POST["confirmer"];

//getting PassWord 
$pass= Accounts::getPassWord($codeAccount);

//Checking wether passWord is correct 
if ($pass != $passWord) {
    echo "Failed";
} else {
    $actualAmount = Accounts::withdraw($codeAccount,$montant);
    echo  $actualAmount . ",". "$montant" .",". "$codeAccount";
}
