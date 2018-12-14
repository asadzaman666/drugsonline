<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

use \App\User;
use \App\Medicine;
use \App\Category;
use \App\Order;
use \App\Coupon;
use Mail;
use Session;

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

    public function coupon ( Request $request ) {

        $cat = Category::all();
        
        $total = Cart::subtotal();
        $coup = Coupon::where('code', '=', $request->code)
        ->first(['code']);

            if ( $total >= 300 && $coup ) {

                $total -= 50;
                Session::flash( 'CouponApplied', 'ihavecoupon');
                return view('checkout')
                    ->with('total', $total)
                    ->with('cat', $cat)
                    ->with('promo_code', $coup)
                    ->with('currentUser', session('user'));
            } else {
                $request->session()->flash('promo_error');
                return back();
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

        $request->validate([

            'firstName' => 'required|max:100|alpha',
            'lastName' => 'required|max:100|alpha',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
        ]);


        $order = new Order();

        $order->cart = serialize(Cart::content());

        if ( $request->totalWithCoupon ) {
            $order->total_price = $request->totalWithCoupon;
        } else {
            $order->total_price = Cart::subtotal();
        }

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

    /** Filter by status USER
     * 
     * 1 = Pending 
     * 2 = Shipped
     * 3 = Delivered
     */

    public function filter( Request $request, $id ) {

        $cat = Category::all();

        if ( $request->selectedFilter == 1 ) {
            $order = Order::where ( 'user_id', '=', $id )
                ->where( 'status', '=', 'Pending' )
                ->get();

        } elseif ( $request->selectedFilter == 2 ) {
            $order = Order::where ( 'user_id', '=', $id )
                ->where( 'status', 'Shipped' )
                ->get();
        } elseif ( $request->selectedFilter == 3 ) {
            $order = Order::where ( 'user_id', '=', $id )
                ->where( 'status', 'Delivered' )
                ->get();
        } else {
            // dd(session('user')->id);
            return redirect()->route('order.show',  session('user')->id);
        }
        
        return view('user.orders')
        ->with('cat', $cat)
        ->with('order', $order)
        ->with('currentUser',  session('user'));
    }

    /**
     * Filter order by status (Admin)
     * 1 = Pending 
     * 2 = Shipped
     * 3 = Delivered
     */
    public function filterOrder( Request $request ) {

        if ( $request->selectedFilter == 1 ) {
            $order = Order::where( 'status', '=', 'Pending' )
                ->get();

        } elseif ( $request->selectedFilter == 2 ) {
            $order = Order::where( 'status', 'Shipped' )
                ->get();
        } elseif ( $request->selectedFilter == 3 ) {
            $order = Order::where( 'status', 'Delivered' )
                ->get();
        } else {
            return redirect()->route('order.index');
        }
        
        return view('admin.orders')
            ->with('order', $order)
            ->with('currentUser', session('user'));
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
            ->with('orderstatus',  'None')
            ->with('currentUser',  session('user'));
    }


    /**
     * Remove pending order by user 
     * & update quantiity
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $order = Order::find($request->id);
        $cart = unserialize($order->cart);

        foreach ($cart as $key) {
            $med = Medicine::find($key->id);
            $updatedQuantity = $med->quantity + $key->qty;
            
            DB::table('medicines')
            ->where('id', $key->id)
            ->update(['quantity' => $updatedQuantity]);
        }

        $order->delete();

        $request->session()->flash('order_cancel');

        return back();
    }

    // public function dummy()
    // {
    //     return view('emails.order');
    // }
}
