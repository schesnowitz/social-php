<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function show_form_create_post() {
        return view('/create-new-post');
    }


    public function show_post(Post $post_data) { 
        return view('single-post', ['post' => $post_data]);
    }


    public function create_post(Request $request) {
        $post_form_data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post_form_data['title'] = strip_tags($post_form_data['title']);
        $post_form_data['body'] = strip_tags($post_form_data['body']);
        $post_form_data['user_id'] = auth()->id();
        // $post_form_data['user_id'] = 1;

        $created_post = Post::create($post_form_data);
        // error_log($post_form_data['user_id']);6


        return redirect("/post/{$created_post->id}")->with("success_msg", "Here is your new post!");
    }

}
