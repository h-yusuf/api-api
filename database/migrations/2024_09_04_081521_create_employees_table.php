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
                $table->string('division');              // Kolom DIVISI
                $table->string('department');            // Kolom DEPT
                $table->string('section');               // Kolom SECTION
                $table->string('shift');                 // Kolom SHIFT
                $table->string('status');                // Kolom STAT
                $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
