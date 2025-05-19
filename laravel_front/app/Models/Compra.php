<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras'; // Nombre de la tabla

    protected $primaryKey = 'idCompra'; // Clave primaria

    public $timestamps = false; // Si la tabla no tiene los campos `created_at` y `updated_at`

    protected $fillable = [
        'fechaCompra',
        'total',
        'idUsuario',
        'idProducto',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}
