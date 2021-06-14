<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Category;
use App\Models\User;



class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();

        foreach ($users as $user){

            photo::factory()
            ->count(rand(1,3))
            ->create();
        }


    }
}
