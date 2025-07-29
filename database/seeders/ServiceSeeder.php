<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create(); 

        // Seed for bus services
        foreach (range(1, 5) as $index) {
            DB::table('services')->insert([
                'type' => 'Bus', 
                'name' => $faker->company, 
                'description' => $faker->paragraph, 
                'price' => $faker->randomFloat(2, 500, 2000), 
                'room' => $faker->numberBetween(10, 50), 
                'status' => $faker->randomElement(['Free', 'Pending', 'Booked']), // Random status
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Seed for hotel services
        foreach (range(1, 5) as $index) {
            DB::table('services')->insert([
                'type' => 'Hotel', // Hotel service
                'name' => $faker->company, 
                'description' => $faker->paragraph, 
                'price' => $faker->randomFloat(2, 1000, 5000), 
                'room' => $faker->numberBetween(5, 20), 
                'status' => $faker->randomElement(['Free', 'Pending', 'Booked']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
