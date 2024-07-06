<?php
namespace Bank\Mace\Infrastructure\Persistence;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Ports\Repository;
use Bank\Mace\Infrastructure\Persistence\Mapper\MapperDomainPersistence;

class RepositoryAdapter implements Repository{

    private DatabaseConnection $connectionDB;


    public function __construct(DatabaseConnection $conn )
    {
        $this->connectionDB= $conn;
    }

    public function save(AggregateRoot $entity):void{
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $snapshot = MapperDomainPersistence::toModel($entity);

        $queryBuilder->insert('customer')->values($snapshot);

        $sql = $queryBuilder->getSQL();
        $this->connectionDB->executeQuery($sql);

    }
    public function get(string $nameDomain, string $id): ?AggregateRoot{

        $domain = null;
  
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $queryBuilder->select('x.*')
                     ->from($nameDomain,'x')
                     ->where('x.id = :identifier')
                     ->setParameter('identifier', $id);

        $sql = $queryBuilder->getSQL();
        $stmt =$this->connectionDB->executeQuery($sql);
        $result = $stmt->fetchOne();

        
        return $domain;
    }
}