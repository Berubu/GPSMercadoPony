<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateVistaProductosPrecioAlto extends Migration
{
    public function up()
    {
        DB::statement("
            CREATE VIEW vista_productos_precio_alto AS
            SELECT \"idProducto\", \"nombreProducto\", \"precio\", \"fechaPublicacion\", \"idUsuario\"
            FROM productos
            WHERE precio > 101.00
        ");
    }

    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS vista_productos_precio_alto");
    }
}
