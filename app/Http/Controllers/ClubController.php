<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\BaseController;


class ClubController extends BaseController
{

    public function __construct(){
        parent::__construct();
        $this -> setModel(new \App\Club);
        $this -> setTransformer( new \App\Transformers\ClubTransformer );
        $this -> setRequestValidator( new \App\Http\Requests\ClubRequest );
    }


    /**
     * Removes an admin from a Club
     */
     public function destroyAdmin( Request $request )
     {
         $club = \App\Club::find($request -> input('club_id'));
         $admin = \App\User::find($request -> input('user_id'));
         $club -> admins() -> detach($admin -> id);
         return \Fractal::collection( $club -> admins, new \App\Transformers\AdminTransformer ) -> getArray();
     }

     /**
      * Adds a new admin to the Club
      */
     public function storeAdmin(Request $request){
         $this -> setRequestValidator( new \App\Http\Requests\StoreClubAdminRequest );
         $this -> validateRequest($request);

         $club = \App\Club::find($request -> input('club_id'));
         $admin = \App\User::find($request -> input('user_id'));
         $club -> admins() -> attach($admin -> id);
         return \Fractal::collection( $club -> admins, new \App\Transformers\AdminTransformer ) -> getArray();
     }

    /**
     * Removes a member from a Club
     */
    public function destroyMember(Request $request ){
        $club = \App\Club::find($request -> input('club_id'));
        $member = \App\User::find($request -> input('user_id'));
        $club -> members() -> detach($member -> id);
        return \Fractal::collection( $club -> members, new \App\Transformers\UserTransformer ) -> getArray();
    }

    /**
     * Adds a new member to the Club
     */
    public function storeMember(Request $request){
        $this -> setRequestValidator( new \App\Http\Requests\StoreClubMemberRequest );
        $this -> validateRequest($request);

        $club = \App\Club::find($request -> input('club_id'));
        $member = \App\User::find($request -> input('user_id'));
        $club -> members() -> attach($member -> id);
        return \Fractal::collection( $club -> members, new \App\Transformers\UserTransformer ) -> getArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return parent::store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return parent::show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return parent::update( $request, $id );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return parent::destroy($id);
    }
}
