<?php
// database/factories/PacienteFactory.php

namespace Database\Factories;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'sexo' => $this->faker->randomElement(['M', 'F']),
            'fecha_nacimiento' => $this->faker->date,
            'edad' => $this->faker->numberBetween(1, 100),
            'id_num' => $this->faker->unique()->randomNumber,
            'aseguradora' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'domicilio' => $this->faker->address,
            'telefono' => $this->faker->phoneNumber,
            'otros' => $this->faker->sentence,
            'foto' => $this->faker->imageUrl(),
            'usuario_id' => \App\Models\Usuario::factory(),
            'last_used_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
