<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Ports\Repository;

class Deposit{
    
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }


    public function execute(string $idAccount, float $amount){

       // GET ACCOUNT BY REPOSITORY
       $account = $this->repository->get("Account", $idAccount);

       $account->deposit($amount);
       
       $this->repository->save($account);
      
    }
}