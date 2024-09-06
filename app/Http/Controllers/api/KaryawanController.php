<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function karyawanGetAll()
    {
        $data = Employee::all(); 
        // dd($data);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
           'npk_siste' => 'required|string|max:255', 
            'npk_akses' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'division' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'section' => 'required|string|max:255',
            'shift' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        try {
            $employee = new Employee();
            $employee->npk_siste = $request->input('npk_siste');
            $employee->npk_akses = $request->input('npk_akses');
            $employee->name = $request->input('name');
            $employee->division = $request->input('division');
            $employee->department = $request->input('department');
            $employee->section = $request->input('section');
            $employee->shift = $request->input('shift');
            $employee->status = $request->input('status');

            $employee->save();

            return response()->json(['message' => 'Data berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data: ' . $e->getMessage()], 402);
        }
    }
}
