<?php
namespace Bank\Mace\Application\Domain;

class Bank{


    private $account = array();
    const NAME = 'Mace Bank';
    

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