<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function delete(Post $post) {


     $post->delete();
        return redirect("/profile/". auth()->user()->username)->with('success_msg', "Post \"" . $post['title'] . "\" has been deleted.");

        // $cannot_delete = auth()->user()->cannot('delete', $post_data);
        // if ($cannot_delete) {
        //     return "You can't do that!";
        // } else {
        //     $post_data->delete();
        //     return redirect("/profile/". auth()->user()->username)->with('success_msg', "Post \"" . $post_data['title'] . "\" has been deleted.");
        // }
        

    }

    public function show_edit_form(Post $post) {
        
        return view('/edit-post', ['post' => $post]);
    }

    public function save_edit_form(Post $post, Request $request) {
        $form_fields = $request->validate([
            "title" => "required",
            "body" => "required"
        ]);
        $form_fields['title'] = strip_tags($form_fields['title']);
        $form_fields['body'] = strip_tags($form_fields['body']);

        $post->update($form_fields);

        return redirect("/post/{$post->id}")->with('success_msg', "This post has been updated.");
    }


    public function show_form_create_post() {
        return view('/create-new-post');
    }


    public function show_post(Post $post_data) { 
        // ddd($post_data->user);
        // ddd($post_data);
        $post_data['body'] = Str::markdown($post_data->body);
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
