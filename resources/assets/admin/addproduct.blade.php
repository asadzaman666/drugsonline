@extends('layouts.main')

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product_order.css') }}"/>

@endsection

@section('content')

    <div class="container-fluid">
        @include('partials._adminpanel')
    </div>

    <div class="container">

        <div class="row offset-2 " id="addproduct">

            <div class="col-md-10">
                <h1>Medicine Management</h1>
                <hr />
            </div >
            <div class="col-md-5">
                <div class="form-group">

                    <form method="post" action="{{route('medicine.store')}}">

                        {{ csrf_field() }}

                        <div class="mb-3">
                          <label for="password">Manufacturer</label>
                          <select class="custom-select"  name="category" id="inputGroupSelect04">
                            <option selected disabled hidden>Choose...</option>

                            @foreach($cat as $item)
                                <option >{{$item->name}}</option>

                            @endforeach
                          </select>
                        </div>

                        <div class="mb-3">
                          <label for="name">Medicine Name</label>

                          <div class="input-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                              Your username or email is required.
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="password">Manufacturer</label>
                          <input type="text" class="form-control" id="password" name="brand" placeholder="" required>
                        </div>

                        <div class="mb-3">
                          <label for="username">Contains</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="username" name="contains" placeholder="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                              Your username or email is required.
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="password">Form</label>
                          <input type="text" class="form-control" id="password" name="form" placeholder="" required>
                        </div>

                        <div class="mb-3">
                          <label for="username">Quantity</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="username" name="quantity" placeholder="" required>
                            <div class="invalid-feedback" style="width: 100%;">
                              Your username or email is required.
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="password">Amount</label>
                          <input type="text" class="form-control" id="password" name="amount" placeholder="" required>
                        </div>

                        <div class="mb-3">
                          <label for="password">Price</label>
                          <input type="text" class="form-control" id="password" name="price" placeholder="" required>
                        </div>

                        <div class="mb-3">
                          <label for="password">Image Link</label>
                          <input type="text" class="form-control" id="password" name="image" placeholder="" required>
                        </div>

                            <div>
                                <button  class="btn btn-primary btn-lg btn-block" type="submit" name="button">Add Medicine</button>
                            </div>

                            <br />

                    </form>

                    <div class="row">
                        <div class="col-sm-12 ">
                            @if(session()->has('med_added'))
                                <div class="alert  alert-success text-center">
                                    {{session()->get('med_added')}}
                                </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-md-5">




                <form method="post" action="{{route('category.store')}}">
                    {{ csrf_field() }}
                    <div class="mb-3">
                      <label for="username">Category name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="username" name="categoryName" placeholder="" required>
                        <div class="invalid-feedback" style="width: 100%;">
                          Your username or email is required.
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="button">Add Category</button>
                    <br />
                </form>
                <div class="row">
                    <div class="col-sm-12 ">
                        @if(session()->has('category_added'))
                            <div class="alert  alert-success text-center">
                                {{session()->get('category_added')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
