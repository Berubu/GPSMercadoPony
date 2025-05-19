<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('idUsuario');
            $table->string('NombreUsuario')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('nombreCompleto');
            $table->timestamp('fechaRegistro')->useCurrent();
            $table->integer('estrellas')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
