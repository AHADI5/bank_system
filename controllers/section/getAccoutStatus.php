<?php
use models\Accounts;

include_once ("../../models/Accounts.php");
include_once ("../../configurations/configuration.php");

$id = $_POST['id'];
echo json_encode(Accounts::getStatus($id)) ;