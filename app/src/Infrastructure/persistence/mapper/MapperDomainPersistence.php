<?php
namespace Bank\Mace\Infrastructure\Persistence\Mapper;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\CustomerModel;
use Bank\Mace\Infrastructure\Model\Model;

final class MapperDomainPersistence
{

    static function toModel( AggregateRoot $entity): Model{
        
        $model = match($entity){
           ($entity instanceof Customer)  =>  CustomerModel::fromEntity($entity),
        };

        return $model;
    }
}