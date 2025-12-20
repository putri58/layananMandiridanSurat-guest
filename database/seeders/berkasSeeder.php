<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class berkasSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Jumlah data berkas
        $jumlahData = rand(30, 100);

        // Ambil permohonan_id yang valid
        $permohonanIds = DB::table('permohonan_surat')
            ->pluck('permohonan_id')
            ->toArray();

        // VALIDASI
        if (empty($permohonanIds)) {
            dd('ERROR: Tabel permohonan_surat kosong! Jalankan PermohonanSuratSeeder dulu.');
        }

        foreach (range(1, $jumlahData) as $i) {
            DB::table('berkas')->insert([
                'permohonan_id' => $faker->randomElement($permohonanIds),
                'nama_berkas'   => $faker->randomElement([
                    'KTP',
                    'Kartu Keluarga',
                    'Surat Domisili',
                    'Surat Pengantar RT/RW',
                    'Akta Kelahiran',
                    'Ijazah Terakhir'
                ]),
                'valid'         => $faker->boolean(70), // 70% valid
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}
