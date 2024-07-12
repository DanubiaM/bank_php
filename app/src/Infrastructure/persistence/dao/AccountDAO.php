<?php 
namespace Bank\Mace\Infrastructure\Persistence\DAO;

use Bank\Mace\Application\Domain\Account;
use Bank\Mace\Infrastructure\Persistence\DatabaseConnection;
use Bank\Mace\Infrastructure\Persistence\Mapper\MapperDomainPersistence;

class AccountDAO{

    private const UPDATE = 'UPDATE Account SET balance = ?, history = ? WHERE id = ?';

    private DatabaseConnection $connectionDB;

    public function __construct(DatabaseConnection $conn)
    {
        $this->connectionDB= $conn;
    }


    public function save(Account $entity):void{

        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $queryBuilder->insert('Account')->values($this->snapshot($entity));

        $sql = $queryBuilder->getSQL();
        $this->connectionDB->executeQuery($sql);
    }

    public function get(string $id): Account{       
  
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $queryBuilder->select('x.*')
                     ->from('Account','x')
                     ->where('x.id = :identifier');
        $sql = $queryBuilder->getSQL();
        $stmt =$this->connectionDB->executeQuery($sql, ['identifier' => $id]);

        $result = $stmt->fetchAssociative();

        return new Account($result['id'],$result['customerId'],$result['balance'],json_decode($result['history'],true));
    }

    public function update(Account $entity):void{

        $this->connectionDB->executeStatement(self::UPDATE, [$entity->getBalance(), json_encode($entity->getHistory()), $entity->getId()]);      

    }

    private function snapshot(Account $entity):array{
        return [
            'id' => '"'. $entity->getId().'"',
            'customerId' =>'"'. $entity->getCustomerId().'"',
            'balance' =>$entity->getBalance(),
            'history' => json_encode($entity->getHistory()),
        ];
    }

}