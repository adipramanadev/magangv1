<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //jruusan
        $jurusans = [
            ['nama_jurusan' => 'Teknik Informatika', 'status' => 'active'],
            ['nama_jurusan' => 'Sistem Informasi', 'status' => 'active'],
            ['nama_jurusan' => 'Teknik Elektro', 'status' => 'active'],
            ['nama_jurusan' => 'Teknik Mesin', 'status' => 'nonactive'],
            ['nama_jurusan' => 'Manajemen Bisnis', 'status' => 'active'],
            ['nama_jurusan' => 'Akuntansi', 'status' => 'nonactive']
        ];

        foreach ($jurusans as $jurusan) {
            Jurusan::create([
                'nama_jurusan' => $jurusan['nama_jurusan'],
                'status' => $jurusan['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
