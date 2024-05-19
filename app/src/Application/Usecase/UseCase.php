<?php
namespace Bank\Mace\Application\UseCase;

use BalanceAccount;
use MakeTransaction;

class UseCase implements UseCaseInterface {    
    private $customerRegisterAccess;
    private $createAccountAccess;
    private $withdrawAccess;
    private $depositAccess;
    private $statementAccess;
    private $balance;
    private $makeTransaction;
    public function __construct()
    {
        $this->customerRegisterAccess = new CustomerRegister ();
        $this->createAccountAccess = new CreateAccount ();
        $this->withdrawAccess = new Withdraw();
        $this->depositAccess = new Deposit();
        $this->statementAccess = new Statement();
        $this->balance = new BalanceAccount();
        $this->makeTransaction = new MakeTransaction();
    }

    public function customerRegister(string $name, string $phone, string $address){               

        return  $this->customerRegisterAccess->execute($name, $phone, $address);
    }

    public function createAccount(string $idCustomer){

        return $this->createAccountAccess->execute($idCustomer);
    }

    public function withdraw(string $idAccount, float $amount){

        return $this->withdrawAccess->execute($idAccount,$amount);
    }

    public function deposit(string $idAccount, float $amount ){
        return $this->depositAccess->execute($idAccount,$amount);

    }
    public function statement(string $idAccount){
        return $this->statementAccess->execute($idAccount);
    }

    public function balance(string $idAccount){
        return $this->balance->execute($idAccount);
    }
    public function makeTransaction(string $idAccountSender, string $idAccountDestination, float $amount ){
        return $this->makeTransaction->execute($idAccountSender,$idAccountDestination,$amount );
    }
}