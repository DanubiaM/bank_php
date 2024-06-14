<?php
namespace Bank\Mace\Infrastructure\Persistence\Mapper;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\AccountModel;
use Bank\Mace\Infrastructure\Model\CustomerModel;
use Bank\Mace\Infrastructure\Model\Model;

final class MapperDomainPersistence
{

    static function toModel( AggregateRoot $entity): Model{
        

        $model = match(true){
           $entity instanceof Customer  =>  CustomerModel::fromEntity($entity),
           $entity instanceof Account => AccountModel::fromEntity($entity)
           //TODO: Adicionar outras instancias
        };

        
        return $model;
    }
    static function toDomain( Model $entity): AggregateRoot{
        

        $domain = match(true){
           $entity instanceof CustomerModel  =>  CustomerModel::toDomain($entity),
           $entity instanceof AccountModel => AccountModel::toDomain($entity)
           //TODO: Adicionar outras instancias
        };

        
        return $domain;
    }
}