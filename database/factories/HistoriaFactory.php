<?php

// database/factories/HistoriaFactory.php

namespace Database\Factories;

use App\Models\Historia;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoriaFactory extends Factory
{
    protected $model = Historia::class;

    public function definition()
    {
        // Generar una fecha única
        $fechaElaboracion = $this->faker->dateTimeBetween('2023-01-01', now()->format('Y-m-d'));

        return [
            'fecha_elaboracion' => $fechaElaboracion->format('Y-m-d'),
            'hora' => $this->faker->unique()->time,
            'descripcion' => $this->faker->paragraph,
            'diagnostico' => $this->faker->sentence,
            'tratamiento' => $this->faker->sentence,
            'usuario_id' => \App\Models\Usuario::factory(),
            'paciente_id' => \App\Models\Paciente::factory(),
            'last_used_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
