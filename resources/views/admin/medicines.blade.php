@extends('layouts.main')

@section('title') MedStore | Medicines
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
		<div class="view-table-medicine">
			<div class="card orders">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Name</th>
							<th scope="col">Brand</th>
							<th scope="col">Contains</th>
							<th scope="col">Med-Form</th>
							<th scope="col">Qty</th>
							<th scope="col">Amount</th>
							<th scope="col">Price</th>
							<th scope="col">Image</th>
							<th scope="col">Category</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
								<div class="admin-btn-med">
									@foreach($med as $meds)
										<div class="workpls" >
											<form action="{{route('medicine.update', $meds->id)}}" method="post">
				                <tr>
				  								<th scope="row">{{$meds->id}} </th>
				  								<td>
				  									<input  class="form-control name-form" type="text" name="name" value="{{$meds->name}}" />
				  								</td>
				                  <td>
				  									<input  class="form-control" type="text" name="brand" value="{{$meds->brand}}" />
				  								</td>
				                  <td>
				  									<textarea  class="form-control" type="text" name="contains">{{$meds->contains}}</textarea>
				  								</td>
				                  <td>
				  									<input  class="form-control name-form" type="text" name="form" value="{{$meds->form}}" />
				  								</td>
				                  <td>
				  									<input  class="form-control row-size" type="text" name="quantity" value="{{$meds->quantity}}" />
				  								</td>
				                  <td>
				  									<input  class="form-control name-form" type="text" name="amount" value="{{$meds->amount}}" />
				  								</td>
				                  <td>
				  									<input  class="form-control row-size" type="text" name="price" value="{{$meds->price}}" />
				  								</td>
				                  <td>
				  									<input  class="form-control" type="text" name="image" value="{{$meds->image}}" />
				  								</td>
													<td>
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
				                        <option {{$variable}}>{{$cats->name}}</option>
														@endforeach
				  								</td>
				                  <td>
															{{ csrf_field() }}
				                        <input name="_method" type="hidden" value="put">
																<div class="workpls">

																		<button onclick='alert("Updated")' type="submit" class="btn btn-success btn-sm">
																			<i class="fas fa-edit"></i> Update
					                					</button>

																</div>
				                      </form>
			  								</td>
												<td>
													<form action="{{route('medicine.destroy', $meds->id)}}" method="post">
														{{ csrf_field() }}
														<input name="_method" type="hidden" value="delete">
														<div class="workpls">
																<button  onclick='return confirm("You sure want to delete?")' type="submit" class="btn btn-danger btn-sm"><i class="fas fa-minus-circle"></i> Delete</button>
														</div>
													</form>
												</td>
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
@endsection
