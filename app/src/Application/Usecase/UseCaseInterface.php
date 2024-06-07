<?php
namespace Bank\Mace\Application\UseCase;

interface UseCaseInterface {
    public function customerRegister(string $name, string $phone, string $address);
    public function createAccount(string $idCustomer);
    public function withdraw(string $idAccount, float $amount );
    public function deposit(string $idAccount, float $amount );
    public function statement(string $idAccount);
    // public function balance(string $idAccount);
    // public function makeTransaction(string $idAccountSender, string $idAccountDestination, float $amount );

}