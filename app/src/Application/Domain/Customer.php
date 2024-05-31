<?php
namespace Bank\Mace\Application\Domain;

 
use Ramsey\Uuid\Uuid; 

class Customer implements AggregateRoot{

    private string $id;
    private string $name;
    private string $phone;
    private string $address;

    public function __construct(string $name, string $phone, string $address) {
        $this->id = Uuid::uuid4()->toString();
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }
}