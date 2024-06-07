<?php
namespace Bank\Mace\Infrastructure\Model;

use Bank\Mace\Application\Domain\AggregateRoot;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name:'Customer')]
final class CustomerModel implements Model{
    
    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    public $id;


    #[Column(name: 'name', type: 'string', length: 60, nullable: false)]
    public $name;

    #[Column(name: 'phone', type: 'string', length: 60, nullable: false)]
    public $phone;

    #[Column(name: 'address', type: 'string', length: 60, nullable: false)]
    public $address;

    #[Column(name: 'create_at', type: 'datetime', nullable: false)]
    public DateTime $creatAt;


    function __construct(string $id, string $name, string $phone,string $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;

        $this->creatAt = new DateTime();
    }

 
    public static function fromEntity(AggregateRoot $entity){ 
        
        return new self($entity->getId(),$entity->getName(), $entity->getPhone(), $entity->getAddress());

    }

    /**
     * Get the value of address
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * Get the value of phone
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of creatAt
     */
    public function getCreatAt(): DateTime
    {
        return $this->creatAt;
    }
}