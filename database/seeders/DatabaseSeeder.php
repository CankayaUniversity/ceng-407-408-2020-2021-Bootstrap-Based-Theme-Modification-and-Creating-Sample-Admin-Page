<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Server::create([
            'name' => 'Test Server',
            'cpu' => 80,
            'memory' => 10,
            'disk' => 40,
            'last_update' => now()
        ]);
    }
}
