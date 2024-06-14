<?php
namespace Bank\Mace\Infrastructure\Model;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Infrastructure\Model\Mapper\CustomerMapper;
use DateTime;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Rfc4122\UuidInterface;

#[Entity, Table(name:'customer')]
final class CustomerModel implements Model{

    use CustomerMapper;

    /**
     * @var UuidInterface|null The id
     */
    #[Id, Column(type: 'string', unique: true), GeneratedValue(strategy: 'CUSTOM'), CustomIdGenerator(class: UuidGenerator::class)]
    private string $id ;

    #[Column(name: 'name', type: 'string', length: 60, nullable: false)]
    private string $name;

    #[Column(name: 'phone', type: 'string', length: 60, nullable: false)]
    private string $phone;

    #[Column(name: 'address', type: 'string', length: 60, nullable: false)]
    private string $address;

    #[Column(name: 'create_at', type: 'datetime', nullable: false)]
    private DateTime $createdAt;


    function __construct(string $name, string $phone,string $address)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;

        $this->createdAt = new DateTime();
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
    public function getId(): ?UuidInterface
    {
        return $this->id;
    }

    /**
     * Get the value of creatAt
     */
    public function getCreatAt(): DateTime
    {
        return $this->createdAt;
    }
}