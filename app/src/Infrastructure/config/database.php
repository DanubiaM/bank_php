<?php
namespace Bank\Mace\Infrastructure\Config;

use Bank\Mace\Infrastructure\Model\AccountModel;
use Bank\Mace\Infrastructure\Model\CustomerModel;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

$container->set('entityManager', static function (Container $c): EntityManager {

    $settings = $c->get('settings');


    $cache = $settings['doctrine']['dev_mode'] ?
        new ArrayAdapter() :
        new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']);
  
    $config = ORMSetup::createAttributeMetadataConfiguration(
        $settings['doctrine']['metadata_dirs'],
        $settings['doctrine']['dev_mode'],
        null,
        $cache
    );

    
    $connection = DriverManager::getConnection($settings['doctrine']['connection'], $config);

    $em = new EntityManager($connection, $config);

    //  $schemaTool = new SchemaTool($em);

    //  $schemaTool->createSchema([$em->getClassMetadata(AccountModel::class)]);

    return  $em;

});

return $container;