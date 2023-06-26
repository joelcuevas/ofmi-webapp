<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contest;
use App\Models\Page;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedUsers();
        $this->seedContests();
        $this->seedPages();
    }

    protected function seedUsers() : void
    {
        User::factory()->create([
            'name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@ofmi.com',
            'role' => 'Administrador',
        ]);

        User::factory()->create([
            'name' => 'Superadmin',
            'last_name' => 'User',
            'email' => 'superadmin@ofmi.com',
            'role' => 'Superadmin',
        ]);

        User::factory()->create([
            'name' => 'Contestant',
            'last_name' => 'User',
            'email' => 'contestant@ofmi.com',
            'role' => 'Competidor',
        ]);
    }

    protected function seedContests()
    {
        $contest = Contest::factory()->create([
            'year' => '2023',
            'title' => 'OFMI 2023',
        ]);

        $contest->activate();
    }

    protected function seedPages()
    {
        Page::factory()->create([
            'slug' => 'reglamento',
            'title' => 'Reglamento',
            'order' => 1,
            'label' => 'Reglamento',
        ]);

        Page::factory()->create([
            'slug' => 'como-ayudar',
            'title' => 'Cómo Ayudar',
            'order' => 2,
            'label' => 'Cómo Ayudar',
        ]);
    }
}
