<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    use HasFactory;

    protected $table = 'engine_master';
    
    protected $fillable = [
        'name',
        'warning_dandory_id',
        'line',
        'line_group',
        'group_code',
        'asset_number',
        'downtime_tolerance',
        'created_by',
        'updated_by',
    ];

    protected $guarded = [];

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'bigint';

    protected $casts = [
        'id' => 'integer',
        'warning_dandory_id' => 'integer',
        'downtime_tolerance' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];
    public $timestamps = true;
}
