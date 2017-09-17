<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description');
            $table->date('date');
            $table->time('start');
            $table->time('end');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('eventType_id', false, true);
            $table->foreign('eventTypes_id')->reference('id')->on('event_types')->onDelete('cascade');
            $table->integer('users_id', false, true);
            $table->foreign('users_id')->reference('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
