@extends('layouts.main')

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/product_order.css') }}"/>

@endsection

@section('content')

<div class="container-fluid">

    @include('partials._adminpanel')
</div>

<div class="container solomon">

    <div class="row" >

        <div class="col-md-12">

            <div class="card">

                <div class="card-body">

                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <th  scope="col">Id</th>
                          <th class="card-head-place" scope="col">Name</th>
                          <th class="card-head-place" scope="col">Action</th>
                        </tr>
                      </thead>

                        <tbody>
                        @foreach($cat as $item)
                            <tr class="card-head-place">
                                <form method="post" action="{{route('category.update', $item->id)}}">
                                    <input name="_method" type="hidden" value="PUT">
                                          {{ csrf_field() }}

                              <th scope="col"> <input class="form-control" type="text" style="width:5rem;" value="{{$item->id}}" readonly> </th>
                              <td scope="col"> <input class="form-control" type="text" name="name" value="{{$item->name}}" /> </td>
                              <td scope="col">
                                  <div class="text-inline">

                                          <button class="btn btn-sm btn-info">Update</button> &nbsp

                                      </form>

                                      <form action="{{route('category.destroy', $item->id)}}" method="post">
                                          <input name="_method" type="hidden" value="DELETE">
                                          {{ csrf_field() }}

                                          <button type="submit" class="btn btn-sm btn-danger"  onclick='return confirm("Category cannot be recovered. You sure want to delete?")'>
                                              DELETE
                                          </button>

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
    </div>

</div>

@endsection
