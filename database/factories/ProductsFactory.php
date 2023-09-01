<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
;
        return [
            'article' => Str::random(5),
            'name' => Str::random(5),
            'status' => (rand(1,10)%2)==0?'available':'unavailable',
            'color' => '{"green":"#32CD32", "orange":"#FFFF00","blue":"#0000FF"}',
            'size' => '{"big":"900", "little":"200", "middle":"500"}'
        ];
    }
}
