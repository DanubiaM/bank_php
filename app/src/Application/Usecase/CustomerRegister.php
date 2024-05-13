<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Domain\Customer;

class CustomerRegister{


    public function __construct()
    {
        //TODO: call repository
    }


    public function execute(string $name, string $phone, string $address){
        
        $customer = new Customer( $name,$phone,$address);
    
        //TODO : SAVE IN DATABASE OR FAKEDATABASE
    }

}