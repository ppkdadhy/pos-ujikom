<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 1,
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'role_id' => 2,
                'name' => 'Kasir',
                'email' => 'kasir@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'role_id' => 3,
                'name' => 'Pimpinan',
                'email' => 'pimpinan@gmail.com',
                'password' => Hash::make('12345678'),
            ]
        ];
        foreach ($users as $v) {
            User::create([
                'role_id' => $v['role_id'],
                'name' => $v['name'],
                'email' => $v['email'],
                'password' => $v['password'],
            ]);
        }
    }
}
