<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photo;
use App\Models\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = Photo::all();

        foreach ($photos as $photo){
            $comment = comment::factory()
            ->count(rand(1,3))
            ->create();
        }
    }
}
