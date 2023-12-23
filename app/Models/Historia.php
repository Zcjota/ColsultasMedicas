<?php

// app/Models/Historia.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Historia extends Model
{
    use SoftDeletes,HasFactory;
    protected $table = 'historias';

    protected $fillable = [
        'fecha_elaboracion',
        'hora',
        'descripcion',
        'diagnostico',
        'tratamiento',
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

    public function recetario(): HasOne
    {
        return $this->hasOne(Recetario::class);
    }

    // Otras relaciones...

    // Ejecutar en la consola:
    // php artisan make:model Historia -m
}
