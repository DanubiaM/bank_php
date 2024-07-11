<?php
namespace Bank\Mace\Infrastructure\Persistence;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Ports\Repository;
use Bank\Mace\Infrastructure\Persistence\Mapper\MapperDomainPersistence;
use Reflection;
use ReflectionClass;

class RepositoryAdapter implements Repository{

    private DatabaseConnection $connectionDB;


    public function __construct(DatabaseConnection $conn )
    {
        $this->connectionDB= $conn;
    }

    public function save(AggregateRoot $entity):void{
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $persistence = MapperDomainPersistence::toModel($entity);

        $queryBuilder->insert('customer')->values($persistence->snapshot());

        $sql = $queryBuilder->getSQL();
        $this->connectionDB->executeQuery($sql);

    }
    public function get(string $nameDomain, string $id): ?AggregateRoot{

        
  
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $queryBuilder->select('x.*')
                     ->from($nameDomain,'x')
                     ->where('x.id = :identifier');
        $sql = $queryBuilder->getSQL();
        $stmt =$this->connectionDB->executeQuery($sql, ['identifier' => $id]);

        $result = $stmt->fetchAssociative();

        $domain = MapperDomainPersistence::toDomain($result, $nameDomain);

        return $domain;
    }

    public function update(AggregateRoot $entity):void{
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $persistence = MapperDomainPersistence::toModel($entity); //TODO: REVER NOMES  
        $table = (new ReflectionClass($entity))->getShortName();
        $queryBuilder->update($table)->values($persistence->update()); //NAO DEVE SER VALUES E SIM SET, REVER
        
    }
}