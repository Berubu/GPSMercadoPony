<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('idCompra');
            $table->timestamp('fechaCompra')->useCurrent();
            $table->decimal('total', 10, 2);
            $table->foreignId('idUsuario')->constrained('usuarios', 'idUsuario'); // Asegúrate de referenciar 'idUsuario'
            $table->foreignId('idProducto')->constrained('productos', 'idProducto');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
