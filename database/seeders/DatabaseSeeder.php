<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\SystemResource;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name'     => 'Mustafa Aydemir',
            'email'    => 'mustafa@aydemir.im',
            'password' => Hash::make('secret'),
        ]);

        Server::create([
            'user_id'     => 1,
            'name'        => 'Mail Server',
            'last_update' => now()
        ]);

        Server::create([
            'user_id'     => 1,
            'name'        => 'Database Servers',
            'last_update' => now()
        ]);

        Server::create([
            'user_id'     => 1,
            'name'        => 'Queue Servers',
            'last_update' => now()
        ]);

        SystemResource::create([
            'server_id' => 1,
            'cpu'       => 62,
            'memory'    => 78,
            'disk'      => 88,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 1,
            'cpu'       => 52,
            'memory'    => 18,
            'disk'      => 58,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 1,
            'cpu'       => 42,
            'memory'    => 58,
            'disk'      => 68,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 2,
            'cpu'       => 62,
            'memory'    => 78,
            'disk'      => 88,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 2,
            'cpu'       => 52,
            'memory'    => 18,
            'disk'      => 58,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 2,
            'cpu'       => 42,
            'memory'    => 58,
            'disk'      => 68,
            'load'      => 15,
        ]);
        
        SystemResource::create([
            'server_id' => 3,
            'cpu'       => 62,
            'memory'    => 78,
            'disk'      => 88,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 3,
            'cpu'       => 52,
            'memory'    => 18,
            'disk'      => 58,
            'load'      => 15,
        ]);

        SystemResource::create([
            'server_id' => 3,
            'cpu'       => 42,
            'memory'    => 58,
            'disk'      => 68,
            'load'      => 15,
        ]);
    }
}
