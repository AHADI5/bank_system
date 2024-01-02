<?php
use models\Accounts;

include_once ("../../models/Accounts.php");
include_once ("../../configurations/configuration.php");

$id = $_POST['id'];
if (Accounts::blockAccount($id,'0')) {
    echo 'Success';
} else  {
    echo 'failed';
}