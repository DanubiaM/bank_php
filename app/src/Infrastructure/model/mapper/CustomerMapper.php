<?php
namespace Bank\Mace\Infrastructure\Model\Mapper;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\Model;

trait CustomerMapper{

    public static function fromEntity(AggregateRoot $model){ 
        
        return new self($model->getName(), $model->getPhone(), $model->getAddress());

    }

    public static function toDomain(Model $entity){ 
        
        if(!isValid($entity)){return null;}
        return new Customer($entity->getName(), $entity->getPhone(), $entity->getAddress());

    }

    private function isValid($entity){

        return $entity->getName != null;
        
    }
}