<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data dummy untuk user dengan peran admin dan guru
        $users = [
            ['name' => 'Admin 1', 'email' => 'admin1@example.com', 'role' => 'admin', 'status' => 'active'],
            ['name' => 'Admin 2', 'email' => 'admin2@example.com', 'role' => 'admin', 'status' => 'active'],
            ['name' => 'Guru 1', 'email' => 'guru1@example.com', 'role' => 'guru', 'status' => 'active'],
            ['name' => 'Guru 2', 'email' => 'guru2@example.com', 'role' => 'guru', 'status' => 'active'],
            ['name' => 'Guru 3', 'email' => 'guru3@example.com', 'role' => 'guru', 'status' => 'nonactive'],
            ['name' => 'Guru 4', 'email' => 'guru4@example.com', 'role' => 'guru', 'status' => 'active'],
            ['name' => 'Guru 5', 'email' => 'guru5@example.com', 'role' => 'guru', 'status' => 'nonactive'],
            ['name' => 'Guru 6', 'email' => 'guru6@example.com', 'role' => 'guru', 'status' => 'active'],
            ['name' => 'Guru 7', 'email' => 'guru7@example.com', 'role' => 'guru', 'status' => 'active'],
            ['name' => 'Guru 8', 'email' => 'guru8@example.com', 'role' => 'guru', 'status' => 'nonactive'],
        ];

        // Looping untuk memasukkan data ke dalam tabel users
        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('password123'), // Semua user memiliki password default
                'role' => $user['role'],
                'status' => $user['status'],
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
