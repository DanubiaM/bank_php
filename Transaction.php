<?php
use Ramsey\Uuid\Uuid;

require 'BasicTransaction.php';

class Transaction{
    use BasicTransaction;

    private $historyTransaction = [];


    function __construct(){
        $this->id = Uuid::uuid4()->toString();
        $this->dateTransaction = date('Y-m-d H:i:s');
    }

    function transactionFrom (Account $sender, Account $receiver, float $amount){
        

        $sender->withdrawal($amount);

        $receiver->deposit($amount);

        array_push($this->historyTransaction, "Registred transaction from $sender->id to $receiver->id  R$[$amount]");

    }
    
    function showTransactions(){
        return  $this->historyTransaction;
    }
}