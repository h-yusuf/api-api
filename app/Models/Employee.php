<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    use HasFactory;

    use HasFactory;

    protected $table = 'employees'; 

    protected $fillable = [
        'npk_siste',
        'npk_akses',
        'name',
        'division',
        'department',
        'section',
        'date',
        'cin',
        'cout',
        'shift',
        'status',
    ];

    protected $guarded = [
        'id', 
    ];
}
