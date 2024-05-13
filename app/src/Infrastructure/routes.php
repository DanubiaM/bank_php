<?php
namespace Bank\Mace\Infrastructure;

use Bank\Mace\Infrastructure\Controller;

$app->get('/', function ( $request,  $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->post('/customer', function ($req, $res,$args) {return Controller::instance()->customerRegister($req, $res,$args);});
$app->post('/account', function ($req, $res, $args) {return Controller::instance()->createAccount($req, $res,$args);});
$app->post('/withdraw', function ($req, $res, $args) {return Controller::instance()->withdraw($req, $res,$args);});
$app->post('/deposit', function ($req, $res, $args) {return Controller::instance()->deposit($req, $res,$args);});
$app->get('/statement/$idAccount', function ($req, $res, $args) {return Controller::instance()->statement($req, $res,$args);});
$app->get('/balance/$idAccount', function ($req, $res, $args) {return Controller::instance()->balance($req, $res,$args);});
$app->post('/transaction', function ($req, $res, $args) {return Controller::instance()->transaction($req, $res,$args);});
$app->get('/transactional-history-bank', function ($req, $res, $args) {return Controller::instance()->bankTransactonalHistory($req, $res,$args);});

