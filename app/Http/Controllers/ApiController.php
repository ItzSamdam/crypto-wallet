<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegistrationRequest;
use App\Services\AuthService;
use App\Http\Requests\UserLoginRequest;
use App\Traits\ApiResponse;

class ApiController extends Controller
{
    protected $authService;
    use ApiResponse;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(UserRegistrationRequest $request)
    {
        $user = $this->authService->register($request->validated());

        return $this->dataResponse($user, 'User registered successfully', 201);
    }

    public function login(UserLoginRequest $request)
    {
        $user = $this->authService->login($request->validated());

        return $this->dataResponse($user, 'User logged in successfully', 200);
    }

    public function logout()
    {
        $this->authService->logout();

        return $this->successResponse('User logged out successfully', 200);
    }

    public function user()
    {
        $user = $this->authService->getUser();

        return $this->dataResponse($user, 'User retrieved successfully', 200);
    }
}
