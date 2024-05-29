<?php
namespace Bank\Mace\Application\Domain;

 
use Ramsey\Uuid\Uuid; 

class Customer{

    public readonly string $id;

    function __construct(string $name, string $phone,string $address)
    {
        $this->id = Uuid::uuid4()->toString();
    }
}