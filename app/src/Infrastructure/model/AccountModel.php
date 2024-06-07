<?php
namespace Bank\Mace\Infrastructure\Model;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name:'account')]
final class AccountModel implements Model{

    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    public $id;

    #TODO: corrigir
    #[ManyToOne(targetEntity: CustomerModel::class)]
    #[JoinColumn(name: 'customer_id', referencedColumnName: 'id')]
    public $customerId;

    #[Column(name: 'balance', type: 'float', length: 60, nullable: false)]
    public $balance;
}