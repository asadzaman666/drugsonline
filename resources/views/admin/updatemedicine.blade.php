@extends('layouts.main')

@section('title') MedStore | Update Medicine
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
</div>

<div class="container">
	<div class="row">
		<div class="col-md-8 card addmedicine">
			<h3>Update Medicine</h3>
			<hr class="mb-4">
			<form action="{{route('medicine.update', $meds->id)}}" method="post">
				{{ csrf_field() }}
				<input name="_method" type="hidden" value="put">
				<div class="med-add-allign">
					<div class="mb-3">
						<label for="username">Name</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="name" required value="{{$meds->name}}">
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Brand</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="brand" value="{{$meds->brand}}" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Contains</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="contains" value="{{$meds->contains}}" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Form</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="form" value="{{$meds->form}}" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Quantity</label>
						<div class="input-group">
							<input type="number" class="form-control" id="username" name="quantity" value="{{$meds->quantity}}" required>
						</div>
					</div>
				</div>

				<div class="med-add-allign-2">
					<div class="mb-3">
						<label for="username">Amount</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="amount" value="{{$meds->amount}}" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Price</label>
						<div class="input-group">
							<input type="number" class="form-control" id="username" name="price" value="{{$meds->price}}" required>
						</div>
					</div>
					<div class="mb-3">
						<label for="username">Image URL</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="image" value="{{$meds->image}}">
						</div>
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Category</label>
						{{-- <select class="form-control" name="category">
							<option selected disabled>Choose</option>
							@foreach($cat as $cats)
							<option>{{$cats->name}}</option>
							@endforeach
						</select> --}}

						<select id="inputState" name="category" class="form-control">
							@foreach($cat as $cats)

							<?php
												if($cats->name == $meds->category->name){
													$variable = "Selected";
												}
												else{
													$variable = NULL;
												}
											 ?>
							<option class="form-control" {{$variable}}>{{$cats->name}}</option>
							@endforeach
					</div>
				</div>

				{{-- <button class="btn btn-success btn-md btn-block" type="submit"></i> Update</button> --}}
				<input class="btn btn-success btn-md btn-block mb-2 mt-2" type="submit" value="Update">
			</form>
			@if(session()->has('med_updated'))
			<div class="alert alert-success text-center" style="margin-top:10px">
				<strong>Medicine Updated</strong>
			</div>
			@endif

			@if(session()->has('med_added_error'))
			<div class="alert alert-danger text-center" style="margin-top:10px">
				<strong>Medicine exist already</strong>
			</div>
			@endif
		</div>

		@if (count($errors) > 0)
		<div class="alert alert-danger" style="margin-top:10px">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>
</div>
@endsection