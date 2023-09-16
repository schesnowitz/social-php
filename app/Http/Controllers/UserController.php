<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request) {
        $formFields = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            

        ]);
        User::create($formFields);
        return "Hello Reguster";
    }
}
