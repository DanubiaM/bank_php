<?php

use Bank\Mace\Domain\Account;
use Bank\Mace\Domain\Customer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Ramsey\Uuid\Uuid;

require __DIR__ . '/../../../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->post('/customer', function ($request, $response) {

    $json= $request->getParseBody();
    $data = json_decode($json, true); 

    $customer = new Customer($data['name'], $data['phone'],$data['address']);

    //TODO : SAVE IN DATABASE OR FAKEDATABASE

    $response->getBody()->write("Customer Registered");
    
    return $response;
});

$sla = new CreateAccountHandler();

$app->post('/account', function($request,$response) use($sla){

    $json= $request->getBody();
    $data = json_decode($json, true); 


    $account = new Account(Uuid::uuid4()->toString(), $data['idCustomer']);

    // $usecase->createAcount(Uuid::uuid4()->toString());

    //TODO : SAVE IN DATABASE OR FAKEDATABASE

    $response->getBody()->write("Account Registered");

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