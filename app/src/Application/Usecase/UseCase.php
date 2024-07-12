<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Ports\Repository;

class UseCase implements UseCaseInterface {    
    
    private $customerRegisterAccess;
    private $createAccountAccess;
    private $withdrawAccess;
    private $depositAccess;
    private $statementAccess;


    public function __construct(Repository $repository)
    {
        $this->customerRegisterAccess = new CustomerRegister($repository);
        $this->createAccountAccess = new CreateAccount ($repository);
        $this->withdrawAccess = new Withdraw($repository);
        $this->depositAccess = new Deposit($repository);
        $this->statementAccess = new Statement();
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

}