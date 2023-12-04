<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../configurations/configuration.php");
include("../../models/Authentification.php");

Authentification::logout();
header("Location:../../views/logins/sectionLogin.php");

?>