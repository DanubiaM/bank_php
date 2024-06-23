<?php

namespace Bank\Mace\Application\Ports;

use Bank\Mace\Application\Domain\AggregateRoot;

interface Repository{

    public function save(AggregateRoot $toSave):void;
    public function get(string $nameDomain, string $id): ?AggregateRoot;

}