<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Table_Upload_Log extends Model
{
    use HasFactory, LogsActivity;
    protected $table = "Table_Upload_Log";
    protected $primaryKey = "id_table_upload";
    protected $guarded = ['id_table_upload'];
    public $timestamps = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
                ->logOnly([
                    'file_name', 
                    'upload_remarks',
                    'id_table_source',
                ])
                ->setDescriptionForEvent(fn(string $eventName) => "This model has been {$eventName}")
                ->useLogName('Table_Upload_Log');
    }
}
