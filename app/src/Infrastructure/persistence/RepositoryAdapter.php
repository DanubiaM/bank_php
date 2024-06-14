<?php
namespace Bank\Mace\Infrastructure\Persistence;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Application\Ports\Repository;
use Bank\Mace\Infrastructure\Persistence\Mapper\MapperDomainPersistence;
use Doctrine\ORM\EntityManager;

class RepositoryAdapter implements Repository{

    private EntityManager $entityManager;

    public function __construct(EntityManager $em )
    {
        $this->entityManager= $em;
    }

    public function save(AggregateRoot $entity):void{

        $modelToPersiste= MapperDomainPersistence::toModel($entity);

        $this->entityManager->persist($modelToPersiste);
        $this->entityManager->flush();

    }
    public function get(string $nameModel, string $id): AggregateRoot{

        $path = sprintf('Bank\Mace\Infrastructure\Model\%sModel',$nameModel);
        $model =  $this->entityManager->find($path, $id);

        $domain = null;
        if($model != null){
            $domain = MapperDomainPersistence::toDomain($model);
        }

        return $domain;
    }
}