<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:3', 'max:22', Rule::unique('users', 'username')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'], 
            

        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        User::create($formFields);
        return "Hello Reguster";
    }
}
