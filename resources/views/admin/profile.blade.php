@extends('layouts.main')

@section('title') MedStore | Profile
@endsection

@section('custom-css')

  <link rel="stylesheet" type="text/css" href="{{ asset('/css/admin.css') }}" />

@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-5 card profile">
				<h3>Edit Admin Info</h3>

				<form action="{{route('user.adminUpdate', $currentUser->id)}}" method="post">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="put">
					<div class="mb-3">
						<label for="username">Email</label>
						<div class="input-group">
							<input type="text" class="form-control" id="username" name="email" value="{{$currentUser->email}}" required>
							<div class="invalid-feedback" style="width: 100%;">
							</div>
						</div>
					</div>

					<div class="mb-3">
						<label for="username">Password</label>
						<div class="input-group">
							<input type="password" class="form-control" id="username" name="password" value="{{$currentUser->password}}" required>
							<div class="invalid-feedback" style="width: 100%;">
							</div>
						</div>
					</div>

					<hr class="mb-4">
					<button class="btn btn-success btn-lg btn-block" type="submit">Save</button>
				</form>

        @if(session()->has('user_updated'))
    				<div class="alert alert-success text-center" style="margin-top:10px">
    					<strong>Account updated</strong>
    				</div>
    		@endif
			</div>
		</div>
	</div>

@endsection
