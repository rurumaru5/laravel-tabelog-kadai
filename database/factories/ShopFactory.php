<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
// 追記
use App\Models\User;
use App\Models\Shop;
use Faker\Generator as Faker;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */

class ShopFactory extends Factory
{
    protected $model = Shop::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //追加
            'id' => $this->faker->numberBetween(1, 35),
            'category_id' => Category::factory(),
            'name' => $this->faker->streetName,
            'image' => 'dummy.png',
            'description' => $this->faker->realText(50),
            'low_price' => 1000,
            'high_price' => 5000,
            'open' => '18:00',
            'close' => '23:00',
            'postal' => $this->faker->postcode,
            'address' => $this->faker->address,
            'tell' => $this->faker->randomNumber(9, true),
            'holiday' => $this->faker->dayOfWeek,
            'map' => 'https://maps.app.goo.gl/GaXyHAeFtgG9cds79',


        ];
    }
}
