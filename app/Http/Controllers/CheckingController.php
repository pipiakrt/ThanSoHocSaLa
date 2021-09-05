<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checking as Model;

class CheckingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Model::create([
            "ip" => $request->ip(),
            "url" => $request->url,
            "screen" => $request->screen,
            "device" => $request->device,
            "browser" => $request->browser,
            "user_id" => $request->user() ? $request->user()->id : null,
        ]);
    }
}
