<?php

namespace Bank\Mace\Application\UseCase;
use Bank\Mace\Application\Ports\Repository;

class MakeTransaction{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

    }



    public function execute(string $idAccountSender, string $idAccountDestination, float $amount){

        $accountSender = $this->repository->get("Account", $idAccountSender);
        $accountDestination = $this->repository->get("Account", $idAccountDestination);

        $accountSender->withdrawal($amount);
        $accountDestination->deposit($amount);

        $this->repository->update($accountSender);        
        $this->repository->update($accountDestination);
    
    }
}