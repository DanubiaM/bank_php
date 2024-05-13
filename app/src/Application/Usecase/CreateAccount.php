<?php

namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Domain\Account;
use Ramsey\Uuid\Uuid;


class CreateAccount{


    public function __construct()
    {
        //TODO: call repository
    }


    public function execute(string $idcustomer){

        //check if customer exists

        $account = new Account(Uuid::uuid4()->toString(), $idcustomer);

    
        //TODO : SAVE IN DATABASE OR FAKEDATABASE
    }

}