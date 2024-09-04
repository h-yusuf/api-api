<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class getAllKaryawanController extends Controller
{
    public function KaryawanGetAll()
    {
        $data = Employee::all();
        // dd($data);
        return response()->json($data);
    }
}
