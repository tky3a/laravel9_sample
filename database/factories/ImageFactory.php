<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // ディレクトリがなければ作成
        if (Storage::exists('public/images')) {
            Storage::makeDirectory('public/images');
        }
        // fakerでimageが使えないバグが出てそう？
        // return [
        //     'name' => $this->faker->image(storage_path('app/public/images'), 640, 480, null, false)
        // ];
    }
}