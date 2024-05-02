<?php

require 'vendor/autoload.php';


require 'Bank.php';
require 'Account.php';
require 'Customer.php';
require "Transaction.php";

use Ramsey\Uuid\Uuid;


// Instancia um  banco
$banco = new Bank("PHP Bank");


//Cria um  cliente
$cliente = new Customer("Joe Jhon", "(65)99955-4444","An Address Here - MT");

//Cria uma conta para o cliente
$contaA = new Account(Uuid::uuid4()->toString(), $cliente->id);

//Adiciona conta ao banco
$banco->newAccount($contaA);

// A conta pode realizar transações
$contaA->deposit(100);
$contaA->deposit(50);

#printf($conta->showBalance(). PHP_EOL);

$contaA->withdrawal(120);

$extract = $contaA->showExtract();

foreach($extract as $value){
    $stringValue = $value;
    echo $stringValue .PHP_EOL;
}

//     *** Realizando transações entre contas ***

//Registra  mais uma conta para o cliente com  valor inicial de 500 .  
$contaB = new Account(Uuid::uuid4()->toString(), $cliente->id, 500);
$banco->newAccount($contaB);

//Exibi contas criadas para o cliente
$contasDoCliente = $banco->showAccountFromCustomer($cliente->id);

foreach($contasDoCliente as $value){
    echo "Customer Account:". $value[0]->id .PHP_EOL;
}

//Realizar transação da Conta B para Conta A no valor de 300
$transacao = new Transaction();

$transacao->transactionFrom($contaB, $contaA, 500);

$historicoTransacoesBanco = $transacao->showTransactions();

var_dump($historicoTransacoesBanco);

var_dump($contaA->showExtract());
var_dump($contaB->showExtract());

echo $contaA->showBalance(). PHP_EOL;
echo $contaB->showBalance(). PHP_EOL;