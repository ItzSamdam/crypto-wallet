<?php


namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function createUser(array $data);

    public function getUserByAddress(string $address);

    public function getUserById(string $id);
}
