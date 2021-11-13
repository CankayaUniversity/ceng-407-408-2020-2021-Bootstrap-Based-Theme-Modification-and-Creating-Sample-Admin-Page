<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'name' => 'Mustafa Aydemir',
            'email' => 'mustafa@aydemir.im',
            'password' => Hash::make('secret.1234'),
        ]);
    }
}
