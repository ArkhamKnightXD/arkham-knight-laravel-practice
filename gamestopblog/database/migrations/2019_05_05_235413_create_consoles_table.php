<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Aqui los campos, agregare los campos successor and predecessor luego mediante migration
        // smallinterger nos es suficiente para almacenar valores en los millones, por lo tanto debo cambiar esta columna
        // por ahora trabajare con text en vez de date en la base de datos para retrasarme con estos problemas
        Schema::create('consoles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('generation');
            $table->string('developer');
            $table->string('type');
            $table->string('best_selling_game');
            $table->integer('units_sold'); 
            $table->string('release_date');
            $table->string('discontinued_year');
            $table->string('lifespan');
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
        Schema::dropIfExists('consoles');
    }
}
