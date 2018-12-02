@extends('layouts.main')

@section('title')
    DrugOnline | Orders
@endsection

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product_order.css') }}"/>

@endsection

@section('content')

    <div class="container-fluid" >

        @include('partials._adminpanel')

        <div class="row solomon" >

                <div class="card">

                    <div class="card-body">
                        <table class="table">
                          <thead >
                            <tr class="thead-dark">
                              <th scope="col">#</th>
                              <th scope="col">Name</th>
                              <th scope="col">Items</th>
                              <th scope="col">Total</th>
                              <th scope="col">Delivery Address</th>
                              <th scope="col">Order Date</th>
                              <th scope="col">Status</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                                @foreach($order as $orders)
                                    <tr>
                                        <form action="/order/{{$orders->id}}/status" method="post">

                                            <input name="_method" type="hidden" value="PUT">

                                            {{ csrf_field() }}

                                          <th scope="row">{{$orders->id}}</th>
                                          <td>{{$orders->user_name}}</td>
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
                                        <td>



                                                <select class="custom-select"  name="status" id="inputGroupSelect04" >
                                                    <option
                                                        @if ($orders->status == 'Pending')
                                                            selected
                                                        @endif
                                                    >Pending</option>

                                                    <option
                                                        @if ($orders->status == 'Shipped')
                                                            selected
                                                        @endif
                                                    >Shipped</option>

                                                    <option
                                                        @if ($orders->status == 'Complete')
                                                            selected
                                                        @endif
                                                    >Complete</option>

                                        </td>

                                        <td>
                                            <button type="submit" class="btn btn-sm btn-info">Update</button>

                                        </td>
                                            </form>

                                      </td>
                                    </tr>
                                @endforeach
                          </tbody>
                        </table>
                    </div>

            </div>
        </div>

    </div>

@endsection
