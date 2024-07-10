<?php
namespace Bank\Mace\Infrastructure\Persistence\Entity;

interface Persistence{
    function snapshot():array;
    function update():array;

}
