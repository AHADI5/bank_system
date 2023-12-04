<?php
class Operation  {

    private $dateOperation  ;
    private $typeOperation ;
    private $statusOperation ;
    private $balanceAfterOperation ;
    private $idAccount ;
    private $amount ;

    
    
    public function __construct($dateOperation, $typeOperation, 
    $statusOperation, $balanceAfterOperation,$idAccount, $amount) {   
        $this->dateOperation = $dateOperation;
        $this->typeOperation = $typeOperation;
        $this->statusOperation = $statusOperation;
        $this->balanceAfterOperation = $balanceAfterOperation;
        $this->idAccount = $idAccount;
        $this->amount = $amount;
    }


    public function registerOperation () {
        global $connection ;
        $result = false ;
        $date = $this ->dateOperation ;
        $type = $this ->typeOperation ;
        $status = $this ->statusOperation ;
        $balance = $this ->balanceAfterOperation ;
        $account = $this ->idAccount ;
        $amount = $this -> amount;

        $requette = 'INSERT INTO OPERATION (ACCOUNT,DATEOP , TYPEOP , STATUSOP , BALANCEOP, AMOUNT)
        VALUES (:ACCOUNT,:DATEOP , :TYPEOP , :STATUSOP , :BALANCEOP, :AMOUNT)';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            'ACCOUNT'=> $account,
            'DATEOP'=> $date,
            'TYPEOP'=> $type,  
            'STATUSOP'=> $status,
            'BALANCEOP'=> $balance,
            'AMOUNT'=> $amount,
            
        ]);

        if($execution) {
            $result = true ;
        } else { $result = false ;}
        return $result ;
           
    }

    static function getHistorty ($id) {
        global $connection ;
        $requette= 'SELECT * FROM OPERATION WHERE ACCOUNT = :ACCOUNT';
        $statement = $connection -> prepare($requette);
        $execution = $statement -> execute([
            'ACCOUNT'=> $id,
            ]);
        $operations = [];
        if($execution) {
            while($data = $statement -> fetch()) {
                $peration = new Operation($data['DATEOP'], $data['TYPEOP'],
                 $data['STATUSOP'], $data['BALANCEOP'], $data['ACCOUNT'], 
                 $data['AMOUNT']);
                array_push($operations, $peration);
            } return $operations;
        } else { return [];}
    }
   

    /**
     * Get the value of dateOperation
     */
    public function getDateOperation()
    {
        return $this->dateOperation;
    }

    /**
     * Set the value of dateOperation
     */
    public function setDateOperation($dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    /**
     * Get the value of typeOperation
     */
    public function getTypeOperation()
    {
        return $this->typeOperation;
    }

    /**
     * Set the value of typeOperation
     */
    public function setTypeOperation($typeOperation): self
    {
        $this->typeOperation = $typeOperation;

        return $this;
    }

    /**
     * Get the value of statusOperation
     */
    public function getStatusOperation()
    {
        return $this->statusOperation;
    }

    /**
     * Set the value of statusOperation
     */
    public function setStatusOperation($statusOperation): self
    {
        $this->statusOperation = $statusOperation;

        return $this;
    }

    /**
     * Get the value of balanceAfterOperation
     */
    public function getBalanceAfterOperation()
    {
        return $this->balanceAfterOperation;
    }

    /**
     * Set the value of balanceAfterOperation
     */
    public function setBalanceAfterOperation($balanceAfterOperation): self
    {
        $this->balanceAfterOperation = $balanceAfterOperation;

        return $this;
    }

    /**
     * Get the value of idAccount
     */
    public function getIdAccount()
    {
        return $this->idAccount;
    }

    /**
     * Set the value of idAccount
     */
    public function setIdAccount($idAccount): self
    {
        $this->idAccount = $idAccount;

        return $this;
    }

    /**
     * Get the value of amount
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     */
    public function setAmount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }
}