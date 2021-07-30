<?php

namespace App\Http\Controllers;

use App\Models\ThanSo;
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
        return view('tracuu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ThanSo  $thanSo
     * @return \Illuminate\Http\Response
     */
    public function ketqua(Request $request)
    {
        return view('ketquatracuu');
    }
}
