<?php

use Bank\Mace\Domain\Customer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../../../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->post('/customer', function ($request, $response) {

    $json= $request->getBody();
    $data = json_decode($json, true); 

    $customer = new Customer($data['name'], $data['phone'],$data['address']);

    //TODO : SAVE IN DATABASE OR FAKEDATABASE

    $response->getBody()->write("Customer Registered");
    
    return $response;
});

/*
Rotas 
    -> Cadastrar Cliente
    -> Criar conta Cliente
    -> Cliente Saca
    -> Cliente Deposita
    -> Cliente ve Extrato
    -> Cliente ve Saldo
    -> Cliente realiza transaçãoe entre contas
    -> Banco pode exibir historico de transação

      */
$app->run();