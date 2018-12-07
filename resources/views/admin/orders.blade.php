@extends('layouts.main')

@section('title') MedStore | Orders
@endsection

@section('custom-css')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.css') }}" />

@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="admin-navbar">
			@include('partials._adminpanel')
		</div>
	</div>
	<div class="row">
		<div class="view-table">
			<div class="card orders">

					<div>
							<form method="POST" action="{{route('order.filterOrder')}}" class="form-inline mb-3"
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

				<table class="table">
					<thead class="thead-light">
						<tr class="bg-primary2">
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Items</th>
							<th scope="col">Shipping Address</th>
							<th scope="col">Phone</th>
							<th scope="col">Total</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($order as $orders)
						<tr>
							<th scope="row">{{$orders->id}}</th>
							<td>{{$orders->name}}</td>
							<td>
								<?php $item = unserialize($orders->cart); ?>

								<div class="card">
									<div class="card-body">
										@foreach($item as $items)
										<div>
											<h5 class="card-title">{{$items->name}}</h5>
											<h6 class="card-subtitle mb-2">{{$items->qty}}pc, {{$items->options->form}}</h6>
											<p class="card-text">{{$items->options->contains}}</p>
											&nbsp
										</div>
										@endforeach
									</div>
								</div>
							</td>
							<td>{{$orders->delivery_address}}</td>
							<td>{{$orders->phone}}</td>
							<td>৳{{$orders->total_price}}</td>
							<form action="{{route('order.update', $orders->id)}}" method="post">
								{{ csrf_field() }}
								<input name="_method" type="hidden" value="put">
								<td>
									<select id="selectStatus" name="status" class="form-control">
										@if($orders->status == "Pending")
										<option id="orderStatusAdmin" selected>Pending</option>
										<option>Shipped</option>
										<option>Delivered</option>
										@elseif ($orders->status == "Shipped")
										<option>Pending</option>
										<option id="orderStatusAdmin"  selected>Shipped</option>
										<option>Delivered</option>
										@elseif ($orders->status == "Delivered")
										<option>Pending</option>
										<option>Shipped</option>
										<option id="orderStatusAdmin"  selected>Delivered</option>
										@endif
									</select>
								</td>
								<td>
									<button type="submit" class="btn-success btn-sm"><i class="fas fa-edit"></i> Update</button>
									<!-- @if(session()->has('order_status'))
					    				<div class=" alert alert-success" style="margin-top:10px;">
					    					<strong>Updated!</strong>
					    				</div>
					    			@endif -->
								</td>
							</form>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom-scripts')
	<script src="{{ asset('/js/admin-orders.js') }}"></script>
@endsection