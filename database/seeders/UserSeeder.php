<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(20)->create();

        User::create([
            'username' => 'admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make("password"), // password
            'email_verified_at' => now(),
            'phone_number' => '777888999',
            'status' => "active",
            'remember_token' => Str::random(10),
        ]);

    }
}
