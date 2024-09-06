<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Table_Upload_Log', function (Blueprint $table) {
            $table->id('id_table_upload');  
            $table->string('file_name');  
            $table->string('upload_remarks')->nullable();  
            $table->integer('id_table_source')->nullable();  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Table_Upload_Log');
    }
};
