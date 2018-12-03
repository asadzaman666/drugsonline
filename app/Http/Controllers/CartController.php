<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use \App\User;
use \App\Medicine;
use \App\Category;

class CartController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::all();

        if(session()->has('user')){

            return view('cart')
                ->with('cat', $cat)
                ->with('currentUser', session('user'));
        }
        else{

            return view('cart')
                ->with('cat', $cat);

        }

    }

    /**display cart**/
    public function checkout(){

        $cat = Category::all();

        if(Cart::count() <= 0){

            return back();
        }
        else {

            if(session()->has('user')){

                return view('checkout')
                    ->with('cat', $cat)
                    ->with('currentUser', session('user'));
            }
            else{

                return view('signin.index')
                    ->with('cat', $cat);

            }
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Cart::add($request->id, $request->name, $request->quantity, $request->price, ['contains' => $request->contains, 'form' => $request->form])
            ->associate('App\Medicine');

            $request->session()->flash('added_to_cart', 'Item was added to your cart');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        Cart::destroy();

        return back();
    }


}
