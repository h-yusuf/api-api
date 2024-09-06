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
        \Log::info('Request Data:', $request->all()); // Log semua data request
    
        $import_date = now();
        try {
            $file_name = $import_date . '_' . time() . '_karyawan_master' . '.xlsx';
            $jakarta_timezone = Carbon::now()->timezone('Asia/Jakarta');
    
            \Log::info('Before Validate'); // Log sebelum validasi
    
            $request->validate([
                'file' => 'required|mimes:xlsx',
                'upload_remarks' => 'required|string',
            ]);
    
            \Log::info('Validation Passed'); // Log jika validasi berhasil
    
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
                // Move the file to the designated folder

                if (!file_exists(public_path('uploads/employee'))) {
                    mkdir(public_path('uploads/employee'), 777, true);
                }
                
                $filePath = $file->move(public_path('uploads' . DIRECTORY_SEPARATOR . 'employee'), $file_name);
    
                // Import the data using the EmployeeImport class
                Excel::import(new EmployeeImport, $filePath);
    
                return redirect()->back()->with('success', 'Excel file successfully imported');
            } else {
                return redirect()->back()->with('error', 'No file uploaded');
            }
        } catch (\Exception $e) {
            \Log::error('Error during import: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to import Excel file: ' . $e->getMessage()], 500);
        }
    }
    
//     public function karyawanImport(Request $request)
// {
//     $import_date = now();
//     try {
//         // Cek apakah file ada di request
//         if (!$request->hasFile('file')) {
//             return redirect()->back()->with('error', 'No file selected for upload.');
//         }

//         $file = $request->file('file');

//         // Validasi apakah file diunggah dengan benar
//         if (!$file->isValid()) {
//             return redirect()->back()->with('error', 'File upload failed.');
//         }

//         $file_name = $import_date . '_' . time() . '_karyawan_master' . '.xlsx';
//         $jakarta_timezone = Carbon::now()->timezone('Asia/Jakarta');

//         // Simpan log upload
//         Table_Upload_Log::create([
//             'upload_remarks' => $request->upload_remarks,
//             'file_name' => $file_name,
//             'id_table_source' => 1,
//             'created_at' => $jakarta_timezone,
//             'updated_at' => $jakarta_timezone,
//         ]);

//         try {
//             // Import data dari Excel
//             Excel::import(new EmployeeImport, $file);
//         } catch (\Exception $e) {
//             return redirect()->back()->with('error', 'Error during import: ' . $e->getMessage());
//         }

//         // Pindahkan file ke direktori uploads
//         $file->move(public_path('uploads/'), $file_name);

//         return redirect()->back()->with('success', 'Excel file successfully imported');
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Failed to import Excel file: ' . $e->getMessage());
//     }
// }

}
