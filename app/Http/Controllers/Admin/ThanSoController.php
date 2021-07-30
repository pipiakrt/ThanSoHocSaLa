<?php

namespace App\Http\Controllers\Admin;

use App\Models\ThanSo as Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThanSoController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        return $model;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $model)
    {
        return Model::update($request->all());
    }
}
