<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $table = 'mascotas';

    protected $fillable = [
        'slug',
        'nombre',
        'tipo',
        'edad',
        'fecha_nacimiento',
        'sexo',
    ];

    protected function casts()
    {
        return [
            'fecha_nacimiento' => 'date'
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
