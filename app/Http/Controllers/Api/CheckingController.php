<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Checking as Model;
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
        return Resources::collection(Model::orderby("id", "DESC")->simplePaginate());
    }
}
