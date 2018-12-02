
@extends('layouts.main')

@section('content')


<div class="container" id="med-details">

        <div class="card ">
        	<div class="row">
        		<aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                    <div class="img-big-wrap text-center" >
                      <div > <a href="#"><img src="{{$med->image}}" id="image-big-wrap"></a></div>
                    </div> <!-- slider-product.// -->
                    <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
        		</aside>
        		<aside class="col-sm-7">
                    <article class="card-body p-5" id="cart-margin">
                    	<h2 class="title mb-3" style="">
                            {{$med->name}}
                            <span class="text-sm text-muted">
                                {{$med->form}}
                            </span>
                        </h2>

                    <p class="price-detail-wrap">
                    	<span class="price h3 text-warning">
                    		<span class="currency"> </span><span class="num">৳{{$med->price}}</span>
                    	</span>
                    	<span>/{{$med->amount}}</span>
                    </p> <!-- price-detail-wrap .// -->
                    <dl class="item-property">
                      <dt>Description</dt>
                      <dd><p>{{$med->contains}}</p></dd>
                    </dl>
                    <dl class="param param-feature">
                      <dt>Manufacturer</dt>
                      <dd>{{$med->brand}}</dd>
                    </dl>  <!-- item-property-hor .// -->

                    <hr>

                        <div class="tocartbtn">
                            <form name="form2" action="{{route('cart.store')}}" method="post">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class=" col-sm-5">
                                        <dl class="param param-inline">
                                          <dt>Quantity: </dt>
                                          <dd>
                                              <input type="number" name="quantity" min="1" value="1" style="width:6rem;"/>
                                          </dd>
                                        </dl>  <!-- item-property .// -->

                                    </div> <!-- col.// -->
                                    <div class="card" style="float:right">
                                      <div class="card-body">
                                        <strong>Available: </strong><a class=" card-footer text-success text-center">{{$med->quantity}}</a>
                                      </div>
                                    </div>
                                </div> <!-- row.// -->
                                <hr>

                                <input type="hidden" name="id" value="{{$med->id}}" />
                                <input type="hidden" name="name" value="{{$med->name}}" />
                                <input type="hidden" name="price" value="{{$med->price}}" />
                                <input type="hidden" name="contains" value="{{$med->contains}}" />
                                <input type="hidden" name="form" value="{{$med->form}}" />

                                @if(session('usertype') == 'admin')
                                    <button type="submit" class="btn btn-success btn-block" disabled><i class="fas fa-cart-plus"></i>  &nbsp Add to cart</button>
                                @else
                                    <button type="submit" class="btn btn-success btn-block" ><i class="fas fa-cart-plus"></i>  &nbsp Add to cart</button>
                                @endif
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 d-flex justify-content-between align-items-center ">
                                @if(session()->has('added_to_cart'))
                                    <div class="alert  alert-success text-center">
                                        {{session()->get('added_to_cart')}}
                                    </div>

                                    <div >
                                        <a class="continue" href="{{route('default.index')}}">Continue shopping?</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </article> <!-- card-body.// -->

        		</aside> <!-- col.// -->
        	</div> <!-- row.// -->
        </div> <!-- card.// -->


</div>
@endsection
