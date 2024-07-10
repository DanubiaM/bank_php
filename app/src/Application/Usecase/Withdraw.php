<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Ports\Repository;

class Withdraw{
    
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

    }


    public function execute(string $idAccount, float $amount){

        $account = $this->repository->get("Account", $idAccount);

        $account->withdrawal($amount);
        
        $this->repository->update($account);
       
        
    }
}