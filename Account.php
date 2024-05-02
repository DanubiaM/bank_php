<?php

require 'Action.php';

class Account{

    public string $id ;
    public string $clientId;
    private float $balance = 0;
    private $history = array();


    function __construct(string $id, string $clientId,  ?float $balance = 0){

        $this->id = $id;
        $this->clientId = $clientId;
        $this->balance = $balance;
        
    }

    function deposit(float $amount){

        $this->balance += $amount;

        array_push($this->history, ACTION::DEPOSIT->value ." [$amount]");


    }

    function withdrawal(float $amount){

        if($amount > $this->balance){
            throw new ErrorException("Balance account [$this->balance] is smaller than $amount");
        }
    
    
        $this->balance-=$amount;

        array_push($this->history,  ACTION::WITHDRAWL->value ." [$amount]");
    

    }

    function showBalance():float{
        return $this->balance;
    }
    
    function showExtract(){
         return $this->history;
    }
    
}