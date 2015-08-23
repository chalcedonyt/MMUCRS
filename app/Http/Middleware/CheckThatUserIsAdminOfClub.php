<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;

class CheckThatUserIsAdminOfClub
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     /**
      * To be used on routes that have a club_id
      */
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $club_id = $request -> input('club_id');

        $valid_clubs = $user -> adminOfClubs -> filter( function( $club ) use( $club_id ){
            return $club -> id == $club_id;
        });

        if( $valid_clubs -> count() )
            return $next($request);
        else return response()->json(['You are not allowed to administer this club'], 401);
    }
}
