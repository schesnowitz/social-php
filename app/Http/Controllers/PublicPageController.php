<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function index() {
        $name = "Driver";
        $someList = ['item a', 2354, 'item b'];

        return view('index', ['listOfStuff' => $someList,"name" => $name, "message" => "Is the Bestes of the guys!"]);
    } 

    public function about() {
        return view('single-post');
    } 
}
