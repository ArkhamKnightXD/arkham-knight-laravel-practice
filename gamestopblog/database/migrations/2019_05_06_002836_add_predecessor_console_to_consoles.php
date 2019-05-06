<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPredecessorConsoleToConsoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consoles', function (Blueprint $table) {
            $table->string('predecessor_console');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consoles', function (Blueprint $table) {
            $table->dropColumn('predecessor_console');
        });
    }
}
