<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Admin;
use \App\Medicine;
use \App\Category;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cat = Category::all();

        return view('signup.index')
            ->with('cat', $cat);
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
            'age' => 'required|min:18|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'username' => 'required|alpha_dash',
            'address' => 'required',
            'password' => 'required',
        ]);

        $user = new User();

        $user->firstname = $request->firstName;
        $user->lastname = $request->lastName;
        $user->age = $request->age;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = $request->password;

        $user->save();

        $request->session()->flash('user_created', 'Account created!');

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
        $user = User::find($id);
        $cat = Category::all();

        return view('user.profile')
            ->with('currentUser', $user)
            ->with('cat', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session('usertype') == 'user'){

            $user = User::find($id);
            $cat = Category::all();

            return view('user.edit')
                ->with('currentUser', $user)
                ->with('cat', $cat);

        }
        else {

            $admin = Admin::find($id);

            return view('admin.profile')
                ->with('currentUser', $admin);

        }
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
        $request->validate([

            'firstName' => 'required|max:100|alpha',
            'lastName' => 'required|max:100|alpha',
            'age' => 'required|max:200|numeric',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'password' => 'required',
        ]);

            $user = User::findorfail($id);

            $user->firstname = $request->firstName;
            $user->lastname = $request->lastName;
            $user->age = $request->age;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->password = $request->password;

            $user->save();


        $request->session()->flash('user_updated', 'Accounted updated!');

        return back();
    }

    /**
     * Update admin profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function adminUpdate(Request $request, $id)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);

            $admin = Admin::findorfail($id);

            $admin->email = $request->email;
            $admin->password = $request->password;

            $admin->save();

        $request->session()->flash('user_updated', 'Accounted updated!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $this_user = User::findorfail($id);

        $this_user->delete();

        $request->session()->flush();
        return redirect()->route('default.index');
    }
}
