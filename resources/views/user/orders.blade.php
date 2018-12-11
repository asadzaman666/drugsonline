@extends('layouts.main')

@section('title')
DrugOnline | Orders
@endsection

@section('custom-css')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/product_order.css') }}" />

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
                    <div>
                            @if(session()->has('order_cancel'))
                            <div class="alert alert-success text-center" style="margin-top:10px">
                                <strong>Order Cancelled</strong>
                            </div>
                            @endif
                        <form method="POST" action="{{route('order.filter', $currentUser)}}" class="form-inline mb-3"
                            style="float:right;">
                            @csrf
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Filter by</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="selectedFilter">
                                <option selected>None</option>
                                <option value="1">Pending</option>
                                <option value="2">Shipped</option>
                                <option value="3">Delivered</option>
                            </select>

                            <button class="btn btn-md btn-primary">Submit</button>
                        </form>

                    </div>
                    <table class="table">
                        <thead>
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
                                    @if ( $orders->status == "Pending" )
                                    <div class="mt-2 mb-2">
                                        {{-- <a href="{{route('order.destroy', $orders->id)}}"><button class="btn btn-block btn-danger">Cancel
                                                Order</button></a> --}}
                                        <form action="{{route('order.destroy', $orders->id)}}" method="post">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="delete">
                                            <input type="hidden" name="id" value="{{$orders->id}}">
                                            <button onclick='return confirm("You sure want to cancel?")' type="submit"
                                                class=" btn btn-block btn-danger"><i class="fas fa-trash"></i> Cancel
                                                Order</button>
                                        </form>
                                    </div>
                                    @endif
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