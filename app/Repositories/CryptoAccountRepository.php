<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\CryptoAccount;

class CryptoAccountRepository implements CryptoAccountRepositoryInterface
{
    public function createAccount(User $user, string $coinType)
    {
        return $user->cryptoAccounts()->create([
            'coin_type' => $coinType,
            'balance' => 0,
        ]);
    }

    public function getUserAccounts(User $user)
    {
        return $user->cryptoAccounts;
    }

    public function getAccountTransactions(CryptoAccount $account)
    {
        return $account->transactions;
    }
}
