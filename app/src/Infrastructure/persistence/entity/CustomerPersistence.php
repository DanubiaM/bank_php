<?php

namespace Bank\Mace\Infrastructure\Persistence\Entity;

use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Persistence\Enitty\Persistence;
use DateTime;

class CustomerPersistence implements Persistence{
   
    private string $id;
    private string $name;
    private string $address;
    private string $phone;


    public function __construct(Customer $customer)
    {
        $this->id = $customer->getId();
        $this->name = $customer->getName();
        $this->address = $customer->getAddress();
        $this->phone = $customer->getPhone();
    }
    function snapshot():array{
        return [
            'id' => '"'.$this->id .'"',
            'name' => '"'.$this->name.'"',
            'address' => '"'.$this->address.'"',
            'phone' => '"'.$this->phone.'"',
            'create_at' =>  '"'.(new DateTime())->format('Y-m-d H:i:s').'"',
        ];
    }
    
    function update():array{
        return [
          
            'name' => '"'.$this->name.'"',
            'address' => '"'.$this->address.'"',
            'phone' => '"'.$this->phone.'"',
        ];
    }
}