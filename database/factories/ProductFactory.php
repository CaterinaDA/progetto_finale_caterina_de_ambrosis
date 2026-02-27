<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);


        return [
            'name' => Str::title($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(1000, 9999),
            'description' => fake()->optional()->paragraph(3),
            'price' => fake()->randomFloat(2, 5, 300),
            'quantity' => fake()->numberBetween(0, 50),
            'is_active' => fake()->boolean(90),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
