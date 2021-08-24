<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Danhmuc;
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
        $type = "";
        if (request()->segment(1) == 'tin-tuc') {
            $type = "post";
        }
        else if (request()->segment(1) == 'gioi-thieu') {
            $type = "introduce";
        }
        else if (request()->segment(1) == 'dich-vu') {
            $type = "service";
        }
        else if (request()->segment(1) == 'hoi-dap') {
            $type = "qa";
        }
        $post = Post::where(['slug' => $slug, 'type' => $type])->first();
        if ($post) {
            $posts = Post::orderby('id', 'desc')->where([['id', '<', $post->id], 'type' => $type, 'category_id' => $post->category_id, 'status' => 1])->take(7)->get();
            if ($posts->count() < 3) {
                $posts = Post::orderby('id', 'desc')->where([['id', '>', $post->id], 'type' => $type, 'category_id' => $post->category_id, 'status' => 1])->take(7)->get();
            }
            $chuyenmuc = [];
            foreach ($post->Tags as $value) {
                array_push($chuyenmuc, $value);
            }
            return view('tin-tuc-chi-tiet', compact(['post', 'posts', 'chuyenmuc']));
        }
        else {
            $category = Category::where('slug', $slug)->first();
            if ($category) {
                $posts = Post::orderby('id', 'desc')->where('category_id', $category->id)->paginate(5);
                return view('tin-tuc', compact(['posts', 'category']));
            }
            else {
                $tag = Tag::where('name', $slug)->first();
                $posts = $tag->Posts()->paginate(5);
                return view('tin-tuc', compact(['posts']));
            }
        }
        return view('errors.404');
    }
}
