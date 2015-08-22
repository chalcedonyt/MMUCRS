<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct(){

    }
    
    /**
     * @param Model An eloquent model to use for queries
     */
    protected $model;

    /**
     * @param Transformer a Fractal transformer to transform output
     */
    protected $transformer;


    protected function setModel($model){
        $this -> model = $model;
    }

    protected function setTransformer( $transformer ){
        $this -> transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $items = \ApiHandler::parseMultiple( $this -> model ) -> getResult();
        return \Fractal::collection( $items, $this -> transformer ) -> getArray();
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
        $item = \ApiHandler::parseSingle( $this -> model, $id ) -> getResult();
        return \Fractal::item( $item, $this -> transformer ) -> getArray();
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
