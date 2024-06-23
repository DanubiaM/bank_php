<?php
namespace Bank\Mace\Infrastructure\Model\Mapper;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Model\Model;

trait CustomerMapper{

    public static function fromEntity(AggregateRoot $model){ 
        
        return new self($model->getId(), $model->getName(), $model->getPhone(), $model->getAddress());

    }

    public  function toDomain(){ 

        if( !$this->isValid()){return null;}
        return new Customer( $this->getId(), $this->getName(), $this->getPhone(), $this->getAddress());

    }

    private  function isValid(){

        return $this->getName() != null;
        
    }
}