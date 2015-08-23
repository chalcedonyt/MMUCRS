<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueKeysToClubMemberAndAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Make unique keys
         */
        Schema::table('club_admins', function ($table) {
            $table->unique(['club_id','user_id']);
        });
        Schema::table('club_members', function ($table) {
            $table->unique(['club_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_admins', function ($table) {
            $table->dropUnique('club_admins_club_id_user_id_unique');
        });
        Schema::table('club_members', function ($table) {
            $table->dropUnique('club_members_club_id_user_id_unique');
        });

    }
}
