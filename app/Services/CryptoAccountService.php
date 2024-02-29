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

    public function getMarketPrice(string $coinType)
    {
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => $coinType,
            'vs_currencies' => 'ngn', // You can change this to get prices in other currencies
        ]);

        return $response->json()[$coinType]['usd'] ?? null;
    }

    public function getMarketPrices(array $coinTypes)
    {
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => implode(',', $coinTypes),
            'vs_currencies' => 'ngn', // You can change this to get prices in other currencies
        ]);

        return $response->json();
    }
}