@extends('layouts.main')

@section('title')
    DrugOnline | Orders
@endsection

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product_order.css') }}"/>

@endsection

@section('content')

    <div class="container">

        <div class="row" id="orders">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        My Orders
                    </div>
                    <div class="card-body">
                        <table class="table">
                          <thead >
                            <tr class="bg-primary2">
                              <th scope="col">#</th>
                              <th scope="col">Items</th>
                              <th scope="col">Total</th>
                              <th scope="col">Delivery Address</th>
                              <th scope="col">Order Date</th>
                              <th scope="col">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach($order as $orders)
                                    <tr>
                                      <th scope="row">{{$orders->id}}</th>
                                      <td>
                                          <div class="card">
                                              <div class="card-body">

                                                  <?php $cart = unserialize($orders->cart) ?>

                                                  @foreach($cart as $item)

                                                      {{$item->name}}
                                                      <p class="text-muted">

                                                          <strong> {{$item->options->contains}},&nbsp {{$item->qty}}pc</strong>

                                                      </p>

                                                  @endforeach
                                              </div>
                                          </div>


                                      </td>
                                      <td>৳{{$orders->total_price}}</td>
                                      <td>{{$orders->delivery_address}}</td>
                                      <td>{{$orders->created_at}}</td>
                                      <td>{{$orders->status}}</td>
                                    </tr>
                                @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
