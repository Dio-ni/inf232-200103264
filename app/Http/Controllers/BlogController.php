<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index(){
        $post = Post::all();

        return view('blog.index')->with(['post' => $post]);
    }

    public function store(Request $request){
        Post::create([
            'title'=> $request->title,
            'body' => $request->body,
            'email'=>$request->email
        ]);   
        return back();
    }
    public function get_post($id){
        $post = Post::find($id);

        if($post == null)
            return response(['message' => 'post not found'], 404);
        
        return view('blog.detail')->with(['post'=>$post]);
    }
}
