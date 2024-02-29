<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\CryptoAccount;

interface CryptoAccountRepositoryInterface
{
    public function createAccount(User $user, string $coinType);

    public function getUserAccounts(User $user);

    public function getAccountTransactions(CryptoAccount $account);
}
