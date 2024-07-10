<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PendaftarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pendaftars')->insert([
            'nama' => 'Abdillah Fakhri Hasani',
            'email' => 'abdillahfakhrihasani@example.com',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2000-01-01',
            'no_hp' => '081234567890',
            'jenjang_pendidikan' => 'S1',
            'asal_sekolah' => 'SMA Negeri 1 Jakarta',
            'kelas' => 'XII RPL 1',
            'peminatan' => 'Rekayasa Perangkat Lunak',
            'alasan_join' => 'Saya ingin menjadi seorang web developer',
            'ss1' => 'https://abdillahfakhri.cloud/img/sani-asli2.jpg',
            'ss2' => 'https://abdillahfakhri.cloud/img/sani-asli2.jpg',
            'ss3' => 'https://abdillahfakhri.cloud/img/sani-asli2.jpg',
            'ss4' => 'https://abdillahfakhri.cloud/img/sani-asli2.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
