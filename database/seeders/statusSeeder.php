<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class statusSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil data yang valid
        $permohonanIds = DB::table('permohonan_surat')
            ->pluck('permohonan_id')
            ->toArray();

        $petugasIds = DB::table('warga')
            ->pluck('warga_id')
            ->toArray();

        if (empty($permohonanIds)) {
            dd('ERROR: tabel permohonan_surat kosong.');
        }

        if (empty($petugasIds)) {
            dd('ERROR: tabel warga kosong.');
        }

        $statusList = [
            'Permohonan Diajukan',
            'Berkas Diverifikasi',
            'Diproses',
            'Disetujui',
            'Ditolak',
            'Selesai',
        ];

        $jumlahData = rand(30, 80);

        foreach (range(1, $jumlahData) as $i) {
            DB::table('riwayat_status_surat')->insert([
                'permohonan_id'     => $faker->randomElement($permohonanIds),
                'status'            => $faker->randomElement($statusList),
                'petugas_warga_id'  => $faker->randomElement($petugasIds),
                'keterangan'        => $faker->optional()->sentence(),
                'waktu'             => $faker->dateTimeBetween('-6 months', 'now'),
            ]);
        }
    }
}
