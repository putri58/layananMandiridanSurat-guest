<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PermohonanSuratSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil ID valid dari tabel warga
        $wargaIds = DB::table('warga')->pluck('warga_id')->toArray();
        $jenisIds = DB::table('jenis_surat')->pluck('jenis_id')->toArray();

        // VALIDASI: jika kosong hentikan
        if (empty($wargaIds)) {
            dd("ERROR: Tabel warga kosong! Jalankan WargaSeeder dulu.");
        }

        if (empty($jenisIds)) {
            dd("ERROR: Tabel jenis_surat kosong! Jalankan JenisSuratSeeder dulu.");
        }

        foreach (range(1, 100) as $index) {
            DB::table('permohonan_surat')->insert([
                'nomor_permohonan'  => 'PM' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'pemohon_warga_id'  => $faker->randomElement($wargaIds),
                'jenis_id'          => $faker->randomElement($jenisIds),
                'tanggal_pengajuan' => $faker->dateTimeBetween('-1 year', 'now'),
                'status'            => $faker->randomElement(['Menunggu', 'Diproses', 'Selesai']),
                'catatan'           => $faker->optional()->sentence(),
            ]);
        }
    }
}
