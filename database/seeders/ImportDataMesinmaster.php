<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportDataMesinmaster extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $sqlfile = public_path('databases/pcd_master_station.sql');
        DB::unprepared(file_get_contents($sqlfile));
        \Log::info('SQL Import Done');
    }
}
