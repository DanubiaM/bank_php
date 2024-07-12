<?php
namespace Bank\Mace\Infrastructure\Persistence;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Persistence\DAO\AccountDAO;
use Bank\Mace\Infrastructure\Persistence\DAO\CustomerDAO;


final class PersistenceDAO
{
    private $persistAccountDAO;
    private $persistCustomerDAO;

    public function __construct(AccountDAO $persistAccountDAO, CustomerDAO $persistCustomerDAO)
    {
        $this->persistAccountDAO =  $persistAccountDAO;
        $this->persistCustomerDAO =  $persistCustomerDAO;
    }

    function save(AggregateRoot $entity){

        $snapshot = match(true){
            $entity instanceof Customer  =>  $this->persistCustomerDAO->save($entity),
            $entity instanceof Account => $this->persistAccountDAO->save($entity)
         };

    }

    function get(string $nameDomain, string $id):AggregateRoot{
        
        $domain = match($nameDomain){
            'Customer' => $this->persistCustomerDAO->get($id),
            'Account' => $this->persistAccountDAO->get($id)
        };
        
        return $domain;
    }
    
    function update(AggregateRoot $entity){

        $snapshot = match(true){
            $entity instanceof Customer  => $this->persistCustomerDAO->update($entity),
            $entity instanceof Account => $this->persistAccountDAO->ipdate($entity)
         };

    }
}