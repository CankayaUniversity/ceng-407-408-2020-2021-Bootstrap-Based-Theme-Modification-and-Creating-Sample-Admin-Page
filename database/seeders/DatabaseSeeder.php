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
            'role' => 'admin'
        ]);

        User::create([
            'name'     => 'Test 1',
            'email'    => 'test1@aydemir.im',
            'password' => Hash::make('secret'),
            'role' => 'user'
        ]);

        User::create([
            'name'     => 'Test 2',
            'email'    => 'test2@aydemir.im',
            'password' => Hash::make('secret'),
            'role' => 'user'
        ]);

        User::create([
            'name'     => 'Test 3',
            'email'    => 'test3@aydemir.im',
            'password' => Hash::make('secret'),
            'role' => 'user'
        ]);

        User::create([
            'name'     => 'Test 4',
            'email'    => 'test4@aydemir.im',
            'password' => Hash::make('secret'),
            'role' => 'user'
        ]);

        User::create([
            'name'     => 'Test 5',
            'email'    => 'test5@aydemir.im',
            'password' => Hash::make('secret'),
            'role' => 'user'
        ]);


        Server::create([
            'key'         => '13f3e7fc-5ada-4755-9fc8-781f147b1a1f',
            'user_id'     => 1,
            'name'        => 'Mustafa PC',
            'last_update' => now()
        ]);

        Server::create([
            'key'         => '13f3e7fc-5ada-4755-9fc8-781f147b1a11',
            'user_id'     => 1,
            'name'        => 'TC 1',
            'last_update' => now()
        ]);

        Server::create([
            'key'         => '13f3e7fc-5ada-4755-9fc8-781f147b1a12',
            'user_id'     => 1,
            'name'        => 'TC 2',
            'last_update' => now()
        ]);

        Server::create([
            'key'         => '13f3e7fc-5ada-4755-9fc8-781f147b1a13',
            'user_id'     => 1,
            'name'        => 'TC 3',
            'last_update' => now()
        ]);

        Server::create([
            'key'         => '13f3e7fc-5ada-4755-9fc8-781f147b1a14',
            'user_id'     => 1,
            'name'        => 'TC 4',
            'last_update' => now()
        ]);
    }
}
