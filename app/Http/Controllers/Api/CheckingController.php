<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checking;
use Illuminate\Http\Request;
use App\Http\Resources\Checking as Resources;

class CheckingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resources::collection(Checking::paginate());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checking  $checking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checking $checking)
    {
        return $checking->delete();
    }
}
