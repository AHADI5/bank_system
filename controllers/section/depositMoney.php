<?php 
use models\Accounts;
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once ("../../models/Accounts.php");
include_once ("../../configurations/configuration.php");
$id_compte = $_POST["idCompte"];
$montant = intval($_POST["montant"]);
$motDePasse = $_POST["motDepasse"];
$confirmation = $_POST["motDepasse"];

//Getting passWord

$pass = Accounts::getPassWord($id_compte);

if ($pass != $motDePasse) {
    echo "Failed";
} else {
    $actualAmount = Accounts::majoration($id_compte, $montant);
    echo  $actualAmount . ",". "$montant" .",". "$id_compte";
}

