<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin MSA',
            'email' => 'admin@msa.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang aman
            'is_active' => true,
        ]);

        $this->command->info('Admin user berhasil dibuat!');
        $this->command->info('Email: admin@msa.com');
        $this->command->info('Password: password123');
    }
}
