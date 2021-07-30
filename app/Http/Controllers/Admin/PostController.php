<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post as Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Model::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Model::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        return $model->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        return $model->delete();
    }
}
