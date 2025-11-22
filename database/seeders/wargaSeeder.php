<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class wargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker = Factory::create();

    foreach (range(1, 100) as $index) {
        DB::table('warga')->insert([
                'no_ktp'    => $faker->unique()->numerify('################'), // 16 digit
                'nama'      => $faker->name(),
                'gender'    => $faker->randomElement(['Male', 'Female', 'Other']),
                'agama'     => $faker->randomElement([
                    'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'
                ]),
                'pekerjaan' => $faker->jobTitle(),
                'phone'     => $faker->optional()->phoneNumber(),
                'email'     => $faker->unique()->safeEmail(),
                'created_at'=> now(),
                'updated_at'=> now(),
            ]);
    }
    }
}
