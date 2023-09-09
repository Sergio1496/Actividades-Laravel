<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [
        'titulo', 'autor', 'año_publicacion', 'género', 'disponible',
    ];

    protected $casts = [
        'disponible' => 'boolean',
    ];
}