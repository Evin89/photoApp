<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Evin Wijninga',
            'email' => 'e.d.wijninga@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('testtest'),
            'remember_token' => Str::random(10),
        ]);
    }
}
