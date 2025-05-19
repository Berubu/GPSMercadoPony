<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id('idProducto');
            $table->string('nombreProducto');
            $table->text('descripcion');
            $table->decimal('precio', 10, 2);
            $table->date('fechaPublicacion');
            $table->foreignId('idUsuario')->constrained('usuarios', 'idUsuario'); // Referencia correcta
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
