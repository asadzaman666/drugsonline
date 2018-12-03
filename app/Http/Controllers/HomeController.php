<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Medicine;
use App\Category;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $med = Medicine::all();
        $cat = Category::all();

        return view('welcome')
            ->with('currentUser', session('user'))
            ->with('med', $med)
            ->with('cat', $cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchResult(Request $request)
    {
        
        $cat = Category::all();

        $result = Medicine::where('name', 'LIKE', "%$request->name%")
                    ->get();

        return view('shopping.searchresult')
            ->with('med', $result)
            ->with('cat', $cat)
            ->with('currentUser', session('user'));

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function thankyou(){

        $cat = Category::all();

            foreach(Cart::content() as $item){

                $cartItem = Medicine::find($item->id);

                $cartItem->quantity = $cartItem->quantity - $item->qty;

                $cartItem->save();
            }

            Cart::destroy();

            return view('thankyou');
    }

    public function test ( $index ) {
        return $index;
    }
}
