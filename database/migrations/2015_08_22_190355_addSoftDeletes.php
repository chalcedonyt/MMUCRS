<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Add softdelete column to all tables
         */
        Schema::table('users', function ($table) {
            $table->softDeletes();
        });
        Schema::table('activities', function ($table) {
            $table->softDeletes();
        });
        Schema::table('activity_participants', function ($table) {
            $table->softDeletes();
        });
        Schema::table('clubs', function ($table) {
            $table->softDeletes();
        });
        Schema::table('club_admins', function ($table) {
            $table->softDeletes();
        });
        Schema::table('club_members', function ($table) {
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
        Schema::table('users', function ($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('activities', function ($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('activity_participants', function ($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('clubs', function ($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('club_admins', function ($table) {
            $table->dropColumn('deleted_at');
        });
        Schema::table('club_members', function ($table) {
            $table->dropColumn('deleted_at');
        });
    }
}
