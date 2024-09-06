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
        Schema::create('engine_master', function (Blueprint $table) {
            $table->id(); 
            $table->string('name', 250)->nullable();
            $table->bigInteger('warning_dandory_id')->nullable()->index();
            $table->string('line', 255)->nullable();
            $table->string('line_group', 50)->nullable();
            $table->string('group_code', 50)->nullable();
            $table->string('asset_number', 50)->nullable();
            $table->integer('downtime_tolerance')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            
            $table->index('id', 'idx_station_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engine_master');
    }
};
