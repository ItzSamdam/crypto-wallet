<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Repositories\CryptoAccountRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CryptoAccountServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $cryptoAccountRepository;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->cryptoAccountRepository = $this->app->make(CryptoAccountRepositoryInterface::class);
    }

    /** @test */
    public function it_creates_a_crypto_account_for_user()
    {
        $user = User::factory()->create();

        $account = $this->cryptoAccountRepository->createAccount($user, 'Bitcoin', 10.5);

        $this->assertNotNull($account);
        $this->assertEquals($user->id, $account->user_id);
        $this->assertEquals('Bitcoin', $account->coin_type);
    }

    /** @test */
    public function it_gets_user_crypto_accounts()
    {
        $user = User::factory()->create();

        $account1 = $this->cryptoAccountRepository->createAccount($user, 'Bitcoin', 10.5);
        $account2 = $this->cryptoAccountRepository->createAccount($user, 'Ethereum', 5.5);

        $accounts = $this->cryptoAccountRepository->getUserAccounts($user);

        $this->assertCount(2, $accounts);
    }

    /** @test */
    public function it_gets_account_transactions()
    {
        $user = User::factory()->create();

        $account = $this->cryptoAccountRepository->createAccount($user, 'Bitcoin', 10.5);

        $transaction1 = $account->transactions()->create([
            'amount' => 5.5,
            'type' => 'credit',
        ]);

        $transaction2 = $account->transactions()->create([
            'amount' => 2.5,
            'type' => 'debit',
        ]);

        $transactions = $this->cryptoAccountRepository->getAccountTransactions($account);

        $this->assertCount(2, $transactions);
    }
}
