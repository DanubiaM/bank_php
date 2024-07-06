<?php

namespace Bank\Mace\Infrastructure\Persistence\Snapshot;

use Bank\Mace\Application\Domain\Customer;
use DateTime;

class CustomerSnapshot{
   
    static function snapshot(Customer $customer):array{
        return [
            'id' => '"'.$customer->getId().'"',
            'name' => '"'.$customer->getName().'"',
            'address' => '"'.$customer->getAddress().'"',
            'phone' => '"'.$customer->getPhone().'"',
            'create_at' =>  '"'.(new DateTime())->format('Y-m-d H:i:s').'"',
        ];
    }
    
}