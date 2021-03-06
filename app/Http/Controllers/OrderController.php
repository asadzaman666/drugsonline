<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use \App\User;
use \App\Medicine;
use \App\Category;
use \App\Order;
use Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all()->sortBy('created_at');

        return view('admin.orders')
            ->with('order', $order)
            ->with('currentUser', session('user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([

            'firstName' => 'required|max:100|alpha',
            'lastName' => 'required|max:100|alpha',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
        ]);


        $order = new Order();

        $order->cart = serialize(Cart::content());
        $order->total_price = Cart::subtotal();

        if(session()->has('user')){

            $order->guest = false;

            $order->user_id = session('user')->id;
        }
        else {
            $order->guest = true;
        }

        $order->name = $request->firstName . ' '. $request->lastName;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->delivery_address = $request->address;
        $order->status = 'Pending';

        $order->save();

        $data = array(
          'email' => $request->email
        );

        Mail::send('emails.order', $data, function($message) use($data) {

          $message->from('info@drugonline.com', 'DrugOnline');
          $message->to($data['email']);

        });

        return redirect()->route('thankyou');

        // $item = unserialize($order->cart);

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
        Order::where('id', $id)
          ->update(['status' => $request->status]);

          $request->session()->flash('order_status', $id);

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
        $cat = Category::all();

        $order = Order::where('user_id', '=', $id)
            ->get();

        //$usercart = unserialize($order->cart);


        return view('user.orders')
            ->with('cat', $cat)
            ->with('order', $order)
            // ->with('cart',  $usercart)
            ->with('currentUser',  session('user'));
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

    // public function dummy()
    // {
    //     return view('emails.order');
    // }
}
