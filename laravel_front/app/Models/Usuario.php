<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Support\Facades\Hash;  // Asegúrate de importar Hash
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;
    use TwoFactorAuthenticatable;
    use HasApiTokens;

    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['NombreUsuario', 'password', 'email', 'nombreCompleto', 'fechaRegistro'];

    // Mutador para encriptar la contraseña automáticamente
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value); // Encriptar la contraseña
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
