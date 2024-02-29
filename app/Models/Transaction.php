<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UUID;

class Transaction extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'crypto_account_id', 'type', 'amount', 'description',
    ];

    public function cryptoAccount()
    {
        return $this->belongsTo(CryptoAccount::class);
    }
}
