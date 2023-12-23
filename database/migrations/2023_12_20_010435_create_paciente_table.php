<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('sexo', ['M', 'F']);
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->integer('id_num')->unique();
            $table->string('aseguradora');
            $table->string('email');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('otros');
            $table->string('foto');
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamp('last_used_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
};
