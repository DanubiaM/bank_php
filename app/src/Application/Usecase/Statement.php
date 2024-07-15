<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Ports\Repository;

class Statement{
    
    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

    }

    public function execute(string $idAccount):array{

        $account = $this->repository->get("Account", $idAccount);

        return $account->showExtract();
    }
}