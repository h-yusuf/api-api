<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Employes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'npk_siste' => 91581,
                'npk_akses' => 'H749',
                'name' => 'Toto Aryo',
                'division' => 'PLANT',
                'department' => 'PPIC',
                'section' => 'SUPPORTING FACILITY',
                'shift' => '0600_1500 & 1400_2300 & 2100_0600',
                'status' => 'OS'
            ],
            [
                'npk_siste' => 91582,
                'npk_akses' => 'M953',
                'name' => 'Zulkadli Ismail',
                'division' => 'PLANT',
                'department' => 'PRODUCTION',
                'section' => 'PRODUCTION',
                'shift' => '0600_1500 & 1400_2300 & 2100_0600',
                'status' => 'MAGANG'
            ],
            // Tambahkan data lainnya sesuai dengan gambar
        ]);
    }
}
