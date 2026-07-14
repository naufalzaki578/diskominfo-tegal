<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Diskominfo',
            'email' => 'admin@diskominfo.tegalkab.go.id',
            'password' => bcrypt('password'),
        ]);

        $this->call([
            PengumumanSeeder::class,
        ]);
    }
}