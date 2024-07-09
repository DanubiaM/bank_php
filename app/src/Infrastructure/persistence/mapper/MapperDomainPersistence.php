<?php
namespace Bank\Mace\Infrastructure\Persistence\Mapper;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\AccountModel;
use Bank\Mace\Infrastructure\Model\CustomerModel;
use Bank\Mace\Infrastructure\Model\Model;
use Bank\Mace\Infrastructure\Persistence\Snapshot\AccountSnapshot;
use Bank\Mace\Infrastructure\Persistence\Snapshot\CustomerSnapshot;

final class MapperDomainPersistence
{

    static function toModel( AggregateRoot $entity):array{
        

        $snapshot = match(true){
           $entity instanceof Customer  => CustomerSnapshot::snapshot($entity),
           $entity instanceof Account => AccountSnapshot::snapshot($entity)
        };

        
        return $snapshot;
    }
    static function toDomain( array $resultQuery, $entity): AggregateRoot{
        

        var_dump($entity);
        var_dump(Customer::class);

        $domain = match($entity){
           'Customer' =>   new Customer($resultQuery['id'],$resultQuery['name'],$resultQuery['phone'],$resultQuery['address']),
           'Account' => new Account($resultQuery['id'],$resultQuery['customerId'],$resultQuery['balance'],$resultQuery['history'])
        };

        //  new Customer($resultQuery['id'],$resultQuery['name'],$resultQuery['phone'],$resultQuery['address'])
        
        return $domain;
    }
}