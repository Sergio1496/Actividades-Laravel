<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'book_id', 'fecha_prestamo', 'fecha_devolucion', 'devuelto',
    ];

    protected $casts = [
        'devuelto' => 'boolean',
    ];

    /* public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    } */

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'book_id');
    }
}