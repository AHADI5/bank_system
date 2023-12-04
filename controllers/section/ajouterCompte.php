<?php
use models\Accounts;
// testing Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Including Essentials

include_once ("../../configurations/configuration.php");
include_once ("../../models/Accounts.php");
$ownwerName = $_POST["name"];
$ownerFirstname = $_POST["prenom"];
$ownerAdress = $_POST["adresse"];
$typeAccount  = $_POST["type"];
$deviseAccount = $_POST["devise"];
$passWord = $_POST["motDepasse"];
$balance = $_POST["balance"];
$confirmation = $_POST["confirmation"];

$account = new Accounts($ownwerName,$ownerFirstname, 
$ownerAdress, $typeAccount, $deviseAccount, $passWord, $balance);

$isCreated = $account -> registerAccount();

if ($isCreated) {
    header("Location:../../views/sectionAccount/comptes.php");
}