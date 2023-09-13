<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Countries;

class CountriesFactory extends Factory
{
    protected $model = Countries::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->word(),
'name_ar' => $this->faker->word(),
'number_city' => $this->faker->word(),
        ];
    }
}
