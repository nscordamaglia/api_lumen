<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['available','rented','closed'];

        return [

        "id" => $this->faker->randomNumber(3),
		"title" => $this->faker->word(),
		"property_type" => $this->faker->randomNumber(2),
		"transaction_type" => $this->faker->randomNumber(2),
		"currency" => "pesos",
		"address" => "lala",
		"address_ number" => "1",
		"google_map_data" => "lala",
		"city" => $this->faker->randomNumber(2),
		"state" => $this->faker->randomNumber(2),
		"country" => $this->faker->randomNumber(2),
		"neighborhood" => "lala",
		"rooms" => $this->faker->randomNumber(1),
		"bedrooms" => $this->faker->randomNumber(1),
		"bathrooms" => $this->faker->randomNumber(1),
		"garages" => $this->faker->randomNumber(1),
		"m2" => $this->faker->randomNumber(3),
		"m2_covered" => $this->faker->randomNumber(3),
		"year" => $this->faker->year(),
		"price" => $this->faker->randomFloat(2),
		"amenities" => "lkk",
		"images" => $this->faker->imageUrl(640, 480, 'animals', true),
		"status" => $this->faker->randomElement($status),
		"payment" => "lklk",
		"disposition" => "lklk",
		"tags" => "lklk",
		"description" => $this->faker->text(),
		"created_at" => "{$this->faker->date()} 00:00:00",
		"updated_at" => "{$this->faker->date()} 00:00:00",


        ];
    }
}
