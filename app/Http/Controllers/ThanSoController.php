<?php

namespace App\Http\Controllers;

use App\Models\ThanSo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $params = $request->only('name', 'birthday');
        $response = Http::get('https://api.thansohocsala.com/luan-giai', $params);
        $data = $response->json();

        return view('ketquatracuu', compact(['data', 'params']));
    }
}
