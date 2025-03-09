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
        Schema::create('registrarse_solicitudes', function (Blueprint $table) {
            $table->id('idregistrarse_solicitud');
            $table->integer('categoria_id');
            $table->string('codigo', 5);
            $table->string('correo_electronico', 40);
            $table->string('nro_telefono', 15);
            $table->string('foto_cedula_delante');
            $table->string('foto_cedula_atras');
            $table->string('foto_cedula_selfie');
            $table->enum('estado', ['En proceso', 'Aceptado', 'Rechazado']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrarse_solicitudes');
    }
};
