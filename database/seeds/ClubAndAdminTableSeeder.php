<?php

use Illuminate\Database\Seeder;

class ClubAndAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create a club
         */
        $club = factory(App\Club::class) -> create();
        /**
         * Create two users
         */
        $users = factory(App\User::class, 2) -> create();

        /**
         * Assign these users to the club as admins
         */
         foreach( $users as $user ){
             App\ClubAdmin::create([
                 'club_id' => $club -> id,
                 'user_id' => $user -> id]);
         }

         /**
          * Create an activity and assign it to the club
          */
          $activities = factory(App\Activity::class, 4) -> create([
              'club_id' => $club -> id
          ]);

          /**
           * Create some kelefehs
           */
          $users = factory(App\User::class, 2) -> create();

          /**
           * Assign these users to the club as members
           */
           foreach( $users as $user ){
               App\ClubMember::create([
                   'club_id' => $club -> id,
                   'user_id' => $user -> id]);
           }

           /**
            * Assign these users to the activity
            */
            foreach( $users as $user ){
                App\ActivityParticipant::create([
                    'activity_id' => $activities -> random() -> id,
                    'user_id' => $user -> id]);
            }

    }
}
