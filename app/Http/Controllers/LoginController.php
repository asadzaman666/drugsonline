<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Medicine;
use \App\Category;
use \App\Admin;

class LoginController extends Controller
{
    public function index(){

        $med = Medicine::all();
        $cat = Category::all();

        return view('signin.index')
            ->with('med', $med)
            ->with('cat', $cat);
    }

    public function home(Request $request){

        $user = User::where('username', '=', $request->username)
            ->where('password', '=', $request->password)
            ->first();

        $admin = Admin::where('email', '=', $request->username)
            ->where('password', '=', $request->password)
            ->first();

        if($user){

            $request->session()->put('user', $user);
            $request->session()->put('usertype', 'user');

            return redirect()->route('home.index');
        }

        elseif($admin){

            $request->session()->put('user', $admin);
            $request->session()->put('usertype', 'admin');

            return redirect()->route('home.index');
        }

        else{

            $request->session()->flash('login_error', 'Invalid username or password!');

            return back();
        }
    }
}
