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
        Schema::create('registrarse_solicitudes_rechazadas', function (Blueprint $table) {
            $table->id('id_solicitud_rechazada');
            $table->foreignId('solicitud_id')->constrained('registrarse_solicitudes', 'idregistrarse_solicitud')->onUpdate('cascade')->onDelete('cascade');
            $table->text('motivo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrarse_solicitudes_rechazadas');
    }
};
