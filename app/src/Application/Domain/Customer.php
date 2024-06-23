<?php
namespace Bank\Mace\Application\Domain;

 
use Ramsey\Uuid\Uuid; 

class Customer implements AggregateRoot{

    private string $id;
    private string $name;
    private string $phone;
    private string $address;

    public function __construct(string $id ,string $name, string $phone, string $address) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

  

    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of phone
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Get the value of address
     */
    public function getAddress(): string
    {
        return $this->address;
    }
}