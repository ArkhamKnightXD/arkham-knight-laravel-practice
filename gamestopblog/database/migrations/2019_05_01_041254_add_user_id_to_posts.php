<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToPosts extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        // En la funcion up se pone los campos que queremos agregar a la tabla y se agregaran cuando ejecutemos de nuevo el comando migration
        Schema::table('posts', function (Blueprint $table) {
            
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // aqui especificamos la accion que se tomara para devolver todo para atras que basicamente seria borrar la nueva columna que establecimos ahi arriba
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
