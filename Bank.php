<?php

class Bank{

    private $account = array();

    function __construct(string $name)
    {
        
    }

    function newAccount(Account $accountNew){
        array_push($this->account,  [$accountNew]);        
    }

    function showAccountFromCustomer(string $idCustomer) : array{

        $customerAccounts =[];

        foreach($this->account  as $account){

            if($account[0]->clientId == $idCustomer){
                array_push($customerAccounts, $account);
            }
        }

        return $customerAccounts;
    }
}