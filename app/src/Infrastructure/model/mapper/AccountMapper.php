<?php
namespace Bank\Mace\Infrastructure\Model\Mapper;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\Model;

trait AccountMapper{

    public static function fromEntity(AggregateRoot $model){ 
        
        return new self($model->getId(),$model->getCustomerId(), $model->getBalance(), $model->getHistory());

    }

    public function toDomain(){ 
        
        return new Account( $this->getId(),  $this->getCustomerId(),  $this->getBalance(), $this->getHistory());

    }
}