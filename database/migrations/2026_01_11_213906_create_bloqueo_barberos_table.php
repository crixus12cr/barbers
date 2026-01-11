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
        Schema::create('bloqueo_barberos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barbero_id')->constrained('barberos')->onDelete('cascade');
            $table->date('fecha');
            $table->time('hora_inicio')->nullable();
            $table->time('hora_fin')->nullable();
            $table->string('motivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bloqueo_barberos');
    }
};
