<?php
namespace Bank\Mace\Infrastructure\Config;

use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Infrastructure\Persistence\DatabaseConnection;
use Bank\Mace\Infrastructure\Persistence\RepositoryAdapter;
use DI\Container;
use Doctrine\DBAL\DriverManager;


return  [
    DatabaseConnection::class => static fn() => DriverManager::getConnection([
        'wrapperClass'=>DatabaseConnection::class,
        'driver'=>'sqlite3',
        'path'=> __DIR__ . '/var/database.sqlite'
    ]),

    UseCase::class => function(Container $c) {
        $connectiondb = $c->get(DatabaseConnection::class);

        $adapter = new RepositoryAdapter($connectiondb);

        return new UseCase($adapter);
    }


];


