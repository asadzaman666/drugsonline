@extends('layouts.main', ['cat' => $cat])

@section('title')
    DrugOnline | Home
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
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                <img class="d-block img-fluid" src="http://www.pharmatoz.com/wp-content/uploads/2015/02/Home-Slider-Image-Order-Online1-1024x410.jpg"  height="350" width="1250" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="https://www.greenlifestylemarket.com/blog/wp-content/uploads/2017/05/nsaids-1250x500.jpg" height="350" width="1250" alt="Second slide">
              </div>
              {{-- <div class="carousel-item">
                <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
              </div> --}}
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
              @foreach($med as $meds)
              <div class="col-lg-3 col-md-4 mb-3">
                <div class="card h-100">
                  <a href="#"><img class="card-img-top" src="{{$meds->image}}" style="height:200"  alt=""></a>
                  <div class="card-body">
                    <h4 class="card-title">
                      <a href="#">{{$meds->name}}</a> <h5 id="med-type">{{$meds->form}}</h5>
                    </h4>
                    <h6 class="text-muted" id="manufac-id">From {{$meds->brand}} </h6>
                    <p class="card-text">
                        <p> {{$meds->contains}} <br />  {{$meds->quantity}} Available</p>
                    </p>
                    <div class="card-body-2 " >
                        <h6 >
                            {{$meds->amount}}
                        </h6 >
                        <h5 id="bdt">
                            BDT {{$meds->price}}
                        </h5>

                    </div>
                    <div class="tocartbtn">
                        <form action="#" method="post">
                            {{ csrf_field() }}

                            <button type="button" class="btn btn-success btn-block">Add to cart</button>
                        </form>
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

    </div>
    <!-- /.container -->

@endsection
