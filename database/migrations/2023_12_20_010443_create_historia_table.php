<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_elaboracion');
            $table->time('hora');
            $table->string('descripcion');
            $table->string('diagnostico');
            $table->string('tratamiento');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->foreignId('paciente_id')->constrained('pacientes');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historias');
    }
};
