<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Kendaraan::truncate();
        Schema::enableForeignKeyConstraints();

        $vehicleData = [
            'no_transaksi' => 'XYZ-001',
            'no_polisi' => 'N 4646 GG',
            'pemilik_id' => 2,
            'tgl_transaksi' => '2023-10-10',
            'category_id' => 2,
            'tarif' => '30000',
        ];

        DB::table('kendaraan')->insert($vehicleData);
    }
}