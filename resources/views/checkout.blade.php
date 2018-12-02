@extends('layouts.main')

@section('custom-css')

        <link rel="stylesheet" type="text/css" href="{{ asset('/css/others.css') }}"/>

@endsection

@section('content')

    <div class="container checkout">

        <div class="row">
            <div class="col-md-12 order-md-2 ">
                <div class="py-5 " style="float:left">
                  <h2>Checkout </h2>
                </div>
                @if(!session()->has('user'))
                <div class="py-5 " style="float:right">
                  <a href="{{route('login.index')}}" class="font-weight-bold">Signin </a><span class="text-muted">(Optional)</span>
                </div>
                @endif
                        <hr id="checkout-line"/>

            </div>

        </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{Cart::content()->count()}}</span>
          </h4>
          <ul class="list-group mb-3">

            @foreach(Cart::content() as $item)

                <li class="list-group-item d-flex justify-content-between lh-condensed">
                  <div id="qty-cart-sameline">
                     <h6 class="my-0"> <small class="text-muted">{{$item->qty}} pcs &nbsp</small>{{$item->name}}</h6>
                     <small class="text-muted">{{$item->options->contains}}</small>
                 </div>

                 <div>

                 </div>
                  <span class="text-muted">৳{{$item->price * $item->qty}}</span>
                </li>

            @endforeach

            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>N/A</small>
              </div>
              <span class="text-success">N/A</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (BDT)</span>
              <strong>৳{{Cart::subtotal()}}</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>

          <form method="post" action="{{route('order.store')}}"class="needs-validation" validate>

              {{ csrf_field() }}

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Mohsin"
                @if(session()->has('user'))
                value="{{$currentUser->firstname}}" readonly
                @endif
                required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Haider"
                @if(session()->has('user'))
                value="{{$currentUser->lastname}}" readonly
                @endif
                 required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Phone <span class="text-muted"></span></label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="123456789"
              @if(session()->has('user'))
              value="{{$currentUser->phone}}" readonly
              @endif
              required>
            </div>

            <div class="mb-3">
              <label for="email">Email </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com"
              @if(session()->has('user'))
              value="{{$currentUser->email}}" readonly
              @endif
              required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Shipping address <span class="text-muted">(Different delivery address? Type here)</span> </label>
              <input type="text" class="form-control"  name="address" id="address"
              placeholder="eg. Plot 22, Block c, Bashundhara, Dhaka 1229"
              @if(session()->has('user'))
              value="{{$currentUser->address}}"
              @endif
              required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <hr class="mb-4">

            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="cod" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">Cash on Delivery</label>

              </div>

            </div>

            <hr class="mb-4">
            <button class="btn btn-warning btn-lg btn-block" type="submit" aria-pressed="true">Confirm purchase!</button>
          </form>

          <div>

              @if (count($errors) > 0)
                  <div class="alert alert-danger" style="margin-top: 22px">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

          </div>

        </div>
      </div>


    </div>

@endsection
