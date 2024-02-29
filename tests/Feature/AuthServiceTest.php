<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\AuthService;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthServiceTest extends TestCase
{
    use RefreshDatabase;

    protected $authService;
    protected $userRepository;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->userRepository = $this->app->make(UserRepositoryInterface::class);
        $this->authService = new AuthService($this->userRepository);
    }

    /** @test */
    public function it_registers_a_user()
    {
        $userData = [
            'phone' => '+2348012345678',
            'password' => 'password123',
        ];

        $user = $this->authService->register($userData);

        $this->assertNotNull($user);
        $this->assertEquals($userData['phone'], $user->phone);
    }

    /** @test */
    public function it_logs_in_a_user()
    {
        $userData = [
            'phone' => '+2348012345678',
            'password' => 'password123',
        ];

        // Register user
        $this->authService->register($userData);

        // Attempt login
        $token = $this->authService->login(['phone' => $userData['phone'], 'password' => $userData['password']]);

        $this->assertNotNull($token);
    }

    /** @test */
    public function it_logs_out_a_user()
    {
        $userData = [
            'phone' => '+2348012345678',
            'password' => 'password123',
        ];
        // Register user
        $this->authService->register($userData);

        // Attempt login
        $token = $this->authService->login(['phone' => $userData['phone'], 'password' => $userData['password']]);

        $this->assertNotNull($token);

        // Attempt logout
        $this->authService->logout();

        // Ensure user's token is removed
        $this->assertCount(0, $this->userRepository->getUserByEmail($userData['phone'])->tokens);
    }
}
