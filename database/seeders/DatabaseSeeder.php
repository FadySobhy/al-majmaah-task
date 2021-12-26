<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => Hash::make('12345678'),
        ]);

        $user->email_verified_at    = now();
        $user->remember_token       = Str::random(10);
        $user->save();
    }
}
