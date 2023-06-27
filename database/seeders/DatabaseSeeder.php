<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'membership_id' => 0
        ]);

        Client::create([
            'membership_id' => 1,
            'name' => 'Client',
            'email' => 'client@client.com',
            'mobile' => '01110032911',
            'status' => 'Loyal Member'
        ]);

        $client = User::factory()->create([
            'name' => 'Client',
            'email' => 'client@client.com',
            'password' => bcrypt('123456'),
            'membership_id' => 1
        ]);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleClient = Role::create(['name' => 'client']);

        $admin->assignRole($roleAdmin);
        $client->assignRole($roleClient);
    }
}
