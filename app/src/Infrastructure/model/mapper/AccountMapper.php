<?php
namespace Bank\Mace\Infrastructure\Model\Mapper;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\Model;

trait AccountMapper{

    public static function fromEntity(AggregateRoot $model){ 
        
        return new self($model->getCustomerId(), $model->getBalance(), $model->getHistory());

    }

    public static function toDomain(Model $entity){ 
        
        return new Account($entity->getId(), $entity->getCustomerId(), $entity->getBalance(), $entity->getHistory());

    }
}