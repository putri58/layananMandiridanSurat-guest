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
        $faker = Factory::create('id_ID');
        $JumlahData = rand(30, 100);

        foreach (range(1, $JumlahData) as $index) {
            DB::table('users')->insert([
                'name'     => $faker->name,
                'email'    => $faker->unique()->safeEmail,
                'password' => $faker->password,
                'role'     => $faker->randomElement(['Pelanggan', 'Mitra'])
            ]);
        }
    }
}
