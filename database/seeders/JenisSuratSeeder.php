<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSuratSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create();

        $listJenis = [
            'Surat Keterangan Domisili',
            'Surat Keterangan Tidak Mampu',
            'Surat Keterangan Usaha',
            'Surat Pengantar SKCK',
            'Surat Keterangan Kelahiran',
            'Surat Keterangan Kematian',
            'Surat Pengantar Nikah',
            'Surat Izin Keramaian',
        ];

        foreach (range(1, 100) as $index) {
            foreach ($listJenis as $jenis) {

                DB::table('jenis_surat')->insert([
                    'kode'        => 'JS' . $faker->unique()->numberBetween(1000, 9999),
                    'nama_jenis'  => $jenis,
                    'syarat_json' => json_encode([
                        'syarat1' => $faker->word(),
                        'syarat2' => $faker->word(),
                    ]),
                    'created_at'  => now(),
                    'updated_at'  => now(),
                ]);
            }
        }
    }
}
