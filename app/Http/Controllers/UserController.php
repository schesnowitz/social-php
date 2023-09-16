<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function logout() {
        auth()->logout();
        return redirect('/')->with('success_msg', 'You have logged out successfully.');;
    }
    public function showIndex() {
        if (auth()->check()) {
            return view('index-feed'); 
        } else {
            return view('index');
        }
        
    }


    public function register(Request $request) {
        $formFields = $request->validate([
            'username' => ['required', 'min:3', 'max:22', Rule::unique('users', 'username')],
            'email' => ['required', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed'], 
        ]);
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        
        auth()->login($user); 
        return redirect('/')->with('success_msg', 'Welcome, you have signed up successfully.');
    }

    public function login(Request $request) {
        $formFields = $request->validate([
            'loginusername' => ['required'],
            'loginpassword' => ['required']
        ]);

        if (auth()->attempt(['username' => $formFields['loginusername'], 'password' => $formFields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success_msg', 'Welcome, you have logged in successfully.');
        } else {
            return redirect('/')->with('error_msg', 'There is a problem with your password/email combination.');;
        }
        

    }
}
