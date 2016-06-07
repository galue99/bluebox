<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsuariosCms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_cms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login')->unique();
            $table->string('password', 60);
            $table->string('re_password', 60);
            $table->string('nombre');
            $table->string('permisos');
            $table->string('email')->unique();
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
        Schema::drop('usuarios_cms');
    }
}
