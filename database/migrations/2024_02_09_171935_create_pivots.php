<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pivots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_students')->constrained('students')->cascadeOnDelete();
            $table->foreignId('id_classe')->constrained('classes')->cascadeOnDelete();
            $table->string('anneAcademique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivots');
    }
};
