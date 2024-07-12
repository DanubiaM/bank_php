<?php
namespace Bank\Mace\Infrastructure\Persistence;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Ports\Repository;


class RepositoryAdapter implements Repository{

    private PersistenceDAO $persist;


    public function __construct(PersistenceDAO $persist )
    {
        $this->persist= $persist;
    }

    public function save(AggregateRoot $entity):void{

        $this->persist->save($entity);

    }
    public function get(string $nameDomain, string $id): AggregateRoot{
      
        return $this->persist->get($nameDomain, $id);
    }

    public function update(AggregateRoot $entity):void{

        $this->persist->update($entity);        
    }
}