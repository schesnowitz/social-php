<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function index() {
        return '<h1>Welcome</h1><a href="/about">Take Me to About</a>';
    } 

    public function about() {
        return '<h1>About</h1><a href="/">Take Me Home</a>';
    } 
}
