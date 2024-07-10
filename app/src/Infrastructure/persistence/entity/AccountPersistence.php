<?php

namespace Bank\Mace\Infrastructure\Persistence\Entity;

use Bank\Mace\Application\Domain\Account;

class AccountPersistence implements Persistence{
   
    private string $id;
    private string $customerId;
    private string $balance;
    private array $history;

    public function __construct(Account $account)
    {
        $this->id = $account->getId();
        $this->customerId = $account->getCustomerId();
        $this->balance = $account->getBalance();
        $this->history = $account->getHistory();
    }
    
    function snapshot():array{
        return [
            'id' => '"'.$this->id.'"',
            'customerId' =>'"'.$this->customerId.'"',
            'balance' =>$this->balance,
            'history' => json_encode($this->history),
        ];
    }
    
    function update():array{
        return [
            'balance' =>$this->balance,
            'history' => json_encode($this->history),
        ];
    }

}