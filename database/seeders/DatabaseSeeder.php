<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\SystemResource;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'key'         => 'd984c9cd-9938-43f1-843f-89755d89e56c',
            'user_id'     => 1,
            'name'        => 'Default Server',
            'last_update' => now()
        ]);
    }
}
