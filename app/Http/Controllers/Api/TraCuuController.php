<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TraCuu as Model;
use App\Http\Resources\TraCuu as Resources;

class TraCuuController extends Controller
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
        //
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
     * @param  \App\Models\TraCuu  $traCuu
     * @return \Illuminate\Http\Response
     */
    public function show(TraCuu $traCuu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TraCuu  $traCuu
     * @return \Illuminate\Http\Response
     */
    public function edit(TraCuu $traCuu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TraCuu  $traCuu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TraCuu $traCuu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TraCuu  $traCuu
     * @return \Illuminate\Http\Response
     */
    public function destroy(TraCuu $traCuu)
    {
        //
    }
}
