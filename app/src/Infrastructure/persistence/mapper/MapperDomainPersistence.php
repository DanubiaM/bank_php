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
           //TODO: Adicionar outras instancias
        };

        
        return $snapshot;
    }
    static function toDomain( Model $entity): AggregateRoot{
        

        $domain = match(true){
           $entity instanceof CustomerModel  =>   $entity->toDomain(),
           $entity instanceof AccountModel => $entity->toDomain()
           //TODO: Adicionar outras instancias
        };

        
        return $domain;
    }
}