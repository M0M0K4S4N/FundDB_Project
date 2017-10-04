<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return $posts;
        return view('posts.index', [
          'title' => 'Post',
          'posts' => $posts
        ]);
    }
    public function view($id)
    {
        //$posts = Post::where('id' ,$id)->get();
        $posts = Post::findOrFail($id);
        $posts = [$posts];
        //return $posts;

        return view('posts.view', [
          'title' => 'View Post',
          'posts' => $posts
        ]);
    }
}
