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

        //Antes de persistir, tenho de mapear para a minha classe de persistencia. 
        /* 1º Cria um mapper entity, esse mapper vai receber algum agregate root
            verificar se ele é do tipo de determinada classe. 
            
          exemplo:
            aggregateRoot $meconverte
            
            if  $meconverte.type == Bank -> return converterBanktoBankModel($meconverte);
        
        */
        $modelToPersiste= MapperDomainPersistence::toModel($entity);

        $this->entityManager->persist($modelToPersiste);
        $this->entityManager->flush();

    }
    public function get(string $id): AggregateRoot{
        $agregateRepository = $this->entityManager->getRepository('');

        return null;
    }
}