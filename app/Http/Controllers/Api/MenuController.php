<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Menu as Resources;
use Illuminate\Http\Request;
use App\Models\Menu as Model;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Resources::collection(Model::paginateFilter($request, 100));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Model  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $menu)
    {
        return $menu->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Model::destroy($id);
    }
}
