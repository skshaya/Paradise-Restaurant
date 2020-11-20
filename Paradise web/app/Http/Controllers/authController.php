<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class authController extends Controller
{
    public function signIn(Request $request) {
    	$email = $request->input('email');
    	$password = $request->input('password');
    	if(Auth::attempt(['email' => $email, 'password' => $password])){
    		return redirect('/admin/orders');
    	} else {
    		return back()->with('error','Invalid email or password!');
    	}
    }
}
