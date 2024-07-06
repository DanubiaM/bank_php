<?php

namespace Bank\Mace\Infrastructure\Persistence\Snapshot;

use Bank\Mace\Application\Domain\Account;
use DateTime;

class AccountSnapshot{
   
    static function snapshot(Account $account):array{
        return [
            'id' => '"'.$account->getId().'"',
            'customerId' =>'"'.$account->getCustomerId().'"',
            'balance' =>$account->getBalance(),
            'history' => '"'.$account->getHistory().'"',
        ];
    }
    
}