<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->paragraph(),
            'user_id' => User::all()->random()->id,
            'image_path' =>'1623423807-Placeholder-png',
            'created_at' => now()
        ];

    }
}
