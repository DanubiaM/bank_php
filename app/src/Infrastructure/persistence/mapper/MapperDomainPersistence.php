<?php
namespace Bank\Mace\Infrastructure\Persistence\Mapper;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Persistence\Entity\AccountPersistence;
use Bank\Mace\Infrastructure\Persistence\Entity\CustomerPersistence;
use Bank\Mace\Infrastructure\Persistence\Entity\Persistence;

final class MapperDomainPersistence
{

    static function toModel( AggregateRoot $entity):Persistence{
        
        $snapshot = match(true){
           $entity instanceof Customer  => new CustomerPersistence($entity),
           $entity instanceof Account => new AccountPersistence($entity)
        };
        
        return $snapshot;
    }
    static function toDomain( array $resultQuery, $entity): AggregateRoot{

        $domain = match($entity){
           'Customer' =>   new Customer($resultQuery['id'],$resultQuery['name'],$resultQuery['phone'],$resultQuery['address']),
           'Account' => new Account($resultQuery['id'],$resultQuery['customerId'],$resultQuery['balance'],json_decode($resultQuery['history'],true))
        };

        
        return $domain;
    }
}