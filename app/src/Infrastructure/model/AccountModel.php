<?php
namespace Bank\Mace\Infrastructure\Model;

use Bank\Mace\Application\Domain\AggregateRoot;
use Bank\Mace\Infrastructure\Model\Mapper\AccountMapper;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Ramsey\Uuid\Doctrine\UuidGenerator;

#[Entity, Table(name:'account')]
final class AccountModel implements Model{

    use AccountMapper;

   /**
     * @var UuidInterface|null The id
     */
    #[Id, Column(type: 'string', unique: true), GeneratedValue(strategy: 'CUSTOM'), CustomIdGenerator(class: UuidGenerator::class)]
    private string $id;

    #[Column(name: 'customerId', type: 'string', nullable: false)]
    public $customerId;

    #[Column(name: 'balance', type: 'float', length: 60, nullable: false)]
    public $balance;

    #[Column(name: 'history', type: 'json', length: 60, nullable: false)]
    public $history;

    function __construct(string $id,string $customerId, float $balance,array $history)
    {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->balance = $balance;
        $this->history = $history; //TODO: Talvez precise de fazer parce para tipo json   

    }

    /**
     * Get the value of history
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Get the value of balance
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Get the value of customerId
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}