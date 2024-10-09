<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel, WithHeadingRow
{
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
            'date' => $row['tanggal'],
            'cin' => $row['cin'],
            'cout' => $row['cout'],
        ]);
    }
    
}
