<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        $is_super_admin_exist = User::where('email', '=', 'admin@gmail.com')->first();
        if (!$is_super_admin_exist) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Sample@1123'),
                'created_at' => date('Y-m-d'),
            ]);
        }
    }
}
