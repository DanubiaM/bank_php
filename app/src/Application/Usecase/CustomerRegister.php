<?php
namespace Bank\Mace\Application\UseCase;

use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Application\Ports\Repository;
use Doctrine\ORM\EntityManager;

class CustomerRegister{

    private $repository;

    function __construct(Repository $repository)
    {
     $this->repository = $repository;   
    }

    public function execute(string $name, string $phone, string $address){
        
        $customer = new Customer($name,$phone,$address);
    
        $this->repository->save($customer);
    }

}