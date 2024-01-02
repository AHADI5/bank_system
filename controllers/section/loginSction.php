<?php 
include("../../configurations/configuration.php");
include("../../models/Authentification.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$userName = $_POST["username"];
$password = $_POST["password"];



// $admin = new Authentification("Admin","123456");
// // $admin -> registerAdmin();
$user = Authentification::login($userName, $password);



if ($user) {
    echo "window.location.href = '../../views/sectionAccount/comptes.php';";
    exit();
}