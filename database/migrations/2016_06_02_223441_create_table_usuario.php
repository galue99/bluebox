<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('password', 60);
            $table->string('re-password', 60);
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('doc_identidad');
            $table->string('telefono');
            $table->string('celular');
            $table->string('calle');
            $table->string('numero');
            $table->string('edificio');
            $table->string('apto');
            $table->string('sector');
            $table->string('provincia');
            $table->string('nombre_sec');
            $table->string('apellido_sec');
            $table->string('doc_identidad_sec');
            $table->date('fecha_nacimiento');
            $table->string('foto');
            $table->integer('zona');
            $table->integer('categoria');
            $table->string('nombre_tutor');
            $table->string('apellido_tutor');
            $table->string('nickname');
            $table->integer('activo');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usuario');
    }
}
