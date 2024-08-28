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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('marca', 45); // Marca del dispositivo
            $table->string('modelo', 45); // Modelo del dispositivo
            $table->string('imei', 45); // IMEI del dispositivo
            $table->foreignId('cliente_id'); // ID_Cliente como clave foránea
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
