@extends('layouts.main')

@section('content')
{{ $cnt = 0 }}
<div class="container">

    <div class="row">

        <div class="col-md-8 order-md-2 offset-2" id="cart-container">

        <div class="row">
            <h4 class="col-sm-5">Your Cart</h4>
        </div>
        <hr />
          @if (Cart::count() > 0)

          <table class="table">
            <thead class="table-info">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
              </tr>
            </thead>

            <tbody class="table-light">
            @foreach(Cart::content() as $item)
              <tr>
                <td >{{++$cnt}}</td>
                <td > <a href="{{route('medicine.show', $item->id)}}">{{$item->name}}</a>
                    <p class="text-muted">
                        {{$item->options->contains}}
                    </p>
                </td>
                <td > {{$item->qty}}pc </td>
                <td >৳{{($item->qty * $item->price)}} <i class="fas fa-minus-circle" id="cart-remove"></i></td>
              </tr>
             @endforeach
             </tbody>
              <tfoot class="table-info">
                  <td scope="col"></td>
                  <td scope="col"></td>
                  <th scope="col">Total(BDT)</th>
                  <td scope="col">৳{{Cart::subtotal()}}</td>
              </tfoot>
          </table>
          <hr />
          <div class="row">
              <div class="col-md-8">
                  <form method="get" action="{{route('cart.checkout')}}">
                      {{ csrf_field() }}

                      <button type="submit" class="btn btn-warning  btn-lg btn-block"> Checkout </button>
                  </form>
              </div>
              <div class="col-md-4">
                  <a href="{{route('cart.destroy')}}" class="btn btn-danger btn-lg btn-block" role="button">Empty Cart</a>
              </div>
          </div>

        @else
                <h2 class="text-center text-info"> <i class="far fa-frown"></i> Your cart seems empty</h2>

        @endif

        </div>

    </div>
</div>

@endsection
