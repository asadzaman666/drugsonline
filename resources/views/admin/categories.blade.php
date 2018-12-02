@extends('layouts.main')

@section('title') MedStore | Categories
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
		<div class="col-lg-6 view-table-cat">
			<div class="card orders">
				<table class="table">
					<thead class="thead-light">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Category Name</th>
							<th scope="col"></th>
							<th scope="col"></th>
						</tr>
					</thead>
					<tbody>
							@foreach($cat as $cats)
                <tr>
  								<th scope="row">{{$cats->id}} </th>
  								<td>
                    <div id="admin-btn">
                    <form action="{{route('category.update', $cats->id)}}" method="post">
  									<input  class="form-control" type="text" name="name" value="{{$cats->name}}" />
  								</td>
                  <td>


                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="put">
                        <button onclick='alert("Updated")' type="submit" class=" btn btn-success"><i class="fas fa-edit"></i> Update</button>
                      </form>
                    </div>
  								</td>
                  <td>
                    <form action="{{route('category.destroy', $cats->id)}}" method="post">
                      {{ csrf_field() }}
                      <input name="_method" type="hidden" value="delete">
                      <button onclick='return confirm("You sure want to delete?")' type="submit" class=" btn btn-danger"><i class="fas fa-minus-circle"></i> Delete</button>
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
