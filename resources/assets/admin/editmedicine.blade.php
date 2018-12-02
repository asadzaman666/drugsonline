@extends('layouts.main')

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product_order.css') }}"/>

@endsection

@section('content')

<div class="container-fluid">

    @include('partials._adminpanel')

    <div class="row" >

        <div class="col-md-12">

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Manufacturer</th>
                  <th scope="col">Contains</th>
                  <th scope="col">Form</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image link</th>
                  <th scope="col">Category</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>

                <tbody>
                @foreach($med as $item)
                    <tr>
                        <form action="{{route('medicine.update', $item->id)}}" method="post">
                            <input name="_method" type="hidden" value="PUT">

                            {{ csrf_field() }}

                              <th scope="col"> <input class="form-control" type="text" style="width:5rem;" value="{{$item->id}}" readonly> </th>
                              <td scope="col"> <input class="form-control" type="text" name="name" value="{{$item->name}}" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="brand" value="{{$item->brand}}" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="contains" value="{{$item->contains}}" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="form" style="width:8rem;" value="{{$item->form}}" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="quantity" style="width:5rem;" value="{{$item->quantity}}" /> </td>
                              <td scope="col"> <input class="form-control" type="text" name="amount" style="width:7rem;"  value="{{$item->amount}} "/> </td>
                              <td scope="col"> <input class="form-control" type="text" name="price" style="width:5rem;" value="{{$item->price}} "/> </td>
                              <td scope="col"> <input class="form-control" type="text" name="image" value="{{$item->image}}" /> </td>
                              <td scope="col">

                                  <select class="custom-select"  name="category" id="inputGroupSelect04">
                                      <option selected >
                                          {{$item->category['name']}}
                                      </option>
                                      @foreach($cat as $items)
                                          <option >{{$items->name}}</option>
                                      @endforeach
                                        <option >{{$item->category['name']}}</option>

                                 </td>
                              <td scope="col">
                                  <div class="text-inline">
                                          <button type="submit" class="btn btn-sm btn-info">Update</button> &nbsp



                        </form>

                          <form action="{{route('medicine.destroy', $item->id)}}" method="post">
                                  <input name="_method" type="hidden" value="DELETE">

                                  {{ csrf_field() }}

                                  <button class="btn btn-sm btn-danger" onclick='return confirm("Medicine cannot be recovered. You sure want to delete?")'
                                  type="submit"> DELETE</button>

                          </form>

                          </div>
                                </td>
                    </tr>

                @endforeach

              </tbody>

            </table>
        </div>
    </div>

</div>

@endsection
