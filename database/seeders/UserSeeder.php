<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $superadmin = User::firstOrCreate(
            ['email' => 'dior@gmail.com'],
            [
                'name' => 'Toxirov Dior',
                'password' => bcrypt('dior'),
                'email_verified_at' => now(),
            ]
        );

    }
}
