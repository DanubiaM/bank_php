<?php
namespace Bank\Mace\Infrastructure\Config;

use Bank\Mace\Application\UseCase\UseCase;
use Bank\Mace\Infrastructure\Http\Controller;

$app->get('/', function ( $request,  $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->post('/customer', function ($req, $res,$args) {
    return Controller::instance( $this->get(UseCase::class))->customerRegister($req, $res,$args);
});
$app->post('/account', function ($req, $res, $args) {
    return Controller::instance( $this->get(UseCase::class))->createAccount($req, $res,$args);
});
$app->post('/withdraw', function ($req, $res, $args) {
    return Controller::instance( $this->get(UseCase::class))->withdraw($req, $res,$args);
});
$app->post('/deposit', function ($req, $res, $args) {
    return Controller::instance( $this->get(UseCase::class))->deposit($req, $res,$args);
});
$app->get('/statement/$idAccount', function ($req, $res, $args) {
    return Controller::instance( $this->get(UseCase::class))->statement($req, $res,$args);
});
$app->get('/balance/$idAccount', function ($req, $res, $args) {
    return Controller::instance( $this->get(UseCase::class))->balance($req, $res,$args);
});
$app->post('/transaction', function ($req, $res, $args) {
    return Controller::instance($this->get(UseCase::class))->transaction($req, $res,$args);
});

