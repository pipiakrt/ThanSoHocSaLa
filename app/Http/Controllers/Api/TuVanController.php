<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TuVan as Model;
use Illuminate\Http\Request;
use App\Http\Resources\TuVan as Resources;

class TuVanController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(Model::class);
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resources::collection(Model::orderby('id', 'DESC')->paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TuVan  $tuVan
     * @return \Illuminate\Http\Response
     */
    public function show(TuVan $tuVan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TuVan  $tuVan
     * @return \Illuminate\Http\Response
     */
    public function edit(TuVan $tuVan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TuVan  $tuVan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TuVan $tuVan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TuVan  $tuVan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TuVan $tuVan)
    {
        //
    }
}
