<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dudi;
use App\Models\Jurusan;
use Carbon\Carbon;

class DudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Data dummy
        $dudis = [
            ['nama_perusahaan' => 'PT Astra International', 'alamat' => 'Jakarta', 'kontak' => '081234567890', 'jurusan_id' => 1, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Telkom Indonesia', 'alamat' => 'Bandung', 'kontak' => '081234567891', 'jurusan_id' => 2, 'status' => 'active'],
            ['nama_perusahaan' => 'PT PLN Persero', 'alamat' => 'Jakarta', 'kontak' => '081234567892', 'jurusan_id' => 3, 'status' => 'nonactive'],
            ['nama_perusahaan' => 'PT Garuda Indonesia', 'alamat' => 'Tangerang', 'kontak' => '081234567893', 'jurusan_id' => 4, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Pertamina', 'alamat' => 'Jakarta', 'kontak' => '081234567894', 'jurusan_id' => 5, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Bukalapak', 'alamat' => 'Jakarta', 'kontak' => '081234567895', 'jurusan_id' => 1, 'status' => 'nonactive'],
            ['nama_perusahaan' => 'PT Gojek Indonesia', 'alamat' => 'Jakarta', 'kontak' => '081234567896', 'jurusan_id' => 2, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Tokopedia', 'alamat' => 'Jakarta', 'kontak' => '081234567897', 'jurusan_id' => 3, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Indosat Ooredoo', 'alamat' => 'Jakarta', 'kontak' => '081234567898', 'jurusan_id' => 4, 'status' => 'active'],
            ['nama_perusahaan' => 'PT XL Axiata', 'alamat' => 'Jakarta', 'kontak' => '081234567899', 'jurusan_id' => 5, 'status' => 'nonactive'],
            ['nama_perusahaan' => 'PT Mandiri Tbk', 'alamat' => 'Jakarta', 'kontak' => '081234567800', 'jurusan_id' => 1, 'status' => 'active'],
            ['nama_perusahaan' => 'PT BRI Persero', 'alamat' => 'Jakarta', 'kontak' => '081234567801', 'jurusan_id' => 2, 'status' => 'active'],
            ['nama_perusahaan' => 'PT BCA', 'alamat' => 'Jakarta', 'kontak' => '081234567802', 'jurusan_id' => 3, 'status' => 'nonactive'],
            ['nama_perusahaan' => 'PT CIMB Niaga', 'alamat' => 'Jakarta', 'kontak' => '081234567803', 'jurusan_id' => 4, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Danamon', 'alamat' => 'Jakarta', 'kontak' => '081234567804', 'jurusan_id' => 5, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Unilever Indonesia', 'alamat' => 'Jakarta', 'kontak' => '081234567805', 'jurusan_id' => 1, 'status' => 'nonactive'],
            ['nama_perusahaan' => 'PT Indofood Sukses Makmur', 'alamat' => 'Jakarta', 'kontak' => '081234567806', 'jurusan_id' => 2, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Mayora Indah', 'alamat' => 'Jakarta', 'kontak' => '081234567807', 'jurusan_id' => 3, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Nestle Indonesia', 'alamat' => 'Jakarta', 'kontak' => '081234567808', 'jurusan_id' => 4, 'status' => 'active'],
            ['nama_perusahaan' => 'PT Djarum', 'alamat' => 'Kudus', 'kontak' => '081234567809', 'jurusan_id' => 5, 'status' => 'nonactive'],
        ];

        foreach ($dudis as $dudi) {
            Dudi::create([
                'nama_perusahaan' => $dudi['nama_perusahaan'],
                'alamat' => $dudi['alamat'],
                'kontak' => $dudi['kontak'],
                'jurusan_id' => $dudi['jurusan_id'],
                'status' => $dudi['status'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
                
    }
}
