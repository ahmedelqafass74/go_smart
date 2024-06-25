<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $egyptianCities = [
            'Cairo',
            'Alexandria',
            'Giza',
            'Shubra El Kheima',
            'Port Said',
            'Suez',
            'Luxor',
            'al-Mansura',
            'El-Mahalla El-Kubra',
            'Tanta',
            'Asyut',
            'Ismailia',
            'Faiyum',
            'Zagazig',
            'Damietta',
            'Aswan',
            'Minya',
            'Damanhur',
            'Beni Suef',
            'Qena',
            'Sohag',
            'Hurghada',
            '6th of October City',
            'Shibin El Kom',
            'Banha',
            'Kafr El Sheikh',
            'Arish',
            'Mallawi',
            '10th of Ramadan City',
            'Bilbeis'
        ];

        return [
            'image' => $this->faker->imageUrl(400, 400, 'people', true, 'Faker'),
            'name' => $this->faker->name,
            'city' => $this->faker->randomElement($egyptianCities),
            'phoneNo' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'year_of_birth' => $this->faker->year,
            'contact_link' => $this->faker->url,
            'car_type' => $this->faker->word,
            'language' => $this->faker->languageCode,
            'description' => $this->faker->paragraph,
        ];
    }
}
