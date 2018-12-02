<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
use \App\Medicine;
use \App\Category;

class MedicineController extends Controller
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
        //
    }

    /**
     * Show medicine by category.
     *
     * @return \Illuminate\Http\Response
     */
    public function medByCat($id)
    {
        $med = Medicine::where('category_id', '=', $id)
            ->get();

            $cat = Category::all();


            if(session()->has('user')){

                return view('welcome')
                    ->with('cat', $cat)
                    ->with('med', $med)
                    ->with('currentUser', session('user'));
            }
            else{

                return view('welcome')
                ->with('cat', $cat)
                ->with('med', $med);

            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();

        return view('admin.addproduct')
            ->with('cat', $cat)
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
        $med = new Medicine();
        
        $cat = Category::where('name', '=', $request->category)
            ->first();

        $med->name = $request->name;
        $med->brand = $request->brand;
        $med->contains = $request->contains;
        $med->form = $request->form;
        $med->quantity = $request->quantity;
        $med->category_id = $cat->id;
        $med->price = $request->price;
        $med->amount = $request->amount;
        $med->image = $request->image;

        $med->save();

        $request->session()->flash('med_added', 'Medicine added to Database');
        return back();

    }

    /**
     * Display the specified medicine.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::all();

        $med = Medicine::find($id);

        if(session()->has('user')){

            return view('medicine.details')
                ->with('cat', $cat)
                ->with('med', $med)
                ->with('currentUser', session('user'));
        }
        else{

            return view('medicine.details')
            ->with('cat', $cat)
            ->with('med', $med);

        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $result = Medicine::where('name', 'LIKE', "%$request->name%")
            ->get();

        $cat = Category::all();

            return view('admin.medicines')
                ->with('med', $result)
                ->with('cat', $cat)
                ->with('currentUser', session('user'));

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
        $med  = Medicine::find($id);
        $cat = Category::where('name', '=', $request->category)
            ->first();

        $med->name = $request->name;
        $med->brand = $request->brand;
        $med->contains = $request->contains;
        $med->form = $request->form;
        $med->quantity = $request->quantity;
        $med->category_id = $cat->id;
        $med->price = $request->price;
        $med->amount = $request->amount;
        $med->image = $request->image;

        $med->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med = Medicine::find($id);

        $med->delete();

        return back();
    }

    public function showAll(){

        $result = Medicine::all()
            ->sortBy('name');
        $cat = Category::all();


        return view('admin.medicines')
            ->with('med', $result)
            ->with('cat', $cat)
            ->with('currentUser', session('user'));
    }


}
