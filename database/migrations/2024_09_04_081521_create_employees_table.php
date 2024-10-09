<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->integer('npk_siste')->unique();  // Kolom NPK SISTE
                $table->string('npk_akses')->unique();   // Kolom NPK Akses
                $table->string('name');                  // Kolom NAME
                $table->string('division')->nullable();              // Kolom DIVISI
                $table->string('department')->nullable();            // Kolom DEPT
                $table->string('section')->nullable();               // Kolom SECTION
                $table->string('shift')->nullable();    
                $table->date('date')->nullable();                 // Kolom SHIFT
                $table->time('cout')->nullable();  
                $table->time('cin')->nullable();                 // Kolom SHIFT
                $table->string('status')->nullable();                // Kolom STAT
                $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
