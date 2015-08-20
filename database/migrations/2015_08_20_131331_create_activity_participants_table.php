<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_participants', function (Blueprint $table) {
            $table->increments('id');
            $table -> integer('user_id') -> unsigned();
            $table -> integer('activity_id') -> unsigned();
            $table -> foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
            $table -> foreign('activity_id') -> references('id') -> on('activities') -> onDelete('cascade');
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
        Schema::drop('activity_participants');
    }
}
