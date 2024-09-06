<?php
namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Models\Table_Upload_Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportFileController extends Controller
{
    public function karyawanImport(Request $request)
    {
        \Log::info('Request Data:', $request->all());
    
        try {
            if (!file_exists(public_path('uploads/employee'))) {
                mkdir(public_path('uploads/employee'), 0755, true);
            }
            
            $import_date = now()->format('Y-m-d_H-i-s'); 
            $file_name = $import_date . '_' . time() . '_karyawan_master' . '.xlsx';
            
            $jakarta_timezone = Carbon::now()->timezone('Asia/Jakarta');
    
            \Log::info('Before Validate'); 
    
            $request->validate([
                'file' => 'required|mimes:xlsx',
                'upload_remarks' => 'required|string',
            ]);
    
            \Log::info('Validation Passed'); 
    
            // Log upload data
            Table_Upload_Log::create([
                'upload_remarks' => $request->upload_remarks,
                'file_name' => $file_name,
                'id_table_source' => 1,
                'created_at' => $jakarta_timezone,
                'updated_at' => $jakarta_timezone,
            ]);
    
            \Log::info('Data Logged to Table_Upload_Log');
            
            if ($request->hasFile('file')) {
                $file = $request->file('file');

                if (!file_exists(public_path('uploads/employee'))) {
                    mkdir(public_path('uploads/employee'), 777, true);
                }
                
                $filePath = $file->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'employee'), $file_name);
    
                Excel::import(new EmployeeImport, $filePath);
    
                return response()->json(['message' => 'Excel file successfully imported'], 200); 
            } else {
                return response()->json(['error' => 'No file uploaded'], 400);
            }
        } catch (\Exception $e) {
            \Log::error('Error during import: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to import Excel file: ' . $e->getMessage()], 401); 
        }
    }
}
