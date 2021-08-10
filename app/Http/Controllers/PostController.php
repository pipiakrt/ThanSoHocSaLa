<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderby('id', 'desc')->where(['type' => 'post', 'status' => 1])->paginate(7);
        return view('tin-tuc', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hoidap()
    {
        $posts = Post::orderby('id', 'desc')->where(['type' => 'qa', 'status' => 1])->paginate(7);
        return view('hoi-dap', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cauchuyen()
    {
        return view('cau-chuyen');
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
            $posts = Post::orderby('id', 'desc')->where([['id', '<', $post->id], 'type' => $post->type, 'category_id' => $post->category_id, 'status' => 1])->take(7)->get();
            $chuyenmuc = [];
            foreach ($post->Tags as $value) {
                array_push($chuyenmuc, $value);
            }
            return view('tin-tuc-chi-tiet', compact(['post', 'posts', 'chuyenmuc']));
        }
        else {
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $posts = Post::where('category_id', $category->id)->paginate(5);
                return view('tin-tuc', compact(['posts', 'category']));
            }
        }
        return view('errors.404');
    }
}
