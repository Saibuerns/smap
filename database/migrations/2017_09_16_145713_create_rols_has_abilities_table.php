<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolsHasAbilitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rols_has_abilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rols_id', false, true);
            $table->integer('abilities_id', false, true);
            $table->foreign('rols_id')->references('id')->on('rols')->onDelete('cascade');
            $table->foreign('abilities_id')->references('id')->on('abilities')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols_has_abilities');
    }
}
