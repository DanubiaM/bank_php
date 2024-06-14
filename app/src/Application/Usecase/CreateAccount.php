<?php

namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Ports\Repository;
use Exception;
use Ramsey\Uuid\Uuid;

class CreateAccount{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;

    }


    public function execute(string $idcustomer){

        if($this->repository->get('Account', $idcustomer) == null){throw new Exception("Não existe cliente");};//TODO: Exepcetion: not found
    

        $account = new Account(Uuid::uuid4()->toString(), $idcustomer);

        $this->repository->save($account);
    }

}