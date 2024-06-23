<?php
namespace Bank\Mace\Infrastructure\Persistence;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Ports\Repository;
use Bank\Mace\Infrastructure\Persistence\Mapper\MapperDomainPersistence;
use Doctrine\ORM\EntityManager;

class RepositoryAdapter implements Repository{

    const PATH_MODEL = 'Bank\Mace\Infrastructure\Model\\';
    private EntityManager $entityManager;

    public function __construct(EntityManager $em )
    {
        $this->entityManager= $em;
    }

    public function save(AggregateRoot $entity):void{

        $modelToPersiste= MapperDomainPersistence::toModel($entity);

        echo $this->entityManager->contains($modelToPersiste);

        $this->entityManager->persist($modelToPersiste); //TODO: 
        $this->entityManager->flush();

    }
    public function get(string $nameDomain, string $id): ?AggregateRoot{

        $path = sprintf(self::PATH_MODEL.$nameDomain.'Model');
        $model =  $this->entityManager->find($path, $id);

        $domain = null;
        if($model != null){
            $domain = MapperDomainPersistence::toDomain($model);
        }

        return $domain;
    }
}