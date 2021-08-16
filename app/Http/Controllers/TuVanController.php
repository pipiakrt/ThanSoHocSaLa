<?php

namespace App\Http\Controllers;

use App\Models\TuVan as Model;
use Illuminate\Http\Request;

class TuVanController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Model::create($request->all());
        return redirect('/hoi-dap/huong-dan-cach-mua-hang-tren-thansohocsalacom');
    }
}
