<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Animals',
            'created_at' => now()],
            ['name' => 'Black and White',
            'created_at' => now()],
            ['name' => 'Portret',
            'created_at' => now()],
            ['name' => 'Landscape',
            'created_at' => now()],
            ['name' => 'Nature',
            'created_at' => now()],
            ['name' => 'Flowers',
            'created_at' => now()]
        ]);
    }
}
