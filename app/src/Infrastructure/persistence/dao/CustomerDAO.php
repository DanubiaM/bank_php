<?php 
namespace Bank\Mace\Infrastructure\Persistence\DAO;

use Bank\Mace\Application\Domain\Customer;
use Bank\Mace\Infrastructure\Persistence\DatabaseConnection;
use Bank\Mace\Infrastructure\Persistence\Mapper\MapperDomainPersistence;
use DateTime;

class CustomerDAO{

    private const UPDATE = 'UPDATE Customer SET name = ?, address = ?, phone = ? WHERE id = ?';

    private DatabaseConnection $connectionDB;

    public function __construct(DatabaseConnection $conn)
    {
        $this->connectionDB= $conn;

    }

    public function save(Customer $entity):void{

        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $queryBuilder->insert('Customer')->values($this->snapshot($entity));

        $sql = $queryBuilder->getSQL();
        $this->connectionDB->executeQuery($sql);
    }

    public function get(string $id): Customer{     
  
        $queryBuilder = $this->connectionDB->createQueryBuilder();

        $queryBuilder->select('x.*')
                     ->from('Customer','x')
                     ->where('x.id = :identifier');
                     
        $sql = $queryBuilder->getSQL();

        $stmt =$this->connectionDB->executeQuery($sql, ['identifier' => $id]);

        $result = $stmt->fetchAssociative();

        return new Customer($result['id'],$result['name'],$result['phone'],$result['address']);
    }

    public function update(Customer $entity):void{

        $this->connectionDB->executeStatement(self::UPDATE, [$entity->getName(), $entity->getAddress(), $entity->getPhone(), $entity->getId()]); 
        
    }

    private function snapshot(Customer $entity):array{
        return [
            'id' => '"'. $entity->getId().'"',
            'name' => '"'.$entity->getName().'"',
            'address' => '"'.$entity->getAddress().'"',
            'phone' => '"'.$entity->getPhone().'"',
            'create_at' =>  '"'.(new DateTime())->format('Y-m-d H:i:s').'"',
        ];
    }
    
}