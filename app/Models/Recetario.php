<?php

// app/Models/Recetario.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
class Recetario extends Model
{
    use SoftDeletes,HasFactory;
    protected $table = 'recetarios';

    protected $fillable = [
        'historia_id',
        'last_used_at'
    ];

    public function historia(): BelongsTo
    {
        return $this->belongsTo(Historia::class);
    }

    // Ejecutar en la consola:
    // php artisan make:model Recetario -m
}
