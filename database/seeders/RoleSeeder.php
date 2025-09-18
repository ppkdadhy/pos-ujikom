<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Administrator'],
            ['name' => 'Kasir'],
            ['name' => 'Pimpinan']
        ];
        foreach ($roles as $v) {
            Role::create([
                'name' => $v['name']
            ]);
        }
    }
}
