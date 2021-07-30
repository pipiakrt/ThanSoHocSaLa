<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $rq)
    {
        return Storage::listContents($rq->dir);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createDirectory($directory)
    {
        return Storage::makeDirectory($directory);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->directory) {
            return $this->createDirectory($request->directory);
        }
        if($request->summernote) {
            $name = $request->file->getClientOriginalName();
            $data = File::get($request->file);
            Storage::put($name, $data);
            return Storage::url($name);
        }
        else {
            $files = $request->file;
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $data = File::get($file);
                Storage::put($request->dir . '/' . $name, $data);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Storage::download($request->path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->dir)
            return Storage::deleteDirectory($request->dir);
        else
            return Storage::delete($request->path);
    }
}
