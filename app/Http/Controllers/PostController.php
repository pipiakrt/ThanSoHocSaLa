<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->where('type', 'post')->paginate(5);
        return view('tin-tuc', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cauchuyen()
    {
        $posts = Post::orderby('id', 'desc')->where('type', 'story')->paginate(5);
        return view('cau-chuyen', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $posts = Post::orderby('id', 'desc')->where('id', '<', $post->id)->take(7)->get();
        if ($post) {
            return view('tin-tuc-chi-tiet', compact(['post', 'posts']));
        }
        else {
            return view('errors.404');
        }
    }
}
