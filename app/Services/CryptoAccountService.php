<?php

namespace App\Services;

use App\Repositories\CryptoAccountRepositoryInterface;

class CryptoAccountService
{
    protected $cryptoAccountRepository;

    public function __construct(CryptoAccountRepositoryInterface $cryptoAccountRepository)
    {
        $this->cryptoAccountRepository = $cryptoAccountRepository;
    }

    public function createAccount(array $data)
    {
        return $this->cryptoAccountRepository->createAccount($data);
    }

    public function getUserAccounts(array $data)
    {
        return $this->cryptoAccountRepository->getUserAccounts($data);
    }

    public function getAccountTransactions(array $data)
    {
        return $this->cryptoAccountRepository->getAccountTransactions($data);
    }
}