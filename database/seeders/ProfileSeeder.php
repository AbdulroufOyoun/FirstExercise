<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::query()->delete();

        Profile::create([
            'first_name' => 'Ahmad',
            'last_name' => 'Zuwayl',
            'followers' => 15200,
            'is_account_verified' => true,
        ]);

        Profile::create([
            'first_name' => 'Alan',
            'last_name' => 'Turing',
            'followers' => 9800,
            'is_account_verified' => false,
        ]);
    }
}
