<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Admin CBT',
            'email' => 'admin@cbt.id',
            'password' => Hash::make('password'),
            'roles' => 'ADMIN',
            'phone' => '081234567890',
        ]);

        \App\Models\User::create([
            'name' => 'Staf 1',
            'email' => 'staf1@cbt.id',
            'password' => Hash::make('password'),
            'roles' => 'STAF',
            'phone' => '081234567890',
        ]);

        \App\Models\User::create([
            'name' => 'Staf 2',
            'email' => 'staf2@cbt.id',
            'password' => Hash::make('12345678'),
            'roles' => 'STAF',
            'phone' => '081234567890',
        ]);
    }
}
