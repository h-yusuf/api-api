<?php

namespace App\Imports;

use App\Models\Employee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        \Log::info('Row data:', $row);
        return new Employee([
            'npk_siste' => $row['npk_siste'],
            'npk_akses' => $row['npk_akses'],
            'name' => $row['name'],
            'division' => $row['division'],
            'department' => $row['department'],
            'section' => $row['section'],
            'shift' => $row['shift'],
            'status' => $row['status'],
        ]);
    }
}
