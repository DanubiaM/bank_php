<?php

use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Infrastructure/config/settings.php';

$container = new Container($settings);

AppFactory::setContainer($container);
$app = AppFactory::create();

require __DIR__ . '/../src/Infrastructure/config/routes.php';
require __DIR__ . '/../src/Infrastructure/config/database.php';


$app->run();