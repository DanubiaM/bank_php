<?php
namespace Bank\Mace\Application\Domain;

enum  ACTION: string {

    case WITHDRAWL = "A withdrawal was made from your bank account.";
    case DEPOSIT = "A deposit was made into your bank account.";
    case TRANSACTION = "A transaction was made from your account to another account.";
}