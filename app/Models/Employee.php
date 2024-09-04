<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use HasFactory;

    use HasFactory;

    // Nama tabel jika berbeda dengan default 'employees'
    protected $table = 'employees'; 

    // Kolom yang dapat diisi (fillable) melalui mass assignment
    protected $fillable = [
        'npk_siste',
        'npk_akses',
        'name',
        'division',
        'department',
        'section',
        'shift',
        'status',
    ];

    // Kolom yang tidak dapat diisi (guarded)
    protected $guarded = [
        'id', // Sebagai contoh
    ];
}
