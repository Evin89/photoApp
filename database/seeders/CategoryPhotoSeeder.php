<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Photo;
use App\Models\Category;
use Database\Factories\CategoryFactory;

class CategoryPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $photos = Photo::all();
        $categories = Category::all();

        foreach ($photos as $photo){

            $rand = rand(1,3);

            for ($i=0; $i < $rand; $i++) {

                $randomCategoryId = $categories->random()->id;

                DB::table('category_photo')->insert([
                    [
                        'photo_id' => $photo->id,
                    'category_id' => $randomCategoryId
                    ]

                ]);
            }

        }
    }
}
