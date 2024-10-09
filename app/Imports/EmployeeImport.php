<?php
namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class EmployeeImport implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        if (!isset($row[1]) || empty($row[1])) {
            return null;
        }

        try {
            return new Employee([
                'npk_siste' => $row[1],
                'npk_akses' => $row[2],
                'name' => $row[3],
                'division' => $row[4],
                'department' => $row[5],
                'section' => $row[6],
                'shift' => $row[7],
                                
                'status' => $row[8],
                'date' => $row[9],
                'cin' => $row[10],
                'cout' => $row[11],
            ]);
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                \Log::error('Error importing row ' . $failure->row() . ': ' . implode(', ', $failure->errors()));
            }

            return null; 
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
