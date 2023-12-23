<?php
// database/factories/CitaFactory.php

namespace Database\Factories;

use App\Models\Citas;
use Illuminate\Database\Eloquent\Factories\Factory;

class CitaFactory extends Factory
{
    protected $model = Citas::class;

    public function definition()
    {
        // Generar una fecha única entre el año 2020 y el año actual
        $fechaCita = $this->faker->dateTimeBetween('2023-01-01', now()->format('Y-m-d'));

        return [
            'fecha' => $fechaCita->format('Y-m-d'),
            'hora' => $this->faker->unique()->time,
            'motivo_consulta' => $this->faker->sentence,
            'usuario_id' => \App\Models\Usuario::factory(),
            'paciente_id' => \App\Models\Paciente::factory(),
            'last_used_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
