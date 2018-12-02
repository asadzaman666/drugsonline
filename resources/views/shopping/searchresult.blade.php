@extends('layouts.main')

@section('title')
    DrugOnline | Search Result
@endsection

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/landingpage.css') }}"/>

@endsection

@section('content')

    <div class="container search-result">

        <div >
            <h1 class="text-success">Search Result({{count($med)}})</h1>
            <div>
                <hr />
            </div>
        </div>

        <div class="row">

            @foreach($med as $meds)
            <div class="col-lg-3 col-md-4 mb-3">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="{{$meds->image}}" style="height:100"  alt="image"></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="{{route('medicine.show', $meds->id)}}">{{$meds->name}}</a> <h5 class="text-muted" id="med-type">{{$meds->form}}</h5>
                  </h4>
                  <h6 class="text-muted" id="manufac-id">{{$meds->brand}} </h6>
                  <hr />
                  <p class="card-text">
                      <p> {{$meds->contains}}</p>
                  </p>
                  <hr />
                  <div class="card-body-2 " >
                      <h6 >
                          {{$meds->amount}}
                      </h6 >
                      <h4 class="text-warning" id="bdt">
                          ৳{{($meds->price)}}
                      </h4>

                  </div>

                </div>
              </div>
            </div>
            @endforeach
        </div>

          </div>
    <!-- /.container -->

@endsection
