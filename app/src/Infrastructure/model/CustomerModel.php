<?php
namespace Bank\Mace\Infrastructure\Model;

use Bank\Mace\Application\Domain\AggregateRoot;
use DateTime;

/**
 * @Entity @Table(name="Customer")
 **/
final class CustomerModel{
    
    /**
     * @var int
     * @Id @Column(type="integer") 
     * @GeneratedValue
     */
    public $id;


    /**
     * @var string
     * @Column(type="string") 
     */
    public $name;

    /**
     * @var string
     * @Column(type="string") 
     */
    public $phone;

    /**
     * @var string
     * @Column(type="string") 
     */
    public $address;

    /**
     * @var string
     * @Column(type="date") 
     */
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
 
        
        return new self($entity->getName(), $entity->getPhone(), $entity->getAddress());

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