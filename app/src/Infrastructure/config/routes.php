<?php
namespace Bank\Mace\Infrastructure\Config;

use Bank\Mace\Infrastructure\Controller;

$app->get('/', function ( $request,  $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->post('/customer', function ($req, $res,$args) {return Controller::instance( $this->get('useCase'))->customerRegister($req, $res,$args);});
$app->post('/account', function ($req, $res, $args) {return Controller::instance( $this->get('useCase'))->createAccount($req, $res,$args);});
$app->post('/withdraw', function ($req, $res, $args) {return Controller::instance( $this->get('useCase'))->withdraw($req, $res,$args);});
$app->post('/deposit', function ($req, $res, $args) {return Controller::instance( $this->get('useCase'))->deposit($req, $res,$args);});
$app->get('/statement/$idAccount', function ($req, $res, $args) {return Controller::instance( $this->get('useCase'))->statement($req, $res,$args);});
$app->get('/balance/$idAccount', function ($req, $res, $args) {return Controller::instance( $this->get('useCase'))->balance($req, $res,$args);});
$app->post('/transaction', function ($req, $res, $args) {return Controller::instance($this->get('useCase'))->transaction($req, $res,$args);});

