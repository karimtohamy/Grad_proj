<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();

        $serviceProviders = [1, 2, 3]; // User IDs for service providers
        $customers = [4, 5]; // User IDs for customers

        // 10 reviews from customers to providers
        for ($i = 0; $i < 10; $i++) {
            Review::create([
                'rating' => $faker->numberBetween(1, 5),
                'comments' => $faker->optional()->sentence(),
                'rater_id' => $faker->randomElement($customers),
                'rater_type' => 'customer',
                'rated_id' => $faker->randomElement($serviceProviders),
                'rated_type' => 'provider',
            ]);
        }

        // 10 reviews from providers to customers
        for ($i = 0; $i < 10; $i++) {
            Review::create([
                'rating' => $faker->numberBetween(1, 5),
                'comments' => $faker->optional()->sentence(),
                'rater_id' => $faker->randomElement($serviceProviders),
                'rater_type' => 'provider',
                'rated_id' => $faker->randomElement($customers),
                'rated_type' => 'customer',
            ]);
        }
    }
}
