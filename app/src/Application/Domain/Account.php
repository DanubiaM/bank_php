<?php
namespace Bank\Mace\Application\Domain;

use Exception;

class Account implements AggregateRoot{

    public string $id ;
    public string $customerId;
    private float $balance;
    private $history = array();


    function __construct(string $id, string $customerId,  float $balance, array $history){

        $this->id = $id;
        $this->customerId = $customerId;
        $this->balance = $balance;
        $this->history = $history;
        
    }

    function deposit(float $amount){

        $this->balance += $amount;

        array_push($this->history,  ["action" =>ACTION::DEPOSIT->value,
                                     "value" => $amount]);

    }

    function withdrawal(float $amount){

        if($amount > $this->balance){
            throw new Exception("Balance account [$this->balance] is smaller than $amount");
        }
    
    
        $this->balance-=$amount;

        array_push($this->history,  ["action" => ACTION::WITHDRAWL->value,
                                    "value" => $amount]);
    

    }

    function showBalance():float{
        return $this->balance;
    }
    
    function showExtract(){
         return $this->history;
    }
    

    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of customerId
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }



    /**
     * Get the value of history
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Get the value of balance
     */
    public function getBalance(): float
    {
        return $this->balance;
    }
}