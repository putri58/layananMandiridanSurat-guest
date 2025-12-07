<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreatePelangganDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create();

        foreach (range(1, 100) as $index) {
            DB::table('users')->insert([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => $faker->password,
                'role'     => $faker->randomElement(['Pelanggan', 'Mitra'])
            ]);
        }
    }
}
