<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function mesinGetAll()
    {
        $data = Mesin::all(); 
        // dd($data);
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:250',
            'warning_dandory_id' => 'nullable|integer',
            'line' => 'nullable|string|max:255',
            'line_group' => 'nullable|string|max:50',
            'group_code' => 'nullable|string|max:50',
            'asset_number' => 'nullable|string|max:50',
            'downtime_tolerance' => 'nullable|integer',
        ]);

        try {
            $engineMaster = new Mesin();
            $engineMaster->name = $request->input('name');
            $engineMaster->warning_dandory_id = $request->input('warning_dandory_id');
            $engineMaster->line = $request->input('line');
            $engineMaster->line_group = $request->input('line_group');
            $engineMaster->group_code = $request->input('group_code');
            $engineMaster->asset_number = $request->input('asset_number');
            $engineMaster->downtime_tolerance = $request->input('downtime_tolerance');
            $engineMaster->created_by = null; 
            $engineMaster->updated_by = null;
    
            $engineMaster->save();
    
            return response()->json(['message' => 'Data berhasil disimpan!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menyimpan data: ' . $e->getMessage()], 402);
        }
    }
}
