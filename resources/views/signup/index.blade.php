@extends('layouts.main')

@section('content')

    <div class="container">

      <div class="row ">
        <!-- /.col-lg-3 -->

              <div class="col-md-6 order-md-1 offset-md-3" id="signupform">
                <h4 class="mb-3 ">Sign up</h4>
                <form class="form-signup needs-validation" method="post" action="{{route('user.store')}}">

                    {{ csrf_field() }}

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">First name</label>
                      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Jeerome"  />
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>

                    <div class="col-md-6 mb-3">
                      <label for="lastName">Last name</label>
                      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Luke" >
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="age">Age</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="age" name="age" placeholder="eg. 26" >
                      <div class="invalid-feedback" style="width: 100%;">
                        Your Age is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="username">Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                      </div>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
                      <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                      </div>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="phone">Phone </label>
                    <input type="phone" class="form-control" id="phone" name="phone" placeholder="123456789">
                    <div class="invalid-feedback">
                      Please enter a valid phone number.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" >
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="mb-3">
                    <label for="password">Password </label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>

                  <hr class="mb-4">
                  <button class="btn btn-dark btn-lg btn-block" type="submit">Sign Up</button>
                </form>

                @if (count($errors) > 0)
                    <div class="alert alert-danger" style="margin-top: 22px">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              </div>

          </div>

          @if(session()->has('user_created'))
              <div class="alert alert-success text-center" style="margin-top:10px">
                <strong>Account Created!</strong>
              </div>
          @endif
          <!-- /.row -->

        </div>

@endsection
