<?php 
use models\Accounts;
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Including Essentials

include_once ("../../configurations/configuration.php");
include_once ("../../models/Operations.php");
$id = $_GET["id"];

$operations = Operation::getHistorty($id);


for ($i=0; $i < count($operations) ; $i++) { 
    $date = $operations[$i] -> getDateOperation();
    $type = $operations[$i] -> getTypeOperation();
    $status = $operations[$i] -> getStatusOperation();
    $amount = $operations[$i] -> getAmount();
   
    
    echo  <<< __END
      <div class ="history flex"> 
            <div class="iconOp flex">
                <div class="icon"></div>
                <div class = "date-tye"> 
                    <div class = "date-op" >
                        <span class = "date">$date</span>  
                        <span class = "type-op">$type</span> 
                    </div>
                
                    <div class = "status-op"> $status </div >
                </div>
            </div>
            <div class="balanceAfter">$amount</div>
      </div>
    __END;
    

}


