<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create_post(Request $request) {
        $post_form_data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post_form_data['title'] = strip_tags($post_form_data['title']);
        $post_form_data['body'] = strip_tags($post_form_data['body']);
        $post_form_data['user_id'] = auth()->id();
        // $post_form_data['user_id'] = 1;

        Post::create($post_form_data);
        // error_log($post_form_data['user_id']);6


        return('create-post');
    }
    public function show_form_create_post() {
        return view('create-post');
    }
}
