<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
     public function index()
     {
         $activities =  \App\Activity::with('club','club.admins') -> get();
         foreach( $activities as $activity ){
             foreach( $activity -> club -> admins as $admin ){
                 unset( $admin -> gender);
                 unset( $admin -> dob);
                 unset( $admin -> pivot);
             }
         }
         return $activities;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
     public function show($id)
     {
         $activity = \App\Activity::with('club','club.admins')
         -> find($id);
     
         foreach( $activity -> club -> admins as $admin ){
             unset( $admin -> gender);
             unset( $admin -> dob);
             unset( $admin -> pivot);
         }
         return $activity;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
