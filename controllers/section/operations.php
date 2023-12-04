<?php 

use models\Accounts;
// testing Errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Including Essentials

include_once ("../../configurations/configuration.php");
include_once ("../../models/Operations.php");
$amount = intval($_POST["amount"]) ;
$status = $_POST["status"] ;
$balance = $_POST['balance'];
$id_account = intval( $_POST['id'] );
$type = $_POST['operationtype'] ;
$date = date('Y-m-d H:i:s') ;


$operation = new Operation($date,$type, $status,$balance, $id_account , $amount);
$operation -> registerOperation();
