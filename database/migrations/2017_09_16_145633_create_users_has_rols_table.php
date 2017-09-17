<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersHasRolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_has_rols', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id', false, true);
            $table->integer('rols_id', false, true);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rols_id')->references('id')->on('rols')->onDelete('cascade');
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
        Schema::dropIfExists('users_has_rols');
    }
}
