<?php
require 'vendor/autoload.php';
 
use Ramsey\Uuid\Uuid; 

class Customer{

    public readonly string $id;

    function __construct(readonly string $name, readonly string $phone, readonly string $address)
    {
        $this->id = Uuid::uuid4()->toString();
    }
}