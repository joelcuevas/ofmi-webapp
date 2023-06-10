<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seedUsers();   
    }

    protected function seedUsers() : void
    {
        User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@ofmi.com',
            'role' => 'superadmin',
        ]);

        User::factory()->create([
            'name' => 'Superadmin',
            'last_name' => 'User',
            'email' => 'superadmin@ofmi.com',
            'role' => 'superadmin',
        ]);

        User::factory()->create([
            'name' => 'Contestant',
            'last_name' => 'User',
            'email' => 'contestant@ofmi.com',
            'role' => 'contestant',
        ]);
    }
}
