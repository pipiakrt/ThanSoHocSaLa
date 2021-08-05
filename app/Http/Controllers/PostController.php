<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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
        $posts = Post::orderby('id', 'desc')->where(['type' => 'post', 'status' => 1])->paginate(5);
        return view('tin-tuc', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cauchuyen()
    {
        $posts = Post::orderby('id', 'desc')->where(['type' => 'story', 'status' => 1])->paginate(5);
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
        if ($post) {
            $posts = Post::orderby('id', 'desc')->where(['category_id' => $post->category_id, 'type' => $post->type, 'status' => 1])->take(7)->get();
            return view('tin-tuc-chi-tiet', compact(['post', 'posts']));
        }
        else {
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $posts = Post::where('category_id', $category->id)->paginate(5);
                return view('tin-tuc', compact('posts'));
            }
        }
        return view('errors.404');
    }
}
