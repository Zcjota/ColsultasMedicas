<?php

// app/Models/Citas.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citas extends Model
{
    use SoftDeletes,HasFactory;
    protected $table = 'citas';

    protected $fillable = [
        'fecha',
        'hora',
        'motivo_consulta',
        'usuario_id',
        'paciente_id',
        'last_used_at'
    ];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    // Otras relaciones...

    // Ejecutar en la consola:
    // php artisan make:model Citas -m
}
