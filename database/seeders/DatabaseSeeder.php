<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;


use Database\Factories\CategoryFactory;
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

        $this->call([
            // PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PhotoSeeder::class,
            CommentSeeder::class,
            CategoryPhotoSeeder::class
        ]);
    }
}
