<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\User;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $faker = Faker::create(); // Create an instance of the Faker library

        // Insert data into the 'users' table
        foreach (range(1, 2) as $index) { 
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'gender' => $faker->randomElement(['male', 'female']),
                'age' => $faker->numberBetween(18, 60), 
                'role' => $faker->randomElement([0, 1]), 
                'email_verified_at' => now(),
                'password' => bcrypt('password'), 
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
