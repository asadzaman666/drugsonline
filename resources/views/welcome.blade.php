
@extends('layouts.main')

@section('title')
    @if(session()->has('user'))
    DrugOnline
    @else
    DrugOnline | Home
@endif
@endsection

@section('custom-css')

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/landingpage.css') }}"/>

@endsection

@section('content')

    <div class="container">

      <div class="row">

        <!-- /.col-lg-3 -->

        <div class="col-lg-12">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner" role="listbox" style=" height=500px; width=1250px; ">
                <div class="carousel-item active">
                <img class="d-block img-fluid" src="image/image1.jpg"  style="max-height: 500px;" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="image/image2.jpg" style="max-height: 500px;" alt="Second slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
            <div class="col-md-12">
                <div class="card border-info mb-2">
                    <div class="card-header">
                      <h2 class="lead text-center"> Get 50tk discount for buying over 300tk. Use Coupon VICTORYDAY18</h2>
                    </div>
                  </div>
            </div>
          </div>

          <hr>

          <div class="row">
            
              @foreach($med as $meds)

                  {{-- <div class="col-md-4 ">
                      <div class="card mb-4 box-shadow">
                          <div class="">
                              <img class="card-img-top" src="{{$meds->image}}" style="width:100" alt="Card image cap">
                          </div>
                        <div class="card-body">
                          <p class="card-text text-muted">{{$meds->brand}} <br />{{$meds->contains}}</p>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                              <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                              <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <div class="text-warning price"><strong class="text-muted">{{$meds->amount}} </strong > &nbsp &nbsp<strong class="price-color">৳{{$meds->price}}</strong></div>
                          </div>
                        </div>
                      </div>
                    </div> --}}

              <div class="col-lg-3 col-md-4 mb-3">
                <div class="card h-100">
                  <img class="card-img-top" src="{{$meds->image}}" style="height:100"  alt=""></a>
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
                    <div class="d-flex justify-content-between align-items-center " >
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

          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

            @if(Route::current()->getName() == 'default.index')
            <footer>
              <div class="row">
              <div class="col-md-12">
                  <span class="text-muted">Developed with <i class="icon ion-ios-heart" size="large"></i> by Bappi Zaman</span> <br>
                  <span class="text-muted"> &copy; 2018 DrugOnline
              </div>
            </footer> 
            @endif
            

    </div>
    <!-- /.container -->

@endsection


