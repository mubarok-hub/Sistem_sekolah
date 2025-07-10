<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@s.com',
            'password' => Hash::make('123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Guru Matematika',
            'email' => 'guru@s.com',
            'password' => Hash::make('123'),
            'role' => 'guru',
        ]);

        User::create([
            'name' => 'Murid A',
            'email' => 'murid@s.com',
            'password' => Hash::make('123'),
            'role' => 'murid',
        ]);

        User::create([
            'name' => 'Wali Murid A',
            'email' => 'wali@s.com',
            'password' => Hash::make('123'),
            'role' => 'wali',
        ]);
        
    }
}
