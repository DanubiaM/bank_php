<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Ports\Repository;

class BalanceAccount{


    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

    }


    public function execute(string $idAccount):float{
        $account = $this->repository->get("Account", $idAccount);

        return $account->showBalance(); 
    }
}