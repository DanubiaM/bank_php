<?php
namespace Bank\Mace\Infrastructure\Config;

use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Infrastructure\Persistence\DAO\AccountDAO;
use Bank\Mace\Infrastructure\Persistence\DAO\CustomerDAO;
use Bank\Mace\Infrastructure\Persistence\DatabaseConnection;
use Bank\Mace\Infrastructure\Persistence\PersistenceDAO;
use Bank\Mace\Infrastructure\Persistence\RepositoryAdapter;
use DI\Container;
use Doctrine\DBAL\DriverManager;


return  [
    DatabaseConnection::class => static fn() => DriverManager::getConnection([
        'wrapperClass'=>DatabaseConnection::class,
        'driver'=>'sqlite3',
        'path'=> __DIR__ . '/data/database.sqlite'
    ]),

    PersistenceDAO::class => function(Container $c) {
        $connectiondb = $c->get(DatabaseConnection::class);

        $accountdao = new AccountDAO($connectiondb);        
        $customerdao = new CustomerDAO($connectiondb);

        return new PersistenceDAO($accountdao, $customerdao);
    },

    UseCase::class => function(Container $c) {
        $persistence = $c->get(PersistenceDAO::class);

        $adapter = new RepositoryAdapter($persistence);

        return new UseCase($adapter);
    },

    
    

];


