<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function phone(){
        // Relacion uno a uno

        // Esta es la forma que se una por convenciones de laravel, en este caso esta tomando como llave foranea el campo user_id, y como primaria id
        return $this->hasOne(Phone::class);

        // En el caso que se deseen cambiar, se puede delimitar dentro del mismo metodo como segundo y tercer parametro:
        //  Segundo: Llave foranea
        //  Tercero: Llave primaria
        return $this->hasOne(Phone::class, 'user_id', 'id');
    }
}
