<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CategoryHightlight as Model;
use App\Http\Resources\CategoryHightlight as Resources;
use Illuminate\Http\Request;

class CategoryHightlightController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resources::collection(Model::all());
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Model  $categoryHightlight
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Model::destroy($id);
    }
}
