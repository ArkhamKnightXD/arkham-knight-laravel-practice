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
        Schema::create('consoles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('generation');
            $table->string('developer');
            $table->string('type');
            $table->smallinteger('best_selling_game');
            $table->smallinteger('units_sold');
            $table->date('release_date');
            $table->date('discontinued_year');
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
