<?php
require __DIR__ . '/../../vendor/autoload.php';

interface UseCase{

    function createAcount(string $id, float $value = 0 );

}
