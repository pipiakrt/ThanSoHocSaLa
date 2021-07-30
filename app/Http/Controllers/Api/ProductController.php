<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Product as Resources;
use App\Http\Requests\Api\Product\Store;
use App\Models\Product as Model;
use App\Models\Suggestion;
use App\Models\Product as Category;

class ProductController extends Controller
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
    public function index(Request $request)
    {
        return Resources::collection(Model::paginateFilter($request));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Model::create($request->all());
        $suggestion = [];
        foreach ($request->suggestion_id as $id) {
            array_push($suggestion, ['product_id' => $id, 'relate_id' => $product->_id]);
        }
        return Suggestion::insert($suggestion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model $product)
    {
        return new Resources($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model $product)
    {
        $product->update($request->all());
        $product->Suggestion()->delete();
        $suggestion = [];
        foreach ($request->suggestion_id as $id) {
            array_push($suggestion, ['product_id' => $id, 'relate_id' => $product->_id]);
        }
        return Suggestion::insert($suggestion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Model::destroy($request->id);
    }
}
