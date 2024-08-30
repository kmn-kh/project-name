<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function registerNew(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:10|confirmed'
        ]);
        $data = $request->except(["_token", "password_confirmation"]);
        User::create($data);

        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view("register");
    }
    public function showlogin()
    {
        return view("login");
    }
    public function userLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ]);

        $compare = $request->except(["_token"]);
        
        if(auth()->attempt($compare)){
            // Find information of user and create session id to cookie on the browser
            return redirect()->route('dashboard');
        }
        return redirect()->back()->withErrors(['message' => 'Invalid credential']);
    }
    public function showDashboard(){
        return view("dashboard");
    }
    public function logout(){
        auth()->logout();
        return redirect()->route("login");
    }
}
