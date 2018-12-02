<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicine;
use App\Category;

class DefaultController extends Controller
{
    public function index(){

        $med = Medicine::all();
        $cat = Category::all();

        // dd( $med->category['name']);
        if(session()->has('user')){

            return redirect()->route('home.index');
        }
        else{

            return view('welcome')
                ->with('med', $med)
                ->with('cat', $cat);
        }

    }

    public function about(){

        $med = Medicine::all();
        $cat = Category::all();

        return view('about')
            ->with('med', $med)
            ->with('cat', $cat)
            ->with('currentUser', session('user'));
    }
}
