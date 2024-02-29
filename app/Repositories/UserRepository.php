<?php


namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function createUser(array $data)
    {
        return User::create([
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'wallet_address' => $this->generateWalletAddress()
        ]);
    }

    public function getUserByAddress(string $address)
    {
        return User::where('wallet_address', $address)->first();
    }

    public function getUserById(string $id)
    {
        return User::find($id);
    }

    //generate wallet address
    public function generateWalletAddress()
    {
        return '0x' . bin2hex(random_bytes(20));
    }
}
