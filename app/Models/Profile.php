<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'followers',
        'is_account_verified',
    ];

    protected function casts(): array
    {
        return [
            'followers' => 'integer',
            'is_account_verified' => 'boolean',
        ];
    }
}
